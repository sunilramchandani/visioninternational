<?php

namespace App\Lib;

use App\WorkCompany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class WorkCompanyLib
{

    public static function getPaginated($params = array())
    {
        $limit = isset($params['limit']) ? $params['limit'] : 10;
        $current_page = isset($params['current_page']) ? $params['current_page'] : 1;

        $query  = DB::table('work_company');

        // Implements soft delete, Via query builder automatically getting all
        $query->where('deleted_at', NULL);

        $company = $query->paginate($limit, ['*'], 'page', $current_page);

        return $company;
    }

    public static function create($data)
    {
        
        $workcompany = new WorkCompany();
        $workcompany->company_name = $data['company_name'];
        $workcompany->description = $data['description'];
        $workcompany->housing_type = $data['housing_type'];
        $workcompany->housing_distance = $data['housing_distance'];
        $workcompany->housing_address = $data['housing_address'];
        $workcompany->full_address = $data['full_address'];
        $workcompany->stipend = $data['stipend'];
        $workcompany->state = $data['state'];
        $workcompany->country = $data['country'];

        if (isset($data['image'])){
        $file = $data['image'];
        $name = $file->getClientOriginalName();
        $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
        $file->move('../storage/app/upload_company_image', $fileName);
        $workcompany->image = $fileName;    
        }

        
        $result = $workcompany->save();

        return ($result) ? true : false;
    }

    public static function getById($id)
    {
        return $workcompany = WorkCompany::find($id);
    }

   public static function update($id, $data)
    {
        $workcompany = WorkCompanyLib::getById($id);

        $workcompany->company_name = $data['company_name'];
        $workcompany->description = $data['description'];
        $workcompany->housing_type = $data['housing_type'];
        $workcompany->housing_distance = $data['housing_distance'];
        $workcompany->housing_address = $data['housing_address'];
        $workcompany->full_address = $data['full_address'];
        $workcompany->stipend = $data['stipend'];
        $workcompany->state = $data['state'];
        $workcompany->country = $data['country'];

        if (isset($data['image'])){
        $file = $data['image'];
        $name = $file->getClientOriginalName();
        $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
        $file->move('../storage/app/upload_company_image', $fileName);

        $workcompany->image = $fileName; 
        }

        $result = $workcompany->save();

        return ($result) ? true : false;
    }
}