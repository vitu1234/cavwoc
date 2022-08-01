<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //================================================
    //====================ADMIN=======================
    //================================================

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::connection('mysql')->select('SELECT *FROM news ORDER BY id DESC ');

        $data = array(
            'news' => $news

        );
        return view('admin.news.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string|required|max:255',
            'body' => 'string|required'
        ]);

        //Handle file upload
        if ($request->hasFile('img_url')) {
            // get filename with extension
            $fileNameWithExt = $request->file('img_url')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('img_url')->getClientOriginalExtension();

            //filename to store
            $fileNamToStore = $filename . '_' . time() . '.' . $extension;

            //upload the image
            $path = $request->file('img_url')->storeAs('public/news', $fileNamToStore);

        } else {
            $fileNamToStore = null;
        }

        //Handle file upload
        if ($request->hasFile('attachment_url')) {
            // get filename with extension
            $fileNameWithExt = $request->file('attachment_url')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('attachment_url')->getClientOriginalExtension();

            //filename to store
            $project_file_name = $filename . '_' . time() . '.' . $extension;

            //upload the image
            $path = $request->file('attachment_url')->storeAs('public/news', $project_file_name);

        } else {
            $project_file_name = null;
        }

        $saveData = DB::connection('mysql')->insert(
            '
                INSERT INTO news(
                    title, 
                    body, 
                    attachment_url, 
                    img_url
                    ) VALUES (
                    :title, 
                    :body, 
                    :attachment_url, 
                    :img_url
                    )
            ',
            [
                'title' => $request->title,
                'body' => $request->body,
                'attachment_url' => $project_file_name,
                'img_url' => $fileNamToStore
            ]
        );
        if ($saveData) {
            return redirect()->back()->with('success', 'News article created successfully.');
        } else {
            return redirect()->back()
                ->with('error', 'Failed creating news article');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = DB::connection('mysql')->select('SELECT *FROM news WHERE id =:id ', ['id' => $id]);

        $data = array(
            'news' => !empty($news) ? $news[0] : $news,
        );
        return view('admin.news.view')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string|required|max:255',
            'body' => 'string|required'
        ]);


        $checkNews = DB::connection('mysql')->select('SELECT * FROM news WHERE id =:id', ['id' => $id]);
        if (!empty($checkNews)) {
            //Handle file upload
            if ($request->hasFile('img_url')) {
                // get filename with extension
                $fileNameWithExt = $request->file('img_url')->getClientOriginalName();

                //get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                //get just extension
                $extension = $request->file('img_url')->getClientOriginalExtension();

                //filename to store
                $fileNamToStore = $filename . '_' . time() . '.' . $extension;

                //upload the image
                $path = $request->file('img_url')->storeAs('public/news', $fileNamToStore);

                if ($checkNews[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/news/' . $checkNews[0]->img_url);
                }

            } else {
                $fileNamToStore = $checkNews[0]->img_url;
            }

            //Handle file upload
            if ($request->hasFile('attachment_url')) {
                // get filename with extension
                $fileNameWithExt = $request->file('attachment_url')->getClientOriginalName();

                //get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                //get just extension
                $extension = $request->file('attachment_url')->getClientOriginalExtension();

                //filename to store
                $attachment_url = $filename . '_' . time() . '.' . $extension;

                //upload the image
                $path = $request->file('attachment_url')->storeAs('public/news', $attachment_url);

                if (!empty($checkNews[0]->attachment_url)) {
                    //delete image
                    Storage::delete('public/news/' . $checkNews[0]->attachment_url);
                }

            } else {
                $attachment_url = $checkNews[0]->attachment_url;
            }
            $saveData = DB::connection('mysql')->update(
                '
            UPDATE news 
            SET
            
            title =:title,
            body =:body,
            attachment_url =:attachment_url,
            img_url =:img_url
            WHERE id =:id
            ',
                [
                    'title' => $request->title,
                    'body' => $request->body,
                    'attachment_url' => $attachment_url,
                    'img_url' => $fileNamToStore,
                    'id' => $id
                ]
            );
            if ($saveData) {
                return redirect()->back()->with('success', 'News article updated successfully.');
            } else {
                return redirect()->back()
                    ->with('error', 'Failed updating news article');
            }
        } else {
            return redirect()->back()
                ->with('error', 'Requested resource not found!');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkNews = DB::connection('mysql')->select('SELECT * FROM news WHERE id =:id', ['id' => $id]);
        if (!empty($checkNews)) {


            $delete = DB::connection('mysql')->select('DELETE FROM news WHERE id=:id', ['id' => $id]);
            if ($delete) {
                if ($checkNews[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/news/' . $checkNews[0]->img_url);
                }

                if (!empty($checkNews[0]->attachment_url)) {
                    //delete image
                    Storage::delete('public/news/' . $checkNews[0]->attachment_url);
                }
                $news = DB::connection('mysql')->select('SELECT *FROM news ORDER BY id DESC ');

                $data = array(
                    'news' => $news,
                    'success' => 'News article deleted'

                );
                return redirect()->route('all_news')->with($data);
            } else {
                $projects = DB::connection('mysql')->select('SELECT *FROM news ORDER BY id DESC ');

                $data = array(
                    'news' => $projects,
                    'error' => 'Failed to delete'

                );
                return redirect()->route('all_news')->with($data);
            }

        } else {
            $projects = DB::connection('mysql')->select('SELECT *FROM projects ORDER BY id DESC ');

            $data = array(
                'projects' => $projects,
                'error' => 'Failed to delete'

            );
            return redirect()->route('all_projects')->with($data);

        }
    }

    //================================================
    //====================PUBLIC======================
    //================================================

    public function get_public_news()
    {
        $news = DB::connection('mysql')->select('SELECT *FROM news ORDER BY id DESC ');

        $data = array(
            'news' => $news

        );
        return view('public.news.index')->with($data);
    }

    public function get_single_public_news($id)
    {
        $news = DB::connection('mysql')->select('SELECT *FROM news WHERE id =:id ', ['id' => $id]);
        $related_news = DB::connection('mysql')->select('SELECT *FROM news WHERE id <>:id ORDER BY RAND() LIMIT 5 ', ['id' => $id]);

        $data = array(
            'news' => !empty($news) ? $news[0] : $news,
            'related_news' => $related_news
        );
        return view('public.news.single_news')->with($data);
    }
}
