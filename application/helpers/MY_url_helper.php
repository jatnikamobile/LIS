<?php

if(!function_exists('form_serialize'))
{
	function form_serialize($data)
	{
		$key_pairs = [];

		foreach ($data as $key => $val)
		{
			if(!is_null($val))
			{
				$key_pairs[] = $key.'='.urlencode($val);
			}
		}

		return empty($key_pairs) ? NULL : join('&', $key_pairs);
	}
}