<?php

class Service_User
{
    private $userMapper;
    
    public function find($id){
        return $this->getUserMapper()->find($id);
    }
    
    public function getUserMapper(){
        if (null == $this->userMapper){
            require_once APP_PATH . '/models/mappers/User.php';
            $this->userMapper = new Mapper_User;
        }
        return $this->userMapper;
    }
}