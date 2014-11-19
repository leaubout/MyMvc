<?php

class User{
    
    private $userId;
    private $userName;
    private $userPassword;
	/**
     * @return the $userId
     */
    public function getId()
    {
        return $this->userId;
    }

	/**
     * @return the $userName
     */
    public function getName()
    {
        return $this->userName;
    }

	/**
     * @return the $userPassword
     */
    public function getPassword()
    {
        return $this->userPassword;
    }

	/**
     * @param field_type $userId
     */
    public function setId($id)
    {
        $this->userId = $id;
        return $this;
    }

	/**
     * @param field_type $userName
     */
    public function setName($name)
    {
        $this->userName = $name;
        return $this;
    }

	/**
     * @param field_type $userPassword
     */
    public function setPassword($password)
    {
        $this->userPassword = $password;
        return $this;
    }

    
    
}