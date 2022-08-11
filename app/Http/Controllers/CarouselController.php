<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
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
        $carousel = DB::connection('mysql')->select('SELECT *FROM carousel ORDER BY id DESC ');

        $data = array(
            'carousel' => $carousel

        );
        return view('admin.carousel.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousel.create');
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
            'subtitle' => 'string|required',
            'img_url' => 'image|required|max:3000'
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
            $path = $request->file('img_url')->storeAs('public/carousel', $fileNamToStore);

        } else {
            $fileNamToStore = null;
        }


        $saveData = DB::connection('mysql')->insert(
            '
                INSERT INTO carousel(
                    title,
                    subtitle,
                    img_url
                    ) VALUES (
                    :title,
                    :subtitle,
                    :img_url
                    )
            ',
            [
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'img_url' => $fileNamToStore
            ]
        );
        if ($saveData) {
            return redirect()->back()->with('success', 'Image saved to carousel successfully.');
        } else {
            return redirect()->back()
                ->with('error', 'Failed saving Image to carousel');
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
        $carousel = DB::connection('mysql')->select('SELECT *FROM carousel WHERE id =:id ', ['id' => $id]);

        $data = array(
            'carousel' => !empty($carousel) ? $carousel[0] : $carousel,
        );
        return view('admin.carousel.view')->with($data);
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
            'subtitle' => 'string|required',
            'img_url' => 'image|required|max:3000'
        ]);


        $checkGallery = DB::connection('mysql')->select('SELECT * FROM carousel WHERE id =:id', ['id' => $id]);
        if (!empty($checkGallery)) {
            //Handle file upload
            if ($request->file('img_url') != null) {
                // get filename with extension
                $fileNameWithExt = $request->file('img_url')->getClientOriginalName();

                //get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                //get just extension
                $extension = $request->file('img_url')->getClientOriginalExtension();

                //filename to store
                $fileNamToStore = $filename . '_' . time() . '.' . $extension;

                //upload the image
                $path = $request->file('img_url')->storeAs('public/carousel', $fileNamToStore);

                if ($checkGallery[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/carousel/' . $checkGallery[0]->img_url);
                }

            } else {
                $fileNamToStore = $checkGallery[0]->img_url;
            }

            $saveData = DB::connection('mysql')->update(
                '
            UPDATE carousel 
            SET           
            img_url =:img_url,
            title =:title,
            subtitle =:subtitle
            WHERE id =:id
            ',
                [
                    'img_url' => $fileNamToStore,
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'id' => $id
                ]
            );
            if ($saveData) {
                return redirect()->back()->with('success', 'carousel image updated successfully.');
            } else {
                return redirect()->back()
                    ->with('error', 'Failed updating carousel image, change something on the fields to update!');
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
        $checkGallery = DB::connection('mysql')->select('SELECT * FROM carousel WHERE id =:id', ['id' => $id]);
        if (!empty($checkGallery)) {


            $delete = DB::connection('mysql')->select('DELETE FROM carousel WHERE id=:id', ['id' => $id]);
            if ($delete) {
                if ($checkGallery[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/carousel/' . $checkGallery[0]->img_url);
                }


                $carousel = DB::connection('mysql')->select('SELECT *FROM carousel ORDER BY id DESC ');

                $data = array(
                    'carousel' => $carousel,
                    'success' => 'Image deleted from carousel'

                );
                return redirect()->route('all_carousel')->with($data);
            } else {
                $carousel = DB::connection('mysql')->select('SELECT *FROM carousel ORDER BY id DESC ');

                $data = array(
                    'carousel' => $carousel,
                    'error' => 'Deleting image from carousel failed'

                );
                return redirect()->route('all_carousel')->with($data);
            }

        } else {
            $carousel = DB::connection('mysql')->select('SELECT *FROM carousel ORDER BY id DESC ');

            $data = array(
                'carousel' => $carousel,
                'error' => 'Deleting image from carousel failed'

            );
            return redirect()->route('all_carousel')->with($data);

        }
    }



    //================================================
    //====================PUBLIC======================
    //================================================
    public function get_public_gallery()
    {
        $carousel = DB::connection('mysql')->select('SELECT *FROM carousel ORDER BY id DESC  ');

        $data = array(
            'carousel' => $carousel

        );
        return view('public.carousel.index')->with($data);
    }
}
