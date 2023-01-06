<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Get All Users
     * 
     * @return array $users
     */
    public function index()
    {
        $users = $this->userService->getUsers();
        return view('index', ['user' => $users]);
    }

    /**
     * Save User
     * 
     * @param Request $request
     */
    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' =>  'required|email:rfc',
            'password' => [
                'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            ]
        ]);
        $request['password'] = Hash::make($request->password);
        $this->userService->save($request->all());
        return redirect()->route('index');
    }

    /**
     * Show Password By Id
     * 
     * @param integer $id
     * @return Object $password
     */
    public function password($id)
    {
        $password = $this->userService->showpassword($id);
        return view('password', ['password' => $password]);
    }

    /**
     * Update password By Id
     */
    public function updatepassword($id, Request $request)
    {
        // $row = $request->password_confirmation;
        // dd($row);
        $validated = $request->validate([
            'oldpassword' => [
                'required',
                'min:6',
            ],
            'newpassword' => 'min:6|required_with:password_confirmation|same:password_confirmation|different:oldpassword',
            'password_confirmation' => 'min:6|required',
        ]);
        $request['newpassword'] = Hash::make($request->newpassword);
        $this->userService->updatePassword($id, $request);
        return redirect()->route('index');
    }

    /**
     * Show User By Id
     * 
     * @param integer $id
     * @return Object $user
     */
    public function edit($id)
    {
        $user = $this->userService->getUserbyId($id);
        return view('edit', ['user' => $user]);
    }

    /**
     * Update user By Id
     * 
     * @param integer $id 
     * @param Request $request
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' =>  'required|email:rfc',
        ]);
        $this->userService->updateUserById($id, $request);
        return redirect()->route('index');
    }

    /**
     * Delete User By Id
     * 
     * @param integer $id
     */
    public function delete($id)
    {
        $this->userService->deleteUserById($id);
        return redirect('index');
    }
}
