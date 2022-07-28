<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    public function getUsers()
    {
        $users = DB::connection('mysql')->select('SELECT *FROM users ORDER BY first_name DESC ');

        $data = array(
            'users' => $users,

        );
        return view('admin.users.index')->with($data);
    }

    public function showAddUsersForm()
    {

        return view('admin.users.add');
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'first_name' => 'string|required|max:255',
            'last_name' => 'string|required|max:255',
            'email' => 'string|required|max:255',
            'phone' => 'string|required|max:20',
            'password' => 'string|required|max:30|min:5|confirmed'
        ]);

        $checkUser = DB::connection('mysql')->select('SELECT * FROM users WHERE email =:email', ['email' => $request->email]);
        if (empty($checkUser)) {
            $saveUser = DB::connection('mysql')->insert(
                '
            INSERT INTO users(
                first_name, 
                last_name, 
                email, 
                phone, 
                password
            ) VALUES (
                :first_name, 
                :last_name, 
                :email, 
                :phone, 
                :password
            )',
                [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => app('hash')->make($request->password)
                ]
            );

            if ($saveUser) {
                return redirect()->back()->with('success', 'User created successfully.');
            } else {
                return redirect()->back()
                    ->with('error', 'Failed creating user');
            }
        } else {
            return redirect()->back()
                ->with('error', 'Failed creating user, email is taken already!');
        }


    }

}
