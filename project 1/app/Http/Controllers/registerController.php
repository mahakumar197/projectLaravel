<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\userRegister;

class registerController extends Controller
{

    public function userRegister()
    {
        return view('register');
    }
    public function addUser(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).+$/',
            ],
        ], [
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least :min characters.',
            'password.regex' => 'The password must include at least one uppercase letter, one number, and one special character.',
        ]);

        $addUser = new userRegister;
        $addUser->name = $request->name;
        $addUser->email = $request->email;
        $addUser->password = $request->password;
        $addUser->designation = $request->designation;
        $addUser->save();

        return back()->withSuccess('Thanks for registering');
    }
    public function getUser()
    {
        $getName = userRegister::get();
        // dd($getName);
        return view('viewUser', ['getUserData' => $getName]);
    }
    public function editUser($id)
    {
        $user = userRegister::where('id', $id)->first();
        return view('editUser', ['user' => $user]);
    }
    public function editUserData(Request $request, $id)
    {
        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).+$/',
            ],
        ], [
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least :min characters.',
            'password.regex' => 'The password must include at least one uppercase letter, one number, and one special character.',
        ]);
        $editUserDetails = userRegister::where('id', $id)->first();
        $editUserDetails->name = $request->name;
        $editUserDetails->email = $request->email;
        $editUserDetails->password = $request->password;
        $editUserDetails->designation = $request->designation;
        $editUserDetails->save();
        $editDetails = userRegister::get();
        // $result = $this->getUser();
        // return $result;
        return redirect('/user')->withSuccess('User updated successfully');

        // return view('viewUser', ['getUserData' => $editDetails])->with('success', 'user updated successfully');
    }

    public function deleteUser($id)
    {
        $product = userRegister::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('user Deleted Successfully');
    }
    public function showRegistrationForm()
    {
        return view('register');
    }
}
