<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VacanciesController extends Controller
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
        $vacancies = DB::connection('mysql')->select('SELECT *FROM vacancies ORDER BY id DESC ');

        $data = array(
            'vacancies' => $vacancies

        );
        return view('admin.vacancies.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vacancies.create');
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
            'body' => 'string|required',
            'dateline' => 'date|required'
        ]);

        $saveData = DB::connection('mysql')->insert(
            '
                INSERT INTO vacancies(
                    title, 
                    body, 
                    dateline
                    ) VALUES (
                    :title, 
                    :body, 
                    :dateline
                    )
            ',
            [
                'title' => $request->title,
                'body' => $request->body,
                'dateline' => $request->dateline
            ]
        );
        if ($saveData) {
            return redirect()->back()->with('success', 'Vacancy created successfully.');
        } else {
            return redirect()->back()
                ->with('error', 'Failed creating Vacancy');
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
        $vacancy = DB::connection('mysql')->select('SELECT *FROM vacancies WHERE id =:id ', ['id' => $id]);

        $data = array(
            'vacancy' => !empty($vacancy) ? $vacancy[0] : $vacancy,
        );
        return view('admin.vacancies.view')->with($data);
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
            'body' => 'string|required',
            'dateline' => 'date|required'
        ]);


        $checkProject = DB::connection('mysql')->select('SELECT * FROM vacancies WHERE id =:id', ['id' => $id]);
        if (!empty($checkProject)) {

            $saveData = DB::connection('mysql')->update(
                '
            UPDATE vacancies 
            SET
            title =:title,
            body =:body,
            dateline =:dateline
                
            WHERE id =:id
            ',
                [
                    'title' => $request->title,
                    'body' => $request->body,
                    'dateline' => $request->dateline,
                    'id' => $id
                ]
            );
            if ($saveData) {
                return redirect()->back()->with('success', 'Vacancy updated successfully.');
            } else {
                return redirect()->back()
                    ->with('error', 'Failed updating vacancy');
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
        $checkProject = DB::connection('mysql')->select('SELECT * FROM vacancies WHERE id =:id', ['id' => $id]);
        if (!empty($checkProject)) {


            $delete = DB::connection('mysql')->select('DELETE FROM vacancies WHERE id=:id', ['id' => $id]);
            if ($delete) {

                $vacancies = DB::connection('mysql')->select('SELECT *FROM vacancies ORDER BY id DESC ');

                $data = array(
                    'vacancies' => $vacancies,
                    'success' => 'Vacancy deleted'

                );
                return redirect()->route('all_vacancies')->with($data);
            } else {
                $vacancies = DB::connection('mysql')->select('SELECT *FROM vacancies ORDER BY id DESC ');

                $data = array(
                    'vacancies' => $vacancies,
                    'error' => 'Failed to delete'

                );
                return redirect()->route('all_vacancies')->with($data);
            }

        } else {
            $vacancies = DB::connection('mysql')->select('SELECT *FROM vacancies ORDER BY id DESC ');

            $data = array(
                'vacancies' => $vacancies,
                'error' => 'Failed to delete'

            );
            return redirect()->route('all_vacancies')->with($data);

        }
    }

    //================================================
    //====================PUBLIC======================
    //================================================
    public function get_public_donations()
    {
        $vacancies = DB::connection('mysql')->select('SELECT *FROM vacancies ORDER BY id DESC ');

        $data = array(
            'vacancies' => $vacancies

        );
        return view('public.vacancies.index')->with($data);
    }

    public function get_single_public_donation($id)
    {
        $vacancies = DB::connection('mysql')->select('SELECT *FROM vacancies WHERE id =:id ', ['id' => $id]);
        $related_projects = DB::connection('mysql')->select('SELECT *FROM vacancies WHERE id <>:id ORDER BY RAND() LIMIT 5 ', ['id' => $id]);

        $data = array(
            'vacancy' => !empty($vacancies) ? $vacancies[0] : $vacancies,
            'related_donations' => $related_projects
        );
        return view('public.vacancies.single_donation')->with($data);
    }
}
