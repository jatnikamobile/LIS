<?php

abstract class MY_Controller extends CI_Controller
{
	protected function ensurePostMethod()
	{
		$this->allowedMethods('post');
	}

	protected function ensureGetMethod()
	{
		$this->allowedMethods('get');
	}

	protected function allowedMethods($methods)
	{
		if(is_array($methods))
		{
			foreach ($methods as $method)
			{
				$this->allowedMethods($method);
			}
		}

		if($this->input->method() !== strtolower($methods))
		{
			$this->output
				->set_status_header(405, 'Method not allowed')
				->set_output('Error 405: Method not allowed')
				->_display();
			exit();
		}
	}

	protected function redirectPostMethod($function, ...$parameters)
	{
		$this->redirectMethod('post', $function, ...$parameters);
	}

	protected function redirectGetMethod($function, ...$parameters)
	{
		$this->redirectMethod('get', $function, ...$parameters);
	}

	protected function redirectMethod($method, $function, ...$parameters)
	{
		if($this->input->method() === strtolower($method))
		{
			call_user_func_array([$this, $function], $parameters);
			exit();
		}
	}

	protected function outputAsJson($expression = null)
	{
		$use_pretty_print = ENVIRONMENT !== 'production' ? JSON_PRETTY_PRINT : 0;

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($expression, $use_pretty_print))
			->_display();

		exit();
	}

	protected function errorUnauthorized()
	{
		$this->output
			->set_status_header(401, 'Method not allowed')
			->set_output('Error 401: Method not allowed')
			->_display();
		exit();
	}

	protected function getFields(...$args)
	{
		[$one, $caller] = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);

		if(method_exists($this, $method = 'get_'.$caller['function'].'_fields'))
		{
			return $this->{$method}(...$args);
		}

		return $this->input->post_get();
	}

	protected function save_history($index, $url = NULL)
	{
		$history = $this->session->item('navigation_history') ?: [];

		$count = count($history);
		for ($i = $index; $i < $count; $i++)
		{
			if(array_key_exists($i, $history))
			{
				unset($history[$i]);
			}
		}

		$history[$index] = $url ?? ($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		$this->session->item('navigation_history', $history);
	}
}