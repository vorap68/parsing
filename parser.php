<?php

class Parser {

    private $curl;
    //private $url;

    public function __construct($print = false) {
	$this->curl = curl_init();
	if (!$print) {
	    curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
	}
	}
    
    public function set($name,$value) {
	curl_setopt($this->curl, $name, $value);
	return $this; 
	}
	
	public function exec($url) {
	    curl_setopt($this->curl, CURLOPT_URL, $url);
	     return curl_exec($this->curl);
	    
	}
	public function __destruct() {
	    curl_close($this->curl);
	}
    

}
