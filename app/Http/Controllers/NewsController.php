<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function getAllNews(){
        $news = DB::connection('mysql')->select('SELECT *FROM news ORDER BY id DESC');
        $data = array(
            'news' => $news,
        );
        return view('public.news.index')->with($data);
    }

}
