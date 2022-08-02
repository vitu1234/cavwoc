<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
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
        $projects = DB::connection('mysql')->select('SELECT *FROM projects ORDER BY id DESC ');

        $data = array(
            'projects' => $projects,

        );
        return view('admin.projects.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
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
            'project_type' => 'string|required|max:255',
            'project_name' => 'string|required|max:255',
            'project_summary' => 'string|nullable',
            'project_period' => 'string|nullable',
            'budgeted_amount' => 'string|required',
            'amount_raised' => 'string|required',
            'project_context' => 'string|required',
            'project_donor' => 'string|nullable',
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
            $path = $request->file('img_url')->storeAs('public/projects', $fileNamToStore);

        } else {
            $fileNamToStore = null;
        }

        //Handle file upload
        if ($request->hasFile('project_file')) {
            // get filename with extension
            $fileNameWithExt = $request->file('project_file')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('project_file')->getClientOriginalExtension();

            //filename to store
            $project_file_name = $filename . '_' . time() . '.' . $extension;

            //upload the image
            $path = $request->file('project_file')->storeAs('public/projects', $project_file_name);

        } else {
            $project_file_name = null;
        }

        $saveData = DB::connection('mysql')->insert(
            '
                INSERT INTO projects(
                    project_type, 
                    project_name, 
                    project_summary, 
                    project_period, 
                    project_file, 
                    img_url, 
                    budgeted_amount, 
                    amount_raised,
                    project_context,
                    project_donor
                    ) VALUES (
                    :project_type, 
                    :project_name, 
                    :project_summary, 
                    :project_period, 
                    :project_file, 
                    :img_url, 
                    :budgeted_amount, 
                    :amount_raised,
                    :project_context,
                    :project_donor
                    )
            ',
            [
                'project_type' => $request->project_type,
                'project_name' => $request->project_name,
                'project_summary' => $request->project_summary,
                'project_period' => $request->project_period,
                'project_file' => $project_file_name,
                'img_url' => $fileNamToStore,
                'budgeted_amount' => $request->budgeted_amount,
                'amount_raised' => $request->amount_raised,
                'project_context' => $request->project_context,
                'project_donor' => $request->project_donor
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
        $project = DB::connection('mysql')->select('SELECT *FROM projects WHERE id =:id ', ['id' => $id]);

        $data = array(
            'project' => !empty($project) ? $project[0] : $project,
        );
        return view('admin.projects.view')->with($data);
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
            'project_type' => 'string|required|max:255',
            'project_name' => 'string|required|max:255',
            'project_summary' => 'string|nullable',
            'project_period' => 'string|nullable',
            'budgeted_amount' => 'string|required',
            'amount_raised' => 'string|required',
            'project_context' => 'string|required',
            'project_donor' => 'string|nullable',
        ]);


        $checkProject = DB::connection('mysql')->select('SELECT * FROM projects WHERE id =:id', ['id' => $id]);
        if (!empty($checkProject)) {
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
                $path = $request->file('img_url')->storeAs('public/projects', $fileNamToStore);

                if ($checkProject[0]->img_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/projects/' . $checkProject[0]->img_url);
                }

            } else {
                $fileNamToStore = $checkProject[0]->img_url;
            }

            //Handle file upload
            if ($request->hasFile('project_file')) {
                // get filename with extension
                $fileNameWithExt = $request->file('project_file')->getClientOriginalName();

                //get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                //get just extension
                $extension = $request->file('project_file')->getClientOriginalExtension();

                //filename to store
                $project_file_name = $filename . '_' . time() . '.' . $extension;

                //upload the image
                $path = $request->file('project_file')->storeAs('public/projects', $project_file_name);

                if (!empty($checkProject[0]->project_file)) {
                    //delete image
                    Storage::delete('public/projects/' . $checkProject[0]->project_file);
                }

            } else {
                $project_file_name = $checkProject[0]->project_file;
            }
            $saveData = DB::connection('mysql')->update(
                '
            UPDATE projects 
            SET
            
            project_type =:project_type,
            project_name =:project_name,
            project_summary =:project_summary,
            project_period =:project_period,
            project_file =:project_file,
            img_url =:img_url,
            budgeted_amount =:budgeted_amount,
            amount_raised =:amount_raised,
            project_context =:project_context,
            project_donor =:project_donor
                
            WHERE id =:id
            ',
                [
                    'project_type' => $request->project_type,
                    'project_name' => $request->project_name,
                    'project_summary' => $request->project_summary,
                    'project_period' => $request->project_period,
                    'project_file' => $project_file_name,
                    'img_url' => $fileNamToStore,
                    'budgeted_amount' => $request->budgeted_amount,
                    'amount_raised' => $request->amount_raised,
                    'project_context' => $request->project_context,
                    'project_donor' => $request->project_donor,
                    'id' => $id
                ]
            );
            if ($saveData) {
                return redirect()->back()->with('success', 'Project updated successfully.');
            } else {
                return redirect()->back()
                    ->with('error', 'Failed updating project');
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
        $checkProject = DB::connection('mysql')->select('SELECT * FROM projects WHERE id =:id', ['id' => $id]);
        if (!empty($checkProject)) {


            $delete = DB::connection('mysql')->select('DELETE FROM projects WHERE id=:id', ['id' => $id]);
            if ($delete){
                if ($checkProject[0]->project_file != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/projects/' . $checkProject[0]->project_file);
                }

                if (!empty($checkProject[0]->project_file)) {
                    //delete image
                    Storage::delete('public/projects/' . $checkProject[0]->project_file);
                }
                $projects = DB::connection('mysql')->select('SELECT *FROM projects ORDER BY id DESC ');

                $data = array(
                    'projects' => $projects,
                    'success' => 'Project deleted'

                );
                return redirect()->route('all_projects')->with($data);
            }else{
                $projects = DB::connection('mysql')->select('SELECT *FROM projects ORDER BY id DESC ');

                $data = array(
                    'projects' => $projects,
                    'error' => 'Failed to delete'

                );
                return redirect()->route('all_projects')->with($data);
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
    public function get_public_projects()
    {
        $projects = DB::connection('mysql')->select('SELECT *FROM projects ORDER BY id DESC ');

        $data = array(
            'projects' => $projects

        );
        return view('public.projects.index')->with($data);
    }

    public function get_single_public_projects($id)
    {
        $projects = DB::connection('mysql')->select('SELECT *FROM projects WHERE id =:id ', ['id' => $id]);
        $related_projects = DB::connection('mysql')->select('SELECT *FROM projects WHERE id <>:id ORDER BY RAND() LIMIT 5 ', ['id' => $id]);

        $data = array(
            'project' => !empty($projects) ? $projects[0] : $projects,
            'related_projects' => $related_projects
        );
        return view('public.projects.single_project')->with($data);
    }
}
