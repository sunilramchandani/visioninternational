<?php

namespace App\Http\Controllers\News;
use App\Lib\NewsLib;
use App\Http\Controllers\Controller;


class NewsController extends Controller
{
    public function index()
    {
        $limit = request()->get('limit', 10);
        $current_page = request()->get('page', 1);


        $params = [
            'limit' => $limit,
            'current_page' => $current_page
        ];

        $pagination = NewsLib::getPaginated($params);
        $news = $pagination->items();


        return view('admin.news.list', [
            'news' => $news,
            'paginator' => $pagination
        ]);
    }

    public function create()
    {
        $error = false;
        $action = route('news.save');

        if(request()->isMethod('post')) {
            $data = request()->all();

            $result = NewsLib::create($data);

            if ($result) {
                return redirect()
                    ->route('news.list')
                    ->with('flash', [
                        'type' => 'success',
                        'message' => 'Successfully Added'
                    ]);
            }
        }

        return view('admin.news.form', [
            'error' => $error,
            'action' => $action
        ]);
    }

    public function delete($id)
    {
        $news = NewsLib::getById($id);

        $data = [
            'type' => 'success',
            'message' => 'Successfully Deleted'
        ];

        $result = $news->delete();
        if(!$result) {
            $data['type'] = 'danger';
            $data['message'] = 'Invalid News';
        }

        return redirect()->route('news.list')->with('flash', $data);
    }

    public function edit($id)
    {
        $news = NewsLib::getById($id);
        $action = route('news.update', $id);

        if(request()->isMethod('post')) {
            $data = request()->all();
            $flashData = [
                'type' => 'danger',
                'message' => 'Something went wrong'
            ];

            $result = NewsLib::update($id, $data);
            if ($result) {
                $flashData['type'] = 'success';
                $flashData['message'] = 'News was successfully updated.';
            }

            return redirect()->route('news.list')->with('flash', $flashData);
        }

        return view('admin.news.form', [
            'error' => false,
            'news' => $news,
            'action' => $action
        ]);
    }

    public function view($id)
    {
        $news = NewsLib::getById($id);

        if(!$news) {
           return redirect()->route('news.list')->with('flash', [
               'type' => 'danger',
               'message' => 'Invalid News'
           ]);
        }

        return view('admin.news.view', [
            'news' => $news
        ]);
    }
}