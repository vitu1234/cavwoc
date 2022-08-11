<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DonationsController extends Controller
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
        $donations = DB::connection('mysql')->select('SELECT *FROM donations ORDER BY id DESC ');

        $data = array(
            'donations' => $donations,

        );
        return view('admin.donations.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.donations.create');
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
            'project_name' => 'string|required|max:255',
            'project_summary' => 'string|nullable',
            'budgeted_amount' => 'string|required',
            'amount_raised' => 'string|required',
            'project_context' => 'string|required',
            'img_url' => 'image|nullable|max:3000',
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
            $path = $request->file('img_url')->storeAs('public/donations', $fileNamToStore);

        } else {
            $fileNamToStore = 'noimage.jpg';
        }


        $saveData = DB::connection('mysql')->insert(
            '
                INSERT INTO donations(
                    project_name, 
                    project_summary, 
                    img_url, 
                    budgeted_amount, 
                    amount_raised,
                    project_context
                    ) VALUES (
                    :project_name, 
                    :project_summary, 
                    :img_url, 
                    :budgeted_amount, 
                    :amount_raised,
                    :project_context
                    )
            ',
            [
                'project_name' => $request->project_name,
                'project_summary' => $request->project_summary,
                'img_url' => $fileNamToStore,
                'budgeted_amount' => $request->budgeted_amount,
                'amount_raised' => $request->amount_raised,
                'project_context' => $request->project_context
            ]
        );
        if ($saveData) {
            return redirect()->back()->with('success', 'Project created successfully.');
        } else {
            return redirect()->back()
                ->with('error', 'Failed creating project');
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
        $project = DB::connection('mysql')->select('SELECT *FROM donations WHERE id =:id ', ['id' => $id]);

        $data = array(
            'project' => !empty($project) ? $project[0] : $project,
        );
        return view('admin.donations.view')->with($data);
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
            'project_name' => 'string|required|max:255',
            'project_summary' => 'string|nullable',
            'budgeted_amount' => 'string|required',
            'amount_raised' => 'string|required',
            'project_context' => 'string|required',
            'img_url' => 'image|nullable|max:3000',
        ]);


        $checkProject = DB::connection('mysql')->select('SELECT * FROM donations WHERE id =:id', ['id' => $id]);
        if (!empty($checkProject)) {
            //Handle file upload
            if ($request->file('img_url') !=null) {
                // get filename with extension
                $fileNameWithExt = $request->file('img_url')->getClientOriginalName();

                //get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                //get just extension
                $extension = $request->file('img_url')->getClientOriginalExtension();

                //filename to store
                $fileNamToStore = $filename . '_' . time() . '.' . $extension;

                //upload the image
                $path = $request->file('img_url')->storeAs('public/donations', $fileNamToStore);

                if ($checkProject[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/donations/' . $checkProject[0]->img_url);
                }

            } else {
                $fileNamToStore = $checkProject[0]->img_url;
            }

            $saveData = DB::connection('mysql')->update(
                '
            UPDATE donations 
            SET
            project_name =:project_name,
            project_summary =:project_summary,
            img_url =:img_url,
            budgeted_amount =:budgeted_amount,
            amount_raised =:amount_raised,
            project_context =:project_context
                
            WHERE id =:id
            ',
                [
                    'project_name' => $request->project_name,
                    'project_summary' => $request->project_summary,
                    'img_url' => $fileNamToStore,
                    'budgeted_amount' => $request->budgeted_amount,
                    'amount_raised' => $request->amount_raised,
                    'project_context' => $request->project_context,
                    'id' => $id
                ]
            );
            if ($saveData) {
                return redirect()->back()->with('success', 'Project updated successfully.');
            } else {
                return redirect()->back()
                    ->with('error', 'Failed updating project, change something on the fields to update!');
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
        $checkProject = DB::connection('mysql')->select('SELECT * FROM donations WHERE id =:id', ['id' => $id]);
        if (!empty($checkProject)) {


            $delete = DB::connection('mysql')->select('DELETE FROM donations WHERE id=:id', ['id' => $id]);
            if ($delete) {
                if ($checkProject[0]->project_file != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/donations/' . $checkProject[0]->project_file);
                }

                $donations = DB::connection('mysql')->select('SELECT *FROM donations ORDER BY id DESC ');

                $data = array(
                    'donations' => $donations,
                    'success' => 'Project deleted'

                );
                return redirect()->route('all_donations')->with($data);
            } else {
                $donations = DB::connection('mysql')->select('SELECT *FROM donations ORDER BY id DESC ');

                $data = array(
                    'donations' => $donations,
                    'error' => 'Failed to delete'

                );
                return redirect()->route('all_donations')->with($data);
            }

        } else {
            $donations = DB::connection('mysql')->select('SELECT *FROM donations ORDER BY id DESC ');

            $data = array(
                'donations' => $donations,
                'error' => 'Failed to delete'

            );
            return redirect()->route('all_donations')->with($data);

        }
    }

    //================================================
    //====================PUBLIC======================
    //================================================
    public function get_public_donations()
    {
        $donations = DB::connection('mysql')->select('SELECT *FROM donations ORDER BY id DESC ');

        $data = array(
            'projects' => $donations

        );
        return view('public.donations.index')->with($data);
    }

    public function get_single_public_donation($id)
    {
        $donations = DB::connection('mysql')->select('SELECT *FROM donations WHERE id =:id ', ['id' => $id]);
        $related_projects = DB::connection('mysql')->select('SELECT *FROM donations WHERE id <>:id ORDER BY RAND() LIMIT 5 ', ['id' => $id]);

        $data = array(
            'project' => !empty($donations) ? $donations[0] : $donations,
            'related_donations' => $related_projects
        );
        return view('public.donations.single_donation')->with($data);
    }
}
