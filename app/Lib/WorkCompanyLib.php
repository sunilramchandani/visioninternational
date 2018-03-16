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

        $workcompany->latitude = $data['latitude'];
        $workcompany->longtitude = $data['longtitude'];


        $workcompany->stipend = $data['stipend'];
        $workcompany->stipend_maximum = $data['stipend_maximum'];
        $workcompany->state = $data['state'];
        


        $workcompany->country = $data['country'];
        $workcompany->remark = $data['remark'];
        $workcompany->featured = $data['featured'];

        if (isset($data['image'])){
        $file = $data['image'];
        $name = $file->getClientOriginalName();
        $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
        $file->move('image/uploaded_workcompany_image', $fileName);
        $workcompany->image = $fileName;    
        }
        
        $result = $workcompany->save();


        
        if (isset($data['qualification_bulk']))
        {
            $qualification_list = $data['qualification_bulk'];

            $id = $workcompany->id;

            foreach($qualification_list as $qualification)
            {

            DB::table('work_qualifications')->insert([
                ['company_id' => $id, 'qualification_id' => $qualification, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]);
            
            }
        }

        if (isset($data['opportunity_bulk']))
        {
            $opportunity_list = $data['opportunity_bulk'];

            $id = $workcompany->id;

            foreach($opportunity_list as $opportunity)
            {
            DB::table('work_opportunity')->insert([
                ['company_id' => $id, 'opportunity_id' => $opportunity, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]);
            }
        }

        
        

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

        $workcompany->latitude = $data['latitude'];
        $workcompany->longtitude = $data['longtitude'];


        $workcompany->stipend = $data['stipend'];
        $workcompany->stipend_maximum = $data['stipend_maximum'];
        $workcompany->state = $data['state'];
        $workcompany->country = $data['country'];
        $workcompany->remark = $data['remark'];
        $workcompany->featured = $data['featured'];

        if (isset($data['image'])){
        $file = $data['image'];
        $name = $file->getClientOriginalName();
        $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
        $file->move('image/uploaded_workcompany_image', $fileName);

        $workcompany->image = $fileName; 
        }
        $result = $workcompany->save();


        if (isset($data['qualification_bulk']))
        {
            $qualification_list = $data['qualification_bulk'];

            $id = $workcompany->id;

            foreach($qualification_list as $qualification)
            {

            DB::table('work_qualifications')->insert([
                ['company_id' => $id, 'qualification_id' => $qualification, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]);
            
            }
        }

        if (isset($data['opportunity_bulk']))
        {
            $opportunity_list = $data['opportunity_bulk'];

            $id = $workcompany->id;

            foreach($opportunity_list as $opportunity)
            {
            DB::table('work_opportunity')->insert([
                ['company_id' => $id, 'opportunity_id' => $opportunity, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]);
            }
        }


        
        return ($result) ? true : false;
    }
}