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
        $others_say = DB::connection('mysql')->select('SELECT *FROM others_say  ORDER BY id DESC LIMIT 4 ');
        $partners = DB::connection('mysql')->select('SELECT *FROM partners');
        $data = array(
            'news' => $news,
            'projects' => $projects,
            'carousels' => $carousel,
            'others_say' => $others_say,
            'partners' => $partners
        );
        return view('index')->with($data);
    }

    public function get_public_about_page()
    {
        return view('public.about.index');

    }

    public function contact_us(){
        return view('public.contact_us.index');

    }

}
