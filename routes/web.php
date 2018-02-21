<?php

//Home Routes
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home.index']);

//Admin Routes
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    
    Route::get('/', ['uses' => function () {
        return view('admin.home');
    }, 'as' => 'admin.home']);

    Route::resource('featuredimage', 'FeaturedImageController');

    Route::group(['prefix' => 'author'], function() {
        Route::get('/list', ['uses' => 'SubDataController@indexAuthor', 'as' => 'author.list']);
        Route::get('/new', ['uses' => 'SubDataController@createAuthor', 'as' => 'author.create']);
        Route::post('/new', ['uses' => 'SubDataController@storeAuthor', 'as' => 'author.store']);



        
        Route::get('/edit/{id}', ['uses' => 'SubDataController@editAuthor', 'as' => 'author.save']);
        Route::post('/edit/{id}', ['uses' => 'SubDataController@updateAuthor', 'as' => 'author.update']);

        Route::get('/delete/{id}', ['uses' => 'SubDataController@deleteAuthor', 'as' => 'author.delete']);
    });

    Route::group(['prefix' => 'category'], function() {
        Route::get('/list', ['uses' => 'SubDataController@indexCategory', 'as' => 'category.list']);
        Route::post('/list', ['uses' => 'SubDataController@storeCategory', 'as' => 'category.store']);
        Route::get('/delete/{id}', ['uses' => 'SubDataController@deleteCategory', 'as' => 'category.delete']);
    });


    Route::group(['prefix' => 'blog'], function() {
        Route::get('/image-view/{id}', ['uses' => 'BlogController@indexMainUpload', 'as' => 'mainblogimage.view']);
        Route::post('/new/{id}', ['uses' => 'BlogController@storeMainUpload', 'as' => 'mainblogimage.save']);


        Route::get('/delete/{id}', [
            'uses' => 'BlogController@deleteMainUpload',
            'as' => 'mainblogimage.delete'
        ]);
        Route::get('/trash', ['uses' => 'BlogController@viewTrash', 'as' => 'blog.trash']);


        Route::get('/trash/{id}', ['uses' => 'BlogController@restoreTrash', 'as' => 'blog.restoretrash']);

    });
    Route::resource('blog', 'BlogController');
    
    Route::group(['prefix' => 'news'], function() {
        Route::get('/image-view/{id}', ['uses' => 'NewsController@indexMainUpload', 'as' => 'mainnewsimage.view']);
        Route::post('/new/{id}', ['uses' => 'NewsController@storeMainUpload', 'as' => 'mainnewsimage.save']);


        Route::get('/delete/{id}', [
            'uses' => 'NewsController@deleteMainUpload',
            'as' => 'mainnewsimage.delete'
        ]);
        Route::get('/trash', ['uses' => 'NewsController@viewTrash', 'as' => 'news.trash']);


        Route::get('/trash/{id}', ['uses' => 'NewsController@restoreTrash', 'as' => 'news.restoretrash']);

    });
    Route::resource('news', 'NewsController');

    
    // News Routes
   /* Route::group(['prefix' => 'news'], function() {
        Route::get('/new', ['uses' => 'News\NewsController@create', 'as' => 'news.new']);
        Route::post('/new', ['uses' => 'News\NewsController@create', 'as' => 'news.save']);
        Route::get('/list', ['uses' => 'News\NewsController@index', 'as' => 'news.list']);
        Route::get('/delete/{id}',
            ['uses' => 'News\NewsController@delete', 'as' => 'news.delete']);
        Route::get('/edit/{id}', ['uses' => 'News\NewsController@edit', 'as' => 'news.edit']);
        Route::post('/edit/{id}', ['uses' => 'News\NewsController@edit', 'as' => 'news.update']);
        Route::get('/{id}', ['uses' => 'News\NewsController@view', 'as' => 'news.view']);
    }); */

    //Work company routes
    Route::group(['prefix' => 'workcompany'], function() {


        Route::get('/new', ['uses' => 'WorkCompanyController@adminCreate', 'as' => 'workcompany.new']);
        Route::post('/new', ['uses' => 'WorkCompanyController@adminCreate', 'as' => 'workcompany.save']);

        Route::get('/edit/{id}', [
            'uses' => 'WorkCompanyController@adminEdit',
            'as' => 'workcompany.adminedit'
        ]);

        Route::post('/edit/{id}', [
            'uses' => 'WorkCompanyController@adminEdit',
            'as' => 'workcompany.saveadminedit'
        ]);


        Route::get('/list', [
            'uses' => 'WorkCompanyController@adminIndex',
            'as' => 'workcompany.list'
        ]);

        Route::get('/delete/{id}', [
            'uses' => 'WorkCompanyController@delete',
            'as' => 'workcompany.delete'
        ]);

        Route::get('/{id}', [
            'uses' => 'WorkCompanyController@view',
            'as' => 'workcompany.view'
        ]);

        Route::get('/new_opportunity/{id}', [
            'uses' => 'WorkCompanyController@createOpportunity',
            'as' => 'workcompany.new_opportunity'
        ]);

        Route::post('/new_opportunity/{id}', [
            'uses' => 'WorkCompanyController@storeOpportunity',
            'as' => 'workcompany.store_opportunity'
        ]);

        Route::get('/new_qualification/{id}', [
            'uses' => 'WorkCompanyController@createQualification',
            'as' => 'workcompany.new_qualification'
        ]);

        Route::post('/new_qualification/{id}', [
            'uses' => 'WorkCompanyController@storeQualification',
            'as' => 'workcompany.store_qualification'
        ]);

        Route::group(['prefix' => 'duration'], function() {

            Route::get('/list', [
                'uses' => 'WorkCompanyController@durationIndex',
                'as' => 'workcompany.durationList'
            ]);
        
            Route::get('/new_duration/{id}', [
                'uses' => 'WorkCompanyController@createDuration',
                'as' => 'workcompany.new_duration'
            ]);
        
            Route::post('/store_duration/{id}', [
                'uses' => 'WorkCompanyController@storeDuration',
                'as' => 'workcompany.store_duration'
            ]);
        
        }); 
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

        Route::group(['prefix' => 'duration'], function() {

            Route::get('/list', [
                'uses' => 'InternshipCompanyController@durationIndex',
                'as' => 'internshipcompany.durationList'
            ]);
        
            Route::get('/new_duration/{id}', [
                'uses' => 'InternshipCompanyController@createDuration',
                'as' => 'internshipcompany.new_duration'
            ]);
        
            Route::post('/store_duration/{id}', [
                'uses' => 'InternshipCompanyController@storeDuration',
                'as' => 'internshipcompany.store_duration'
            ]);
        
        }); 

        
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


        Route::get('/pdf/{application_id}', [
            'uses' => 'ApplicationController@downloadPDF',
            'as' => 'application.pdf'
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
Route::resource('workcompany', 'WorkCompanyController');
Route::resource('contactus', 'ContactUsController');
Route::resource('fb', 'EventPluginController');
Route::resource('subscribe', 'SubscribeController');
Route::resource('internship', 'InternshipController');
Route::resource('faq', 'faqController');
Route::get('/aupair', function () {
        return view('users.aupair.aupair');
    });
Route::get('/event/{fbevent_id}', [
        'uses' => 'EventPluginController@eventSingle',
        'as' => 'event.single'
]);
Route::get('/blog', [
    'uses' => 'BlogController@userIndex',
    'as' => 'userBlog.index'
]);
Route::get('/blog/{id}', [
    'uses' => 'BlogController@userSingle',
    'as' => 'userBlog.single'
]);

Route::get('/news', [
    'uses' => 'NewsController@userIndex',
    'as' => 'userNews.index'
]);
Route::get('/news/{id}', [
    'uses' => 'NewsController@userSingle',
    'as' => 'userNews.single'
]);