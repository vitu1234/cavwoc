<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function getAllNews(){
        $news = DB::select('SELECT *FROM news ORDER BY id DESC');

    }

}
