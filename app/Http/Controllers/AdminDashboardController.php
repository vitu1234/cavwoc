<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    function setDashboard()
    {
        $users = DB::connection('mysql')->select('SELECT *FROM users');
        $staff = DB::connection('mysql')->select('SELECT *FROM staff');
        $projects = DB::connection('mysql')->select('SELECT *FROM projects');
        $data = array(
            'users' => $users,
            'staff' => $staff,
            'projects' => $projects,
        );
        return view('admin.index')->with($data);

    }
}
