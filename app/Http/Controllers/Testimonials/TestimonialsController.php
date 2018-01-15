<?php

namespace App\Http\Controllers\Testimonials;

use App\Lib\TestimonialsLib;
use App\Models\Testimonials;
use App\Http\Controllers\Controller;


class TestimonialsController extends Controller
{
    public function index()
    {
        $limit = request()->get('limit', 10);
        $current_page = request()->get('page', 1);

        $params = [
            'limit' => $limit,
            'current_page' => $current_page
        ];

        $pagination = TestimonialsLib::getPaginated($params);
        $testimonials = $pagination->items();

        return view('admin.testimonials.list', [
            'pagination' => $pagination,
            'testimonials' => $testimonials
        ]);
    }

    public function create()
    {
        $action = route('testimonials.save');

        if (request()->isMethod('post')) {
            $data = request()->all();

            $result = TestimonialsLib::create($data);

            if ($result) {
                return
                    redirect()
                        ->route('testimonials.list')
                        ->with('flash', [
                            'type' => 'success',
                            'message' => 'Successfully Added'
                        ]);
            }
        }

        return view('admin.testimonials.form', [
            'action' => $action
        ]);
    }

    public function edit($id)
    {
        $testimonial = TestimonialsLib::getById($id);
        $action = route('testimonials.update', $id);

        if (!$testimonial) {
            return redirect()
                    ->route('testimonials.list')
                    ->with('flash', [
                        'type' => 'danger',
                        'message' => 'Invalid Testimonial'
                    ]);
        }

        if (request()->isMethod('post')) {
            $data = request()->all();
            $update = TestimonialsLib::update($id, $data);

            $flash = [
                'type' => 'success',
                'message' => 'Successfully Updated'
            ];

            if (!$update) {
                $flash['type'] = 'danger';
                $flash['message'] = 'Something went wrong.';
            }

            return redirect()->route('testimonials.list')->with('flash', $flash);
        }

        return view('admin.testimonials.form', [
            'testimonial' => $testimonial,
            'action' => $action
        ]);

    }

    public function delete($id)
    {
        $flash  = [
            'type' => 'success',
            'message' => 'Successfully Deleted'
        ];

        $delete = Testimonials::destroy($id);

        if (!$delete) {
            $flash['type'] = 'danger';
            $flash['message'] = 'Something went wrong or Testimonial was Invalid';
        }

        return redirect()->route('testimonials.list')->with('flash', $flash);
    }

    public function view($id)
    {
        $testimonial = TestimonialsLib::getById($id);

        if (!$testimonial) {
            return redirect()->route('testimonials.list')->with('flash', [
                'type' => 'danger',
                'message' => 'Something went wrong'
            ]);
        }

        return view('admin.testimonials.view', [
            'testimonial' => $testimonial
        ]);
    }
}