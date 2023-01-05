<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CRUDController extends Controller
{
    //
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
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->save();
        return redirect()->route('index')->with(['user' => $users]);
    }
    public function index()
    {
        $users = User::where('del_flag', '=', 0)->get();
        // \Log::info($users);
        return view('index', ['user' => $users]);
    }
    public function delete($id)
    {
        // \Log::info('heo');
        // \Log::info($id);
        $row = User::find($id);
        $row->del_flag = 1;
        $row->update();
        return redirect('index');
    }
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' =>  'required|email:rfc',
        ]);
        return redirect()->route('index');
    }
}
