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
				$this->request = explode('/',$_SERVER['QUERY_STRING']);
				// this is a wee bit of code to make the array_combine function work
				// and to process query strings as the URLS they resemble in the order of the array that is passed to it
				if( (int) count($this->request) != (int) count($get_fields) )
						foreach($get_fields as $loc=>$value)
							if(!array_key_exists($loc,$this->request ))
								unset($get_fields[$loc]);
				$this->script_name = $_SERVER['SCRIPT_NAME'];
				$this->request = array_combine($get_fields,$this->request);
				$get_fields!=NULL && is_array($get_fields) AND self::set_get( $this->request) ;
			}
		}
	}
}

