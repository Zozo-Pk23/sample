<?php

namespace App\Http\Services;

use App\Contracts\Services\UserInterface;
use App\Http\Dao\UserDao;

class UserService implements UserInterface
{
    private $userDao;
    public function __construct(UserDao $userDao)
    {
        $this->userDao = $userDao;
    }
    public function save($request)
    {
        //dd($request);
        return $this->userDao->save($request);
    }
    public function getUsers()
    {
        return $this->userDao->getUsers();
    }
    public function getUserbyId($id)
    {
        return $this->userDao->getUserbyId($id);
    }
    public function updateUserById($id, $request)
    {
        //dd($id);
        return $this->userDao->updateUserById($id, $request);
    }
    public function deleteUserById($id)
    {
        return $this->userDao->deleteUserById($id);
    }
    public function showpassword($id)
    {
        return $this->userDao->showpassword($id);
    }
    public function updatePassword($id,$request)
    {
        return $this->userDao->updatePassword($id,$request);
    }
}
