<?php

namespace App\Lib;

use App\Models\Opportunities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OpportunitiesLib
{
    public static function create($data)
    {
        $opportunity = new Opportunities();

        $opportunity->position = $data['position'];
        $opportunity->company = $data['company'];
        $opportunity->company_website = $data['company_website'];
        $opportunity->company_email = $data['company_email'];
        $opportunity->location = $data['location'];
        $opportunity->interview_date = $data['interview_date'];

        // parse start and end
        $start_end = $data['start_end'];
        $start_end = explode('-', $start_end);
        $opportunity->start_date = date_format(date_create($start_end[0]), 'Y-m-d');
        $opportunity->end_date = date_format(date_create($start_end[1]), 'Y-m-d');

        $opportunity->duration = $data['duration'];
        $opportunity->programs_id = $data['classification'];
        $opportunity->stipend = $data['stipend'];
        $opportunity->stipend_currency = $data['stipend_currency'];
        $opportunity->housing_information = $data['housing_information'];
        $opportunity->local_transport = $data['local_transport'];
        $opportunity->description = $data['description'];
        $opportunity->created_by = Auth::user()->getAuthIdentifier();

        $result = $opportunity->save();

        return ($result) ? true : false;
    }

    public static function getPaginated($params)
    {
        $limit = isset($params['limit']) ? $params['limit'] : 10;
        $current_page = isset($params['current_page']) ? $params['current_page'] : 1;

        $query  = DB::table('opportunities');

        // Implements soft delete, Via query builder automatically getting all
        $query->where('deleted_at', NULL);

        $opportunities = $query->paginate($limit, ['*'], 'page', $current_page);

        return $opportunities;
    }

    public static function getById($id)
    {
        return Opportunities::find($id);
    }

    public static function update($id, $data)
    {
        $opportunity = OpportunitiesLib::getById($id);

        $opportunity->position = $data['position'];
        $opportunity->company = $data['company'];
        $opportunity->company_website = $data['company_website'];
        $opportunity->company_email = $data['company_email'];
        $opportunity->location = $data['location'];
        $opportunity->interview_date = $data['interview_date'];

        // parse start and end
        $start_end = $data['start_end'];
        $start_end = explode('-', $start_end);
        $opportunity->start_date = date_format(date_create($start_end[0]), 'Y-m-d');
        $opportunity->end_date = date_format(date_create($start_end[1]), 'Y-m-d');

        $opportunity->duration = $data['duration'];
        $opportunity->programs_id = $data['classification'];
        $opportunity->stipend = $data['stipend'];
        $opportunity->stipend_currency = $data['stipend_currency'];
        $opportunity->housing_information = $data['housing_information'];
        $opportunity->local_transport = $data['local_transport'];
        $opportunity->description = $data['description'];
        $opportunity->created_by = Auth::user()->getAuthIdentifier();

        $result = $opportunity->save();

        return ($result) ? true : false;
    }
}