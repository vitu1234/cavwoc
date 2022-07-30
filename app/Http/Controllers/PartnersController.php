<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = DB::connection('mysql')->select('SELECT *FROM partners ORDER BY id DESC ');

        $data = array(
            'partners' => $partners

        );
        return view('admin.partners.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
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
            'link' => 'string|required|max:255',
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
            $path = $request->file('img_url')->storeAs('public/partners', $fileNamToStore);

        } else {
            $fileNamToStore = null;
        }


        $saveData = DB::connection('mysql')->insert(
            '
                INSERT INTO partners(
                    link, 
                    img_url
                    ) VALUES (
                    :link, 
                    :img_url
                    )
            ',
            [
                'link' => $request->link,
                'img_url' => $fileNamToStore
            ]
        );
        if ($saveData) {
            return redirect()->back()->with('success', 'Partner created successfully.');
        } else {
            return redirect()->back()
                ->with('error', 'Failed creating partner');
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
        $partner = DB::connection('mysql')->select('SELECT *FROM partners WHERE id =:id ', ['id' => $id]);

        $data = array(
            'partner' => !empty($partner) ? $partner[0] : $partner,
        );
        return view('admin.partners.view')->with($data);
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
            'link' => 'string|required|max:255',
            'img_url' => 'file|required'
        ]);


        $checkPartner = DB::connection('mysql')->select('SELECT * FROM partners WHERE id =:id', ['id' => $id]);
        if (!empty($checkPartner)) {
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
                $path = $request->file('img_url')->storeAs('public/partners', $fileNamToStore);

                if ($checkPartner[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/partners/' . $checkPartner[0]->img_url);
                }

            } else {
                $fileNamToStore = $checkPartner[0]->img_url;
            }

            $saveData = DB::connection('mysql')->update(
                '
            UPDATE partners 
            SET
            
            link =:link,
           
            img_url =:img_url
            WHERE id =:id
            ',
                [
                    'link' => $request->link,
                    'img_url' => $fileNamToStore,
                    'id' => $id
                ]
            );
            if ($saveData) {
                return redirect()->back()->with('success', 'Partner updated successfully.');
            } else {
                return redirect()->back()
                    ->with('error', 'Failed updating partner');
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
        $checkPartner = DB::connection('mysql')->select('SELECT * FROM partners WHERE id =:id', ['id' => $id]);
        if (!empty($checkPartner)) {


            $delete = DB::connection('mysql')->select('DELETE FROM partners WHERE id=:id', ['id' => $id]);
            if ($delete) {
                if ($checkPartner[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/partners/' . $checkPartner[0]->img_url);
                }


                $partners = DB::connection('mysql')->select('SELECT *FROM partners ORDER BY id DESC ');

                $data = array(
                    'partners' => $partners,
                    'success' => 'Partner deleted'

                );
                return redirect()->route('all_partners')->with($data);
            } else {
                $partners = DB::connection('mysql')->select('SELECT *FROM partners ORDER BY id DESC ');

                $data = array(
                    'partners' => $partners,
                    'error' => 'Partner deleting failed'

                );
                return redirect()->route('all_partners')->with($data);
            }

        } else {
            $partners = DB::connection('mysql')->select('SELECT *FROM partners ORDER BY id DESC ');

            $data = array(
                'partners' => $partners,
                'error' => 'Partner deleting failed'

            );
            return redirect()->route('all_partners')->with($data);

        }
    }
}
