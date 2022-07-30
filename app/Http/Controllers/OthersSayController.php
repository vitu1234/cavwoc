<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OthersSayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $others_say = DB::connection('mysql')->select('SELECT *FROM  others_say ORDER BY id DESC ');

        $data = array(
            'others_say' => $others_say

        );
        return view('admin.others_say.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.others_say.create');
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
            'fullname' => 'string|required|max:100',
            'what_they_say' => 'string|required|max:255',
            'profession' => 'string|required|max:30',
        ]);

        //Handle file upload
        if ($request->hasFile('profile_picture')) {
            // get filename with extension
            $fileNameWithExt = $request->file('profile_picture')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('profile_picture')->getClientOriginalExtension();

            //filename to store
            $fileNamToStore = $filename . '_' . time() . '.' . $extension;

            //upload the image
            $path = $request->file('profile_picture')->storeAs('public/others_say', $fileNamToStore);

        } else {
            $fileNamToStore = 'noimage.jpg';
        }


        $saveData = DB::connection('mysql')->insert(
            '
                INSERT INTO others_say(
                        fullname, 
                        what_they_say, 
                        profession, 
                        profile_picture
                    ) VALUES (
                        :fullname,
                        :what_they_say,
                        :profession,
                        :profile_picture
                    )
            ',
            [
                'fullname' => $request->fullname,
                'what_they_say' => $request->what_they_say,
                'profession' => $request->profession,
                'profile_picture' => $fileNamToStore
            ]
        );
        if ($saveData) {
            return redirect()->back()->with('success', 'What others say -  created successfully.');
        } else {
            return redirect()->back()
                ->with('error', 'Failed saving What others say');
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
        $others_say = DB::connection('mysql')->select('SELECT *FROM others_say WHERE id =:id ', ['id' => $id]);

        $data = array(
            'others_say' => !empty($others_say) ? $others_say[0] : $others_say,
        );
        return view('admin.others_say.view')->with($data);
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
            'fullname' => 'string|required|max:100',
            'what_they_say' => 'string|required|max:255',
            'profession' => 'string|required|max:30',
        ]);


        $checkOthersSay = DB::connection('mysql')->select('SELECT * FROM others_say WHERE id =:id', ['id' => $id]);
        if (!empty($checkOthersSay)) {
            //Handle file upload
            if ($request->hasFile('profile_picture')) {
                // get filename with extension
                $fileNameWithExt = $request->file('profile_picture')->getClientOriginalName();

                //get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                //get just extension
                $extension = $request->file('profile_picture')->getClientOriginalExtension();

                //filename to store
                $fileNamToStore = $filename . '_' . time() . '.' . $extension;

                //upload the image
                $path = $request->file('profile_picture')->storeAs('public/others_say', $fileNamToStore);

                if ($checkOthersSay[0]->profile_picture != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/others_say/' . $checkOthersSay[0]->profile_picture);
                }

            } else {
                $fileNamToStore = $checkOthersSay[0]->profile_picture;
            }

            $saveData = DB::connection('mysql')->update(
                '
            UPDATE others_say 
            SET
                fullname=:fullname, 
                what_they_say=:what_they_say, 
                profession=:profession,            
                profile_picture =:profile_picture
            WHERE id =:id
            ',
                [
                    'fullname' => $request->fullname,
                    'what_they_say' => $request->what_they_say,
                    'profession' => $request->profession,
                    'profile_picture' => $fileNamToStore,
                    'id' => $id
                ]
            );
            if ($saveData) {
                return redirect()->back()->with('success', 'What others say - updated successfully.');
            } else {
                return redirect()->back()
                    ->with('error', 'Failed updating - What others say');
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
        $checkOthersSay = DB::connection('mysql')->select('SELECT * FROM others_say WHERE id =:id', ['id' => $id]);
        if (!empty($checkOthersSay)) {


            $delete = DB::connection('mysql')->select('DELETE FROM others_say WHERE id=:id', ['id' => $id]);
            if ($delete) {
                if ($checkOthersSay[0]->profile_picture != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/others_say/' . $checkOthersSay[0]->profile_picture);
                }


                $others_say = DB::connection('mysql')->select('SELECT *FROM others_say ORDER BY id DESC ');

                $data = array(
                    'others_say' => $others_say,
                    'success' => 'What others say -  deleted'

                );
                return redirect()->route('all_others_say')->with($data);
            } else {
                $others_say = DB::connection('mysql')->select('SELECT *FROM others_say ORDER BY id DESC ');

                $data = array(
                    'others_say' => $others_say,
                    'error' => 'What others say -  deleting failed'

                );
                return redirect()->route('all_others_say')->with($data);
            }

        } else {
            $others_say = DB::connection('mysql')->select('SELECT *FROM others_say ORDER BY id DESC ');

            $data = array(
                'others_say' => $others_say,
                'error' => 'What others say - deleting failed'

            );
            return redirect()->route('all_others_say')->with($data);

        }
    }
}
