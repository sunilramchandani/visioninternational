<?php

namespace App\Lib;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsLib
{

    public static function getPaginated($params = array())
    {
        $limit = isset($params['limit']) ? $params['limit'] : 10;
        $current_page = isset($params['current_page']) ? $params['current_page'] : 1;

        $query  = DB::table('news');

        // Implements soft delete, Via query builder automatically getting all
        $query->where('deleted_at', NULL);

        $news = $query->paginate($limit, ['*'], 'page', $current_page);

        return $news;
    }

    public static function create($data)
    {
        $news = new News();

        $news->title = $data['title'];
        $news->article = $data['article'];
        $news->created_by = Auth::user()->getAuthIdentifier();
        $result = $news->save();

        return ($result) ? true : false;
    }

    public static function getById($id)
    {
        return $news = News::find($id);
    }

    public static function update($id, $data)
    {
        $news = NewsLib::getById($id);

        $news->title = $data['title'];
        $news->article = $data['article'];
        $result = $news->save();

        return ($result) ? true : false;
    }
}