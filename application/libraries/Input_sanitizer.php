<?php

class Input_sanitizer {

	private $CI;
	private $chaining = FALSE;
	private $method = 'get_post';
	private $index = 0;
	private $content = [];

	protected $validatable = [
		'string',
		'integer',
		'array',
		'string_array',
		'integer_array',
		'array',
		'integer_between',
		'integer_above',
		'integer_below',
		'date',
	];

	function __construct() {

		$this->CI = & get_instance();
	}

	// define source input method
	public function method($method, $chaining = TRUE) {

		$this->chaining = $chaining;
		$this->method = $method;
		return $this;
	}

	// allowed param: list, object, array
	public function value($return_as = 'object') {

		if($return_as == 'object') {

			$return = (Object) $this->content;
		}
		elseif($return_as == 'array') {

			$return = (Array) $this->content;
		}
		else {

			$return = array_values($this->content);
		}

		$this->content = [];
		return $return;
	}

	public function __call($name, $args) {

		if(in_array($name, $this->validatable)) {
			$key = $args[0];
			$args[0] = $this->CI->input->{$this->method}($key);
			$value = $this->{'sanitize_'.$name}(... $args);
			if($this->chaining) {
				$this->content[$key] = $value;
				$this->index++;
				return $this;
			}

			return $value;
		}

		return $this->$name(... $args);
	}

	// Ensure the return is String or NULL (if empty or not valid)
	public function sanitize_string($value, $case = NULL, $trim = TRUE) {

		if(is_array($value)) {

			return NULL;
		}

		$value = (String) $value;

		if($case == 'upper') {
			$value = strtoupper($value);
		}
		elseif($case == 'lower' || $case === TRUE) {
			$value = strtolower($value);
		}

		if($trim === TRUE || $trim == 'both') {
			$value = trim($value);
		}
		elseif($trim == 'l' || $trim == 'left') {
			$value = ltrim($value);
		}
		elseif ($trim == 'r' || $trim == 'right') {
			$value = rtrim($value);
		}

		return empty($value) && $value !== '0' ? NULL : $value;
	}

	// ensure the return is Integer or NULL if not
	public function sanitize_integer($value, $on_invalid = NULL) {

		$integer = $this->sanitize_string($value);
		return is_numeric($integer) ? ((Int) $integer) : $on_invalid;
	}

	public function sanitize_array($value, $type = NULL) {

		if(!is_array($value)) {
			return NULL;
		}

		if($type == 'string') {
			$self = &$this;
			return array_map(function($item) use (&$self) {
				return $self->sanitize_string($item);
			}, $value);
		}
		elseif($type == 'integer') {
			$self = &$this;
			return array_map(function($item) use (&$self) {
				return $self->sanitize_integer($item);
			}, $value);
		}
		else {
			return $value;
		}
	}

	public function sanitize_string_array($value) {

		return $this->sanitize_array($value, 'string');
	}

	public function sanitize_integer_array($value) {

		return $this->sanitize_array($value, 'integer');
	}

	public function sanitize_integer_between($value, $low, $high, $default = NULL) {

		$value = $this->sanitize_integer($value);
		if(NULL === $value) {
			return $default;
		}
		elseif($value < $low) {
			return $low;
		}
		elseif($value > $high) {
			return $high;
		}
		else {
			return $value;
		}
	}

	public function sanitize_integer_above($value, $low, $default = NULL) {

		$value = $this->sanitize_integer($value);

		if(NULL === $value) {
			return $default;
		}
		elseif($value < $low) {
			return $low;
		}
		else {
			return $value;
		}
	}

	public function sanitize_integer_below($value, $high, $default = NULL) {

		$value = $this->sanitize_integer($value);

		if(NULL === $value) {
			return $default;
		}
		elseif($value > $high) {
			return $high;
		}
		else {
			return $value;
		}
	}

	public function sanitize_date($value, $accept_format = ['Y-m-d'], $on_invalid = NULL) {

		$value = $this->sanitize_string($value);

		if(!is_array($accept_format)) $accept_format = [$accept_format];

		$i = 0;
		do $date = date_create_from_format($accepted_format = $accept_format[$i], $value);
		while(++$i < count($accept_format) && !$date);

		return $date ?: date_create_from_format($accepted_format, $on_invalid ?? date($accepted_format));
	}

	public function serialize_get($params = NULL, $appends = NULL)
	{
		$data = array_merge($this->CI->input->get($params), is_array($appends) ? $appends : []);
		$serializations = [];
		foreach ($data as $key => $value)
		{
			$serializations[] = $key.'='.urlencode($value);
		}

		return join('&', $serializations);
	}
}