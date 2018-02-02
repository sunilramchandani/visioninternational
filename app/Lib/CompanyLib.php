<?php

namespace App\Lib;

use App\InternshipCompany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
class CompanyLib
{

    public static function getPaginated($params = array())
    {
        $limit = isset($params['limit']) ? $params['limit'] : 10;
        $current_page = isset($params['current_page']) ? $params['current_page'] : 1;

        $query  = DB::table('internship_company');

        // Implements soft delete, Via query builder automatically getting all
        $query->where('deleted_at', NULL);

        $company = $query->paginate($limit, ['*'], 'page', $current_page);

        return $company;
    }

    public static function create($data)
    {
        
        $company = new InternshipCompany();
        $company->company_name = $data['company_name'];
        $company->description = $data['description'];
        $company->housing_type = $data['housing_type'];
        $company->housing_distance = $data['housing_distance'];
        $company->housing_address = $data['housing_address'];
        $company->full_address = $data['full_address'];
        $company->stipend = $data['stipend'];
        $company->state = $data['state'];

        $file = $data['image'];
        $name = $file->getClientOriginalName();
        $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
        $file->move('../storage/app/upload_company_image', $fileName);

        $company->image = $fileName;   


        
        $result = $company->save();

        return ($result) ? true : false;
    }

    public static function getById($id)
    {
        return $company = InternshipCompany::find($id);
    }

   public static function update($id, $data)
    {
        $company = CompanyLib::getById($id);

        $company->company_name = $data['company_name'];
        $company->description = $data['description'];
        $company->housing_type = $data['housing_type'];
        $company->housing_distance = $data['housing_distance'];
        $company->housing_address = $data['housing_address'];
        $company->full_address = $data['full_address'];
        $company->stipend = $data['stipend'];
        $company->state = $data['state'];

        $file = $data['image'];
        $name = $file->getClientOriginalName();
        $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
        $file->move('../storage/app/upload_company_image', $fileName);

        $company->image = $fileName; 

        $result = $company->save();

        return ($result) ? true : false;
    }
}