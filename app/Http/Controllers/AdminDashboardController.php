<?php


namespace App\Http\Controllers;


class AdminDashboardController extends Controller
{
    function setDashboard()
    {
        return view('admin.index');

    }
}
