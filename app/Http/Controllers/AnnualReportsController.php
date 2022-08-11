<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AnnualReportsController extends Controller
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
        $annual_reports = DB::connection('mysql')->select('SELECT *FROM annual_reports ORDER BY id DESC ');

        $data = array(
            'annual_reports' => $annual_reports

        );
        return view('admin.annual_reports.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.annual_reports.create');
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
            'description' => 'string|nullable',
            'report_url' => 'file|required|max:10000'
        ]);

        //Handle file upload
        if ($request->hasFile('report_url')) {
            // get filename with extension
            $fileNameWithExt = $request->file('report_url')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('report_url')->getClientOriginalExtension();

            //filename to store
            $fileNamToStore = $filename . '_' . time() . '.' . $extension;

            //upload the image
            $path = $request->file('report_url')->storeAs('public/annual_reports', $fileNamToStore);

        } else {
            $fileNamToStore = null;
        }


        $saveData = DB::connection('mysql')->insert(
            '
                INSERT INTO annual_reports(
                    title,
                    report_url,
                    description
                    ) VALUES (
                    :title,
                    :report_url,
                    :description
                    )
            ',
            [
                'title' => $request->title,
                'report_url' => $fileNamToStore,
                'description' => $request->description
            ]
        );
        if ($saveData) {
            return redirect()->back()->with('success', 'Annual report saved successfully.');
        } else {
            return redirect()->back()
                ->with('error', 'Failed saving annual report');
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
        $annual_reports = DB::connection('mysql')->select('SELECT *FROM annual_reports WHERE id =:id ', ['id' => $id]);

        $data = array(
            'report' => !empty($annual_reports) ? $annual_reports[0] : $annual_reports,
        );
        return view('admin.annual_reports.view')->with($data);
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
            'description' => 'string|nullable',
            'report_url' => 'file|nullable|max:3000'
        ]);
//        echo '<pre>';
////        print_r($request->file('report_url')->getFileInfo());
//        echo '</pre>';
//        die();

        $checkGallery = DB::connection('mysql')->select('SELECT * FROM annual_reports WHERE id =:id', ['id' => $id]);
        if (!empty($checkGallery)) {
            //Handle file upload
            if ($request->hasFile('report_url')) {
                              // get filename with extension
                $fileNameWithExt = $request->file('report_url')->getClientOriginalName();

                //get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                //get just extension
                $extension = $request->file('report_url')->getClientOriginalExtension();

                //filename to store
                $fileNamToStore = $filename . '_' . time() . '.' . $extension;

                //upload the image
                $path = $request->file('report_url')->storeAs('public/annual_reports', $fileNamToStore);

                if ($checkGallery[0]->report_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/annual_reports/' . $checkGallery[0]->report_url);
                }

            } else {
                $fileNamToStore = $checkGallery[0]->report_url;
            }

            $saveData = DB::connection('mysql')->update(
                '
            UPDATE annual_reports 
            SET           
            report_url =:report_url,
            title =:title,
            description=:description
            WHERE id =:id
            ',
                [
                    'report_url' => $fileNamToStore,
                    'title' => $request->title,
                    'description' => $request->description,
                    'id' => $id
                ]
            );
            if ($saveData) {
                return redirect()->back()->with('success', 'Annual report updated successfully.');
            } else {
                return redirect()->back()
                    ->with('error', 'Failed updating annual report, change something on the fields to update!');
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
        $checkGallery = DB::connection('mysql')->select('SELECT * FROM annual_reports WHERE id =:id', ['id' => $id]);
        if (!empty($checkGallery)) {


            $delete = DB::connection('mysql')->select('DELETE FROM annual_reports WHERE id=:id', ['id' => $id]);
            if ($delete) {
                if ($checkGallery[0]->report_url != 'noimage.jpg') {
                    //delete image
                    Storage::delete('public/annual_reports/' . $checkGallery[0]->report_url);
                }


                $annual_reports = DB::connection('mysql')->select('SELECT *FROM annual_reports ORDER BY id DESC ');

                $data = array(
                    'annual_reports' => $annual_reports,
                    'success' => 'Image deleted from annual_reports'

                );
                return redirect()->route('all_annual_reports')->with($data);
            } else {
                $annual_reports = DB::connection('mysql')->select('SELECT *FROM annual_reports ORDER BY id DESC ');

                $data = array(
                    'annual_reports' => $annual_reports,
                    'error' => 'Deleting image from galleryfailed'

                );
                return redirect()->route('all_annual_reports')->with($data);
            }

        } else {
            $annual_reports = DB::connection('mysql')->select('SELECT *FROM annual_reports ORDER BY id DESC ');

            $data = array(
                'annual_reports' => $annual_reports,
                'error' => 'Deleting image from galleryfailed'

            );
            return redirect()->route('all_annual_reports')->with($data);

        }
    }



    //================================================
    //====================PUBLIC======================
    //================================================
    public function get_public_annual_reports()
    {
        $projects = DB::connection('mysql')->select('SELECT *FROM annual_reports ORDER BY id DESC ');

        $data = array(
            'annual_reports' => $projects

        );
        return view('public.annual_reports.index')->with($data);
    }

    public function get_single_public_projects($id)
    {
        $projects = DB::connection('mysql')->select('SELECT *FROM annual_reports WHERE id =:id ', ['id' => $id]);
        $related_projects = DB::connection('mysql')->select('SELECT *FROM annual_reports WHERE id <>:id ORDER BY RAND() LIMIT 5 ', ['id' => $id]);

        $data = array(
            'report' => !empty($projects) ? $projects[0] : $projects,
            'related_reports' => $related_projects
        );
        return view('public.annual_reports.single_project')->with($data);
    }
}
