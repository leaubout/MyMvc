<?php

/**
 * Envoi de la réponse au navigateur
 * @author blabla
 *
 */
class Response{
    
    protected $responseCode = 200;
    protected $contentType = 'Content-type : text/html';
    
    //public function __toString(){
        //return $this->view->render();
    //}
	/**
     * @return the $responseCode
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

	/**
     * @return the $contentType
     */
    public function getContentType()
    {
        return $this->contentType;
    }

	/**
     * @param number $responseCode
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;
    }

	/**
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    
}