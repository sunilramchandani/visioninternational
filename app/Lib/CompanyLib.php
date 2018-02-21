<?php

namespace App\Lib;

use App\InternshipCompany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

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
        
        $company->country = $data['country'];
        $company->remark = $data['remark'];
        $company->featured = $data['featured'];



        if (isset($data['image'])){
        $file = $data['image'];
        $name = $file->getClientOriginalName();
        $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
        $file->move('image/uploaded_company_image', $fileName);

        $company->image = $fileName;   
        }

        $result = $company->save();

        if (isset($data['qualification_bulk']))
        {
            $qualification_list = $data['qualification_bulk'];

            $id = $company->id;

            foreach($qualification_list as $qualification)
            {
            DB::table('qualifications')->insert([
                ['company_id' => $id, 'qualification_id' => $qualification, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]);
            }
        }

        if (isset($data['opportunity_bulk']))
        {
            $opportunity_list = $data['opportunity_bulk'];

            $id = $company->id;

            foreach($opportunity_list as $opportunity)
            {
            DB::table('opportunity')->insert([
                ['company_id' => $id, 'opportunity_id' => $opportunity, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]);
            }
        }


        
        

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

        $company->country = $data['country'];
        $company->remark = $data['remark'];
        $company->featured = $data['featured'];

        if (isset($data['image'])){

        $file = $data['image'];
        $name = $file->getClientOriginalName();
        $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
        $file->move('image/uploaded_company_image', $fileName);
        $company->image = $fileName; 

        }

        if (isset($data['qualification_bulk']))
        {
            $qualification_list = $data['qualification_bulk'];

            $id = $company->id;

            foreach($qualification_list as $qualification)
            {
            DB::table('qualifications')->insert([
                ['company_id' => $id, 'qualification_id' => $qualification, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]);
            }
        }

        if (isset($data['opportunity_bulk']))
        {
            $opportunity_list = $data['opportunity_bulk'];

            $id = $company->id;

            foreach($opportunity_list as $opportunity)
            {
            DB::table('opportunity')->insert([
                ['company_id' => $id, 'opportunity_id' => $opportunity, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]);
            }
        }


        $result = $company->save();

        return ($result) ? true : false;
    }
}