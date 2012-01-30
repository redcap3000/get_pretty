<?php
/*
get_pretty
Get Pretty Request
Ronaldo Barbachano Jan 2012

*/
class get_pretty{
// current working directory
// use a method to attempt to get the string from the $_SERVER variable ? 	
	public $script_name;
	public $request;

	private static function set_get($array){
		unset($_GET);	
		foreach($array as $key=>$value){
			if($key != '' && $value != '')
				$_GET[$key] = $value;
		}
	
	}

	public function __construct($get_fields=NULL){
	// written to help reduce HTML markup mainly...
		if($_SERVER['REQUEST_URI'] != ''){
			if($_SERVER['QUERY_STRING']){
				$query = explode('/',$_SERVER['QUERY_STRING']);
				$this->script_name = $_SERVER['SCRIPT_NAME'];
				if ($get_fields!=NULL && is_array($get_fields))
					self::set_get( array_combine($get_fields,$query)) ;
				$this->request = $query;
			}else{
				$query = explode('?',$_SERVER['REQUEST_URI'],2);
				$this->script_name = $query[0];
				$this->request = explode('/',$query[1]);
			}
		}
	}
}

