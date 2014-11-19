<?php

require_once APP_PATH . '/models/DbTable/User.php';
require_once APP_PATH . '/models/User.php';

class Mapper_User
{
    public function find($id){
        $dbTable = new DbTable_User;
        $row = $dbTable->find($id);
        $user = new User();
        $user->setId($row['user_id'])
            ->setName($row['user_name'])
            ->setPassword($row['user_password']);
        return $user;
    }
}