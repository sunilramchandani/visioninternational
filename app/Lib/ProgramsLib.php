<?php

namespace App\Lib;
use App\Models\Programs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgramsLib
{

    public static function getPaginated($params)
    {
        $limit = isset($params['limit']) ? $params['limit'] : 10;
        $current_page = isset($params['current_page']) ? $params['current_page'] : 1;

        $query  = DB::table('programs');

        // Implements soft delete, Via query builder automatically getting all
        $query->where('deleted_at', NULL);

        $query->orderBy('updated_at', 'DESC');

        $news = $query->paginate($limit, ['*'], 'page', $current_page);

        return $news;
    }

    public static function create($data)
    {
        $program = new Programs();

        $program->title = $data['title'];
        $program->description = $data['description'];
        $program->created_by = Auth::user()->getAuthIdentifier();

        try {
            $result = $program->save();

            return ($result) ? true : false;

        } catch (\Exception $e) {
            return false;
        }
    }

    public static function getById($id)
    {
        return Programs::find($id);
    }

    public static function update($id, $data)
    {
        $program  = ProgramsLib::getById($id);

        $program->title = $data['title'];
        $program->description = $data['description'];

        $result = $program->save();


        return ($result) ? true : false;
    }

    public static function getAll()
    {
        return Programs::all();
    }
}