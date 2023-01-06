<?php

namespace App\Contracts\Dao;

interface UserDaoInterface
{
    public function save($user);
    public function getUsers();
    public function getUserbyId($id);
    public function updateUserById($id, $request);
    public function deleteUserById($id);
    public function showpassword($id);
    public function updatePassword($id, $request);
}
