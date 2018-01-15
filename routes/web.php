<?php

Route::get('/', ['uses' => function () {
    return view('welcome');
}, 'as' => 'home']);

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    Route::get('/', ['uses' => function () {
        return view('admin.home');
    }, 'as' => 'admin.home']);

    // News Routes
    Route::group(['prefix' => 'news'], function() {
        Route::get('/new', ['uses' => 'News\NewsController@create', 'as' => 'news.new']);
        Route::post('/new', ['uses' => 'News\NewsController@create', 'as' => 'news.save']);
        Route::get('/list', ['uses' => 'News\NewsController@index', 'as' => 'news.list']);
        Route::get('/delete/{id}',
            ['uses' => 'News\NewsController@delete', 'as' => 'news.delete']);
        Route::get('/edit/{id}', ['uses' => 'News\NewsController@edit', 'as' => 'news.edit']);
        Route::post('/edit/{id}', ['uses' => 'News\NewsController@edit', 'as' => 'news.update']);
        Route::get('/{id}', ['uses' => 'News\NewsController@view', 'as' => 'news.view']);
    });

    // Opportunities Routes
    Route::group(['prefix' => 'opportunities'], function() {
        Route::get('/new', [
            'uses' => 'Opportunities\OpportunitiesController@create',
            'as' => 'opportunities.create'
        ]);

        Route::post('/new', [
            'uses' => 'Opportunities\OpportunitiesController@create',
            'as' => 'opportunities.save'
        ]);

        Route::get('/list', [
            'uses' => 'Opportunities\OpportunitiesController@index',
            'as' => 'opportunities.list'
        ]);

        Route::get('/edit/{id}', [
            'uses' => 'Opportunities\OpportunitiesController@edit',
            'as' => 'opportunities.edit'
        ]);

        Route::post('/edit/{id}', [
            'uses' => 'Opportunities\OpportunitiesController@edit',
            'as' => 'opportunities.update'
        ]);

        Route::get('/delete/{id}', [
            'uses' => 'Opportunities\OpportunitiesController@delete',
            'as' => 'opportunities.delete'
        ]);

        Route::get('/{id}', [
            'uses' => 'Opportunities\OpportunitiesController@view',
            'as' => 'opportunities.view'
        ]);
    });


    // Testimonial Routes
    Route::group(['prefix' => 'testimonials'], function() {

        Route::get('/list', [
            'uses' => 'Testimonials\TestimonialsController@index',
            'as' => 'testimonials.list'
        ]);

        Route::get('/new', [
            'uses' => 'Testimonials\TestimonialsController@create',
            'as' => 'testimonials.new'
        ]);

        Route::post('/new', [
            'uses' => 'Testimonials\TestimonialsController@create',
            'as' => 'testimonials.save'
        ]);

        Route::get('/edit/{id}', [
            'uses' => 'Testimonials\TestimonialsController@edit',
            'as' => 'testimonials.edit'
        ]);

        Route::post('/edit/{id}', [
            'uses' => 'Testimonials\TestimonialsController@edit',
            'as' => 'testimonials.update'
        ]);

        Route::get('/delete/{id}', [
            'uses' => 'Testimonials\TestimonialsController@delete',
            'as' =>  'testimonials.delete'
        ]);

        Route::get('/{id}', [
            'uses' => 'Testimonials\TestimonialsController@view',
            'as' => 'testimonials.view'
        ]);
    });

    // Program Routes
    Route::group(['prefix' => 'programs'], function() {
        Route::get('/new', [
            'uses' => 'Programs\ProgramsController@create',
            'as' => 'programs.create']);

        Route::post('/new', [
            'uses' => 'Programs\ProgramsController@create',
            'as' => 'programs.save'
        ]);

        Route::get('/list', [
            'uses' => 'Programs\ProgramsController@index',
            'as' => 'programs.list'
        ]);

        Route::get('/edit/{id}', [
            'uses' => 'Programs\ProgramsController@edit',
            'as' => 'programs.edit'
        ]);

        Route::post('/edit/{id}', [
            'uses' => 'Programs\ProgramsController@edit',
            'as' => 'programs.update'
        ]);

        Route::get('/delete/{id}', [
            'uses' => 'Programs\ProgramsController@delete',
            'as' => 'programs.delete'
        ]);
    });

});


// PUBLIC ROUTES
Route::get('/login', ['uses' => 'CustomAuth\LoginController@index', 'as' => 'login']);
Route::post('/login', ['uses' => 'CustomAuth\LoginController@auth', 'as' => 'auth']);
Route::get('/logout', ['uses' => 'CustomAuth\LoginController@logout', 'as' => 'logout']);
Route::get('/contactus', ['uses' => function () {
    return view('user/contactUs');
}]);