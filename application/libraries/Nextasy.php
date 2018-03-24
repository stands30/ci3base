<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Nextasy
{
 
	function push_breadcrumb($name, $url = '#', $append = TRUE)
	{
		$entry = array('name' => $name, 'url' => $url);

		if ($append)
			$this->breadcrumb[] = $entry;
		else
			array_unshift($this->breadcrumb, $entry);
	}
	
	function get_breadcrumb()
	{
		return $this->breadcrumb;   
	}
}
 ?>