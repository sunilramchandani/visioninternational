<?php

namespace App\Lib;

use Illuminate\Support\Facades\Auth;
use App\Models\Testimonials;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class TestimonialsLib
{

    public static function getPaginated($params = array())
    {
        $limit = isset($params['limit']) ? $params['limit'] : 10;
        $current_page = isset($params['current_page']) ? $params['current_page'] : 1;

        $query  = DB::table('testimonials');

        // Implements soft delete, Via query builder automatically getting all
        $query->where('deleted_at', NULL);

        $news = $query->paginate($limit, ['*'], 'page', $current_page);

        return $news;
    }

    public static function create($data)
    {
        $testimonial = new Testimonials();
        $testimonial->first_name = $data['first_name'];
        $testimonial->last_name = $data['last_name'];
        $testimonial->organization = $data['organization'];
        $testimonial->testimony = $data['testimony'];
        $testimonial->created_by = Auth::user()->getAuthIdentifier();
        

        if (isset($data['upload_testimony_image'])){

            $file = $data['upload_testimony_image'];
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_testimony_image', $fileName);
            $testimonial->image_testimony = $fileName; 
    
        }


        $result = $testimonial->save();

        return ($result) ? true : false;
    }

    public static function getById($id)
    {
        return Testimonials::find($id);
    }

    public static function update($id, $data)
    {
        $testimonial  = TestimonialsLib::getById($id);

        $testimonial->first_name = $data['first_name'];
        $testimonial->last_name = $data['last_name'];
        $testimonial->organization = $data['organization'];
        $testimonial->testimony = $data['testimony'];

        if (isset($data['upload_testimony_image'])){

            $file = $data['upload_testimony_image'];
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_testimony_image', $fileName);
            $testimonial->image_testimony = $fileName; 
    
        }

        $result = $testimonial->save();

        return ($result) ? true : false;
    }

}