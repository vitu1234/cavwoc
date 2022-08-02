<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
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
        $gallery = DB::connection('mysql')->select('SELECT *FROM gallery ORDER BY id DESC ');

        $data = array(
            'gallery' => $gallery

        );
        return view('admin.gallery.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
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
            'title' => 'string|required',
            'img_url' => 'file|required'
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
            $path = $request->file('img_url')->storeAs('public/gallery', $fileNamToStore);

        } else {
            $fileNamToStore = null;
        }


        $saveData = DB::connection('mysql')->insert(
            '
                INSERT INTO gallery(
                    title,
                    img_url
                    ) VALUES (
                    :title,
                    :img_url
                    )
            ',
            [
                'title' => $request->title,
                'img_url' => $fileNamToStore
            ]
        );
        if ($saveData) {
            return redirect()->back()->with('success', 'Image saved to gallery successfully.');
        } else {
            return redirect()->back()
                ->with('error', 'Failed saving Image to gallery');
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
        $gallery = DB::connection('mysql')->select('SELECT *FROM gallery WHERE id =:id ', ['id' => $id]);

        $data = array(
            'gallery' => !empty($gallery) ? $gallery[0] : $gallery,
        );
        return view('admin.gallery.view')->with($data);
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
            'title' => 'string|required',
            'img_url' => 'file|required'
        ]);


        $checkGallery = DB::connection('mysql')->select('SELECT * FROM gallery WHERE id =:id', ['id' => $id]);
        if (!empty($checkGallery)) {
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
                $path = $request->file('img_url')->storeAs('public/gallery', $fileNamToStore);

                if ($checkGallery[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/gallery/' . $checkGallery[0]->img_url);
                }

            } else {
                $fileNamToStore = $checkGallery[0]->img_url;
            }

            $saveData = DB::connection('mysql')->update(
                '
            UPDATE gallery 
            SET           
            img_url =:img_url,
            title =:title
            WHERE id =:id
            ',
                [
                    'img_url' => $fileNamToStore,
                    'title' => $request->title,
                    'id' => $id
                ]
            );
            if ($saveData) {
                return redirect()->back()->with('success', 'Gallery image updated successfully.');
            } else {
                return redirect()->back()
                    ->with('error', 'Failed updating gallery image');
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
        $checkGallery = DB::connection('mysql')->select('SELECT * FROM gallery WHERE id =:id', ['id' => $id]);
        if (!empty($checkGallery)) {


            $delete = DB::connection('mysql')->select('DELETE FROM gallery WHERE id=:id', ['id' => $id]);
            if ($delete) {
                if ($checkGallery[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/gallery/' . $checkGallery[0]->img_url);
                }


                $gallery = DB::connection('mysql')->select('SELECT *FROM gallery ORDER BY id DESC ');

                $data = array(
                    'gallery' => $gallery,
                    'success' => 'Image deleted from gallery'

                );
                return redirect()->route('all_gallery')->with($data);
            } else {
                $gallery = DB::connection('mysql')->select('SELECT *FROM gallery ORDER BY id DESC ');

                $data = array(
                    'gallery' => $gallery,
                    'error' => 'Deleting image from galleryfailed'

                );
                return redirect()->route('all_gallery')->with($data);
            }

        } else {
            $gallery = DB::connection('mysql')->select('SELECT *FROM gallery ORDER BY id DESC ');

            $data = array(
                'gallery' => $gallery,
                'error' => 'Deleting image from galleryfailed'

            );
            return redirect()->route('all_gallery')->with($data);

        }
    }



    //================================================
    //====================PUBLIC======================
    //================================================
    public function get_public_gallery()
    {
        $gallery = DB::connection('mysql')->select('SELECT *FROM gallery ORDER BY id DESC ');

        $data = array(
            'gallery' => $gallery

        );
        return view('public.gallery.index')->with($data);
    }
}
