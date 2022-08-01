<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
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
        $staff = DB::connection('mysql')->select('SELECT *FROM staff ORDER BY staff_name ASC ');

        $data = array(
            'staff_members' => $staff

        );
        return view('admin.staff.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');
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
            'title' => 'string|required|max:5',
            'staff_name' => 'string|required|max:60',
            'staff_email' => 'string|nullable|max:60',
            'staff_phone' => 'string|nullable|max:15',
            'position' => 'string|required|max:60',
            'staff_bio' => 'string|required'
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
            $path = $request->file('img_url')->storeAs('public/staff', $fileNamToStore);

        } else {
            $fileNamToStore = "noimage.jpg";
        }


        $saveData = DB::connection('mysql')->insert(
            '
                INSERT INTO staff(
                        title, 
                        staff_name, 
                        staff_email, 
                        staff_phone, 
                        position, 
                        staff_bio, 
                        img_url
                    ) VALUES (
                        :title, 
                        :staff_name, 
                        :staff_email, 
                        :staff_phone, 
                        :position, 
                        :staff_bio, 
                        :img_url
                    )
            ',
            [
                'title' => $request->title,
                'staff_name' => $request->staff_name,
                'staff_email' => $request->staff_email,
                'staff_phone' => $request->staff_phone,
                'position' => $request->position,
                'staff_bio' => $request->staff_bio,
                'img_url' => $fileNamToStore
            ]
        );
        if ($saveData) {
            return redirect()->back()->with('success', 'Staff member created successfully.');
        } else {
            return redirect()->back()
                ->with('error', 'Failed creating Staff member');
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
        $staff = DB::connection('mysql')->select('SELECT *FROM staff WHERE id =:id ', ['id' => $id]);

        $data = array(
            'staff' => !empty($staff) ? $staff[0] : $staff,
        );
        return view('admin.staff.view')->with($data);
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
            'title' => 'string|required|max:5',
            'staff_name' => 'string|required|max:60',
            'staff_email' => 'string|nullable|max:60',
            'staff_phone' => 'string|nullable|max:15',
            'position' => 'string|required|max:60',
            'staff_bio' => 'string|required'
        ]);


        $checkStaff = DB::connection('mysql')->select('SELECT * FROM staff WHERE id =:id', ['id' => $id]);
        if (!empty($checkStaff)) {
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
                $path = $request->file('img_url')->storeAs('public/staff', $fileNamToStore);

                if ($checkStaff[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/staff/' . $checkStaff[0]->img_url);
                }

            } else {
                $fileNamToStore = $checkStaff[0]->img_url;
            }


            $saveData = DB::connection('mysql')->update(
                '
            UPDATE staff 
            SET
            
            title=:title,
            staff_name=:staff_name,
            staff_email=:staff_email,
            staff_phone=:staff_phone,
            position=:position,
            staff_bio=:staff_bio,
            img_url=:img_url
         
            WHERE id =:id
            ',
                [
                    'title' => $request->title,
                    'staff_name' => $request->staff_name,
                    'staff_email' => $request->staff_email,
                    'staff_phone' => $request->staff_phone,
                    'position' => $request->position,
                    'staff_bio' => $request->staff_bio,
                    'img_url' => $fileNamToStore,
                    'id' => $id
                ]
            );
            if ($saveData) {
                return redirect()->back()->with('success', 'Staff member updated successfully.');
            } else {
                return redirect()->back()
                    ->with('error', 'Failed updating staff member');
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
        $checkStaff = DB::connection('mysql')->select('SELECT * FROM staff WHERE id =:id', ['id' => $id]);
        if (!empty($checkStaff)) {


            $delete = DB::connection('mysql')->select('DELETE FROM staff WHERE id=:id', ['id' => $id]);
            if ($delete) {
                if ($checkStaff[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/staff/' . $checkStaff[0]->img_url);
                }

                $staff = DB::connection('mysql')->select('SELECT *FROM staff ORDER BY staff_name ASC ');

                $data = array(
                    'staff' => $staff,
                    'success' => 'Staff member deleted'

                );
                return redirect()->route('all_staff')->with($data);
            } else {
                if ($checkStaff[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/staff/' . $checkStaff[0]->img_url);
                }

                $staff = DB::connection('mysql')->select('SELECT *FROM staff ORDER BY staff_name ASC ');

                $data = array(
                    'staff' => $staff,
                    'success' => 'Failed deleting staff member'

                );
                return redirect()->route('all_staff')->with($data);
            }

        } else {
            $staff = DB::connection('mysql')->select('SELECT *FROM staff ORDER BY staff_name ASC ');

            $data = array(
                'staff' => $staff,
                'success' => 'Failed deleting staff member'

            );
            return redirect()->route('all_staff')->with($data);
        }
    }

    //================================================
    //====================PUBLIC=======================
    //================================================

    public function get_all_public_staff()
    {
        $staff = DB::connection('mysql')->select('SELECT *FROM staff ORDER BY staff_name ASC ');

        $data = array(
            'staff_members' => $staff

        );
        return view('public.staff.index')->with($data);
    }


}
