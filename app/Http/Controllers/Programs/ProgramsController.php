<?php

namespace App\Http\Controllers\Programs;

use App\Lib\ProgramsLib;
use App\Models\Programs;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    public function index()
    {

        $params = [
            'limit' => request()->get('limit', 10),
            'current_page' => request()->get('page', 1)
        ];

        $pagination = ProgramsLib::getPaginated($params);

        return view('admin.programs.list', [
            'programs' => $pagination->items(),
            'pagination' => $pagination
        ]);
    }

    public function create()
    {
        $action = route('programs.save');
        $error = false;
        $data = array();

        if (request()->isMethod('post')) {
            $data = request()->all();
            $result = ProgramsLib::create($data);

            if (!$result) {
                $error = [
                    'type' => 'danger',
                    'message' => 'Something went wrong while creating your Promo'
                ];
            }

            return redirect()->route('programs.list')->with('flash', [
                'type' => 'success',
                'message' => 'Promo was successfully added.'
            ]);
        }

        return view('admin.programs.form', [
            'action' => $action,
            'error' => $error,
            'program' => $data
        ]);
    }

    public function edit($id)
    {
        $program = ProgramsLib::getById($id);
        
        $programs = Programs::all();

        $error = false;

        if (!$program) {
            return redirect()->route('programs.list')->with('flash', [
                'type' => 'danger',
                'message' => 'Invalid Program'
            ]);
        }

        if (request()->isMethod('post')) {
            $data = request()->all();

            $result = ProgramsLib::update($id, $data);

            if (!$result) {
                $error = [
                    'type' => 'danger',
                    'message' => 'Something went wrong while updating Promo'
                ];
            } else {
                return redirect()->route('programs.list')->with('flash', [
                    'type' => 'success',
                    'message' => 'Promo was successfully updated'
                ]);
            }
        }

        $action = route('programs.update', $id);

        return view('admin.programs.form', [
            'program' => $program,
            'action' => $action,
            'programs' =>$programs,
            'error' => $error
        ]);
    }

    public function delete($id)
    {
        $program  = ProgramsLib::getById($id);

        if (!$program) {
            return redirect()->route('programs.list')->with('flash', [
                'type' => 'danger',
                'message' => 'Invalid program'
            ]);
        }

        $result = Programs::destroy($id);
        $flash = [
            'type' => 'success',
            'message' => 'Promo was successfully deleted'
        ];

        if (!$result) {
            $flash['type'] = 'danger';
            $flash['message'] = 'Something went wrong while deleting Promo';
        }

        return redirect()->route('programs.list')->with('flash', $flash);
    }

}