<?php

namespace App\Http\Controllers\Opportunities;
use App\Http\Controllers\Controller;
use App\Lib\OpportunitiesLib;
use App\Lib\ProgramsLib;
use App\Models\Opportunities;


class OpportunitiesController extends Controller
{

    public function index()
    {
        $params = [
            'limit' => request()->get('limit', 10),
            'current_page' => request()->get('page', 1)
        ];

        $pagination = OpportunitiesLib::getPaginated($params);
        $opportunities = ($pagination) ? $pagination->items() : [];

        return view('admin.opportunities.list', [
            'opportunities' => $opportunities,
            'pagination' =>  $pagination
        ]);
    }

    public function create()
    {
        $classifications = ProgramsLib::getAll();
        $action = route('opportunities.save');

        if (request()->isMethod('post')) {
            $data = request()->all();
            $result = OpportunitiesLib::create($data);

            $flash = [
                'type' => 'success',
                'message' => 'Opportunity was successfully Added'
            ];

            if (!$result) {
                $flash['type'] = 'danger';
                $flash['message'] = 'Something went wrong while adding.';
            }

            return redirect()->route('opportunities.list')->with('flash', $flash);
        }

        return view('admin.opportunities.form', [
            'classifications' => $classifications,
            'action' => $action
        ]);
    }

    public function edit($id)
    {
        $opportunity = OpportunitiesLib::getById($id);

        if (!$opportunity) {
            return redirect()->route('opportunities.list')->with('flash', [
                'type' => 'danger',
                'message' => 'Invalid Opportunity'
            ]);
        }

        if (request()->isMethod('post')) {
            $data = request()->all();
            $result  = OpportunitiesLib::update($id, $data);

            $flash = [
                'type' => 'success',
                'message' => 'Opportunity was successfully updated.'
            ];

            if (!$result) {
                $flash['type'] = 'danger';
                $flash['message'] = 'Something went wrong while updating.';
            }

            return redirect()->route('opportunities.list')->with('flash', $flash);
        }

        $action = route('opportunities.update', $id);
        $classifications = ProgramsLib::getAll();

        // fix start_end date
        $start = date_format(date_create($opportunity->start_date), 'm/d/Y');
        $end = date_format(date_create($opportunity->end_date), 'm/d/Y');

        $opportunity->start_end =  sprintf('%s - %s', $start, $end);

        return view('admin.opportunities.form', [
            'opportunity' => $opportunity,
            'action' => $action,
            'classifications' => $classifications
        ]);
    }

    public function view($id)
    {
        $opportunity = OpportunitiesLib::getById($id);

        if (!$opportunity) {
            return redirect()->route('opportunities.list')->with('flash', [
                'type' => 'danger',
                'message' => 'Invalid opportunity'
            ]);
        }

        return view('admin.opportunities.view', [
            'opportunity' => $opportunity
        ]);
    }

    public function delete($id)
    {
        $deleteResult = Opportunities::destroy($id);
        $flash = [
            'type' => 'success',
            'message' => 'Opportunity was successfully deleted'
        ];

        if (!$deleteResult) {
            $flash['type'] = 'danger';
            $flash['message'] = 'Invalid Opportunity or Something went wrong while deleting.';
        }

        return redirect()->route('opportunities.list')->with('flash', $flash);
    }

}