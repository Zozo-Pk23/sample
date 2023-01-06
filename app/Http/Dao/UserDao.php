<?php

namespace app\Http\Dao;

use App\Contracts\Dao\UserDaoInterface;
use App\Models\User;

class UserDao implements UserDaoInterface
{

    public function save($user)
    {
        $user =  User::create(['name' => $user['name'], 'email' => $user['email'], 'password' => $user['password']]);
        return $user;
    }
    public function getUsers()
    {
        $users = User::where('del_flag', '=', 0)->get();
        return $users;
    }
    public function getUserbyId($id)
    {
        $user = User::where('id', $id)->first();
        return $user;
    }
    public function updateUserById($id, $request)
    {
        $row = User::where('id', $id)->update(['name' => $request['name'], 'email' => $request['email']]);
        return $row;
    }
    public function deleteUserById($id)
    {
        $row = User::where('id', $id)->update(['del_flag' => 1]);
        return $row;
    }
    public function showpassword($id)
    {
        $row = User::where('id', $id)->first();
        return $row;
    }
    public function updatePassword($id, $request)
    {
        $row = User::where('id', $id)->update(['password' => $request['newpassword']]);
        return $row;
    }
}
