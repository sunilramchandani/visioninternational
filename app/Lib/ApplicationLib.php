<?php
namespace App\Lib;
use App\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ApplicationLib
{
    public static function getPaginated($params = array())
    {
        $limit = isset($params['limit']) ? $params['limit'] : 10;
        $current_page = isset($params['current_page']) ? $params['current_page'] : 1;
        $query  = DB::table('application');
        // Implements soft delete, Via query builder automatically getting all
        $query->where('deleted_at', NULL);
        $app = $query->paginate($limit, ['*'], 'page', $current_page);
        return $app;
    }
    public static function create($data)
    {
        
        $app = new Application();
        $app->program_id = $data['program_id'];
        $app->country_id = $data['country_id'];
        $app->location_id = $data['location_id'];
        $app->first_name = $data['first_name'];
        $app->last_name = $data['last_name'];
        $app->contact_no = $data['contact_no'];
        $app->birthdate = $data['birthdate'];
        $app->gender = $data['gender'];
        $app->current_city = $data['current_city'];
        $app->university_id = $data['university_id'];
        $app->degree_id = $data['degree_id'];
        $app->major_id = $data['major_id'];
        $app->grad_date = $data['grad_date'];
        $app->start_date = $data['start_date'];
        $app->upload_resume = $data['upload_resume'];
        $app->about_vip = $data['about_vip'];
        $app->message = $data['message'];
        
        $result = $app->save();
        return ($result) ? true : false;
    }
    public static function getById($id)
    {
        return $app = Application::find($id);
    }
/*    public static function update($id, $data)
    {
        $news = ApplicationLib::getById($id);
        $news->title = $data['title'];
        $news->article = $data['article'];
        $result = $news->save();
        return ($result) ? true : false;
    }*/
}