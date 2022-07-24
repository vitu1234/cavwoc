<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{

    public function setHomePage(){
        $news = DB::connection('mysql')->select('SELECT *FROM news LIMIT 4 ORDER BY id DESC');
        $data = array(
            'news' => $news,
        );
        return view('public.news.index')->with($data);
    }

}
