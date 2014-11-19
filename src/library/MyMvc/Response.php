<?php

namespace MyMVC;

class Response {
	private $httpCode = 200;
	private $headers = array();
	private $body;
	private $httpCodes = array(
		200 => 'Zut',
		301 => 'Moved Permanently',
		403 => 'Forbidden',
		404 => 'Not Found',
		500 => 'Internal Server Error'
	);

	public function setHttpCode($code){

		if (!array_key_exists($code, $this->httpCodes)){
			throw new \InvalidArgumentException('Code HTTP invalid !');
		}
		$this->httpCode = (int) $code;
		return $this;
	}

	public function addHeader($header){
		$this->headers[] = $header;
	}

	public function setBody($content){
		$this->body = $content;
	}

	public function send(){
		
		header("HTTP/1.1/ ".
			$this->httpCode . " ".
			$this->httpCodes[$this->httpCode]
			);

		foreach($this->headers as $header){
			header($header);
		}

		echo $this->body;
	}
	
}