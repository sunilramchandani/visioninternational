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

    //company routes
    Route::group(['prefix' => 'internshipcompany'], function() {


        Route::get('/new', ['uses' => 'InternshipCompanyController@adminCreate', 'as' => 'internshipcompany.new']);
        Route::post('/new', ['uses' => 'InternshipCompanyController@adminCreate', 'as' => 'internshipcompany.save']);

        Route::get('/edit/{id}', [
            'uses' => 'InternshipCompanyController@adminEdit',
            'as' => 'internshipcompany.adminedit'
        ]);

        Route::post('/edit/{id}', [
            'uses' => 'InternshipCompanyController@adminEdit',
            'as' => 'internshipcompany.saveadminedit'
        ]);


        Route::get('/list', [
            'uses' => 'InternshipCompanyController@adminIndex',
            'as' => 'internshipcompany.list'
        ]);

        Route::get('/delete/{id}', [
            'uses' => 'InternshipCompanyController@delete',
            'as' => 'internshipcompany.delete'
        ]);

        Route::get('/{id}', [
            'uses' => 'InternshipCompanyController@view',
            'as' => 'internshipcompany.view'
        ]);

        Route::get('/new_opportunity/{id}', [
            'uses' => 'InternshipCompanyController@createOpportunity',
            'as' => 'internshipcompany.new_opportunity'
        ]);

        Route::post('/new_opportunity/{id}', [
            'uses' => 'InternshipCompanyController@storeOpportunity',
            'as' => 'internshipcompany.store_opportunity'
        ]);

        Route::get('/new_qualification/{id}', [
            'uses' => 'InternshipCompanyController@createQualification',
            'as' => 'internshipcompany.new_qualification'
        ]);

        Route::post('/new_qualification/{id}', [
            'uses' => 'InternshipCompanyController@storeQualification',
            'as' => 'internshipcompany.store_qualification'
        ]);
    });


    // Appllication Routes
    Route::group(['prefix' => 'application'], function() {

        Route::get('/list', [
            'uses' => 'ApplicationController@adminIndex',
            'as' => 'application.list'
        ]);
        Route::get('/delete/{application_id}', [
            'uses' => 'ApplicationController@delete',
            'as' => 'application.delete'
        ]);

        Route::get('/{application_id}', [
            'uses' => 'ApplicationController@view',
            'as' => 'application.view'
        ]);
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


Route::resource('application', 'ApplicationController');
Route::resource('fileupload', 'FileUploadController');

Route::resource('internshipcompany', 'InternshipCompanyController');
Route::resource('contactus', 'ContactUsController');
Route::resource('fb', 'EventPluginController');
Route::resource('subscribe', 'SubscribeController');

