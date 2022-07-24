<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{

    public function setHomePage()
    {
        $news = DB::connection('mysql')->select('SELECT *FROM news ORDER BY id DESC LIMIT 4 ');
        $projects = DB::connection('mysql')->select('SELECT *FROM projects  ORDER BY id DESC LIMIT 4');
        $carousel = DB::connection('mysql')->select('SELECT *FROM carousel  ORDER BY id ');
        $data = array(
            'news' => $news,
            'projects' => $projects,
            'carousels' => $carousel,
        );
        return view('index')->with($data);
    }

}
