<?php

//Home Routes
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home.index']);


Route::get('/404', function () {
    return view('404');
});
Route::get('/500', function () {
    return view('500');
});

//Admin Routes
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    
    Route::get('/', ['uses' => 'HomeController@adminIndex', 'as' => 'admin.home']);


    Route::resource('featuredimage', 'FeaturedImageController');


    Route::group(['prefix' => 'event'], function() {
        Route::get('/list', ['uses' => 'EventPluginController@adminIndex', 'as' => 'event.list']);
        Route::get('/view/{id}', ['uses' => 'EventPluginController@adminView', 'as' => 'event.view']);
        Route::post('/view/{id}', ['uses' => 'EventPluginController@adminUpdate', 'as' => 'event.update']);

        
        Route::get('/edit/{id}', ['uses' => 'EventPluginController@edit', 'as' => 'event.adminEdit']);
        Route::post('/edit/{id}', ['uses' => 'EventPluginController@update', 'as' => 'event.adminUpdate']);

            
        Route::delete('/deleteEventCategory/{id}', [
            'uses' => 'EventPluginController@deleteEventCategory',
            'as' => 'event.deleteEventCategory'
        ]);


    });

    Route::group(['prefix' => 'counter'], function() {
        Route::get('/edit/{id}', ['uses' => 'HomeController@adminCounterEdit', 'as' => 'counter.adminEdit']);
        Route::post('/edit/{id}', [ 'uses' => 'HomeController@adminCounterUpdate', 'as' => 'counter.adminUpdate']);

    });


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

        Route::post('/edit/{id}', ['uses' => 'SubDataController@editCategory', 'as' => 'category.edit']);


    });

    Route::group(['prefix' => 'qualification'], function() {
        Route::get('/list', ['uses' => 'SubDataController@indexQualification', 'as' => 'qualification.list']);
        Route::post('/list', ['uses' => 'SubDataController@storeQualification', 'as' => 'qualification.store']);
        Route::get('/delete/{id}', ['uses' => 'SubDataController@deleteQualification', 'as' => 'qualification.delete']);

        Route::post('/edit/{id}', ['uses' => 'SubDataController@editQualification', 'as' => 'qualification.edit']);
    });

    Route::group(['prefix' => 'opportunity'], function() {
        Route::get('/list', ['uses' => 'SubDataController@indexOpportunity', 'as' => 'opportunity.list']);
        Route::post('/list', ['uses' => 'SubDataController@storeOpportunity', 'as' => 'opportunity.store']);
        Route::get('/delete/{id}', ['uses' => 'SubDataController@deleteOpportunity', 'as' => 'opportunity.delete']);

        Route::post('/edit/{id}', ['uses' => 'SubDataController@editOpportunity', 'as' => 'opportunity.edit']);
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

        Route::delete('/deleteBlogCategory/{id}', [
            'uses' => 'BlogController@deleteBlogCategory',
            'as' => 'blog.deleteBlogCategory'
        ]);
        
        



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

        Route::delete('/deleteNewsCategory/{id}', [
            'uses' => 'NewsController@deleteNewsCategory',
            'as' => 'news.deleteNewsCategory'
        ]);



    });

    Route::group(['prefix' => 'aboutus'], function() {
        Route::get('/list', ['uses' => 'AboutUsController@adminIndex', 'as' => 'aboutus.adminIndex']);

        Route::get('/new', ['uses' => 'AboutUsController@adminCreate', 'as' => 'aboutus.adminCreate']);
        Route::post('/new', ['uses' => 'AboutUsController@adminStore', 'as' => 'aboutus.adminStore']);

        Route::get('/edit/{id}', ['uses' => 'AboutUsController@adminEdit', 'as' => 'aboutus.adminEdit']);
        Route::post('/edit/{id}', [ 'uses' => 'AboutUsController@adminUpdate', 'as' => 'aboutus.adminUpdate']);

        Route::get('/trash', ['uses' => 'AboutUsController@viewTrash', 'as' => 'aboutus.trash']);
        Route::get('/trash/{id}', ['uses' => 'AboutUsController@restoreTrash', 'as' => 'aboutus.restoretrash']);




        Route::get('/delete/{id}', [
            'uses' => 'AboutUsController@adminDelete',
            'as' => 'aboutus.adminDelete'
        ]);


    });

    Route::group(['prefix' => 'pagestep'], function() {
        Route::get('/list', ['uses' => 'PageStepController@adminIndex', 'as' => 'page_step.adminIndex']);
        Route::get('/edit/{id}', ['uses' => 'PageStepController@adminEdit', 'as' => 'page_step.adminEdit']);
        Route::post('/edit/{id}', [ 'uses' => 'PageStepController@adminUpdate', 'as' => 'page_step.adminUpdate']);


    });



    Route::group(['prefix' => 'faq'], function() {
        Route::get('/list', ['uses' => 'faqController@adminIndex', 'as' => 'faq.adminIndex']);

        Route::get('/new', ['uses' => 'faqController@adminCreate', 'as' => 'faq.adminCreate']);
        Route::post('/new', ['uses' => 'faqController@adminStore', 'as' => 'faq.adminStore']);

        Route::get('/edit/{id}', ['uses' => 'faqController@adminEdit', 'as' => 'faq.adminEdit']);
        Route::post('/edit/{id}', [ 'uses' => 'faqController@adminUpdate', 'as' => 'faq.adminUpdate']);

        Route::get('/trash', ['uses' => 'faqController@viewTrash', 'as' => 'faq.trash']);
        Route::get('/trash/{id}', ['uses' => 'faqController@restoreTrash', 'as' => 'faq.restoretrash']);




        Route::get('/delete/{id}', [
            'uses' => 'faqController@adminDelete',
            'as' => 'faq.adminDelete'
        ]);


    });

    Route::group(['prefix' => 'media'], function() {
        Route::get('/list', ['uses' => 'MediaController@adminIndex', 'as' => 'media.adminIndex']);

        Route::get('/new', ['uses' => 'MediaController@adminCreate', 'as' => 'media.adminCreate']);
        Route::post('/new', ['uses' => 'MediaController@adminStore', 'as' => 'media.adminStore']);

        Route::get('/edit/{id}', ['uses' => 'MediaController@adminEdit', 'as' => 'media.adminEdit']);
        Route::post('/edit/{id}', [ 'uses' => 'MediaController@adminUpdate', 'as' => 'media.adminUpdate']);

        Route::get('/trash', ['uses' => 'MediaController@viewTrash', 'as' => 'media.trash']);
        Route::get('/trash/{id}', ['uses' => 'MediaController@restoreTrash', 'as' => 'media.restoretrash']);




        Route::get('/delete/{id}', [
            'uses' => 'MediaController@adminDelete',
            'as' => 'media.adminDelete'
        ]);


    });

    Route::group(['prefix' => 'rate'], function() {
        Route::get('/list', ['uses' => 'RateController@adminIndex', 'as' => 'rate.adminIndex']);

        Route::get('/edit/{id}', ['uses' => 'RateController@adminEdit', 'as' => 'rate.adminEdit']);
        Route::post('/edit/{id}', [ 'uses' => 'RateController@adminUpdate', 'as' => 'rate.adminUpdate']);

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


         Route::delete('/deleteQualification/{id}', [
            'uses' => 'WorkCompanyController@deleteQualification',
            'as' => 'workcompany.deleteQualification'
        ]);
        
        Route::delete('/deleteOpportunity/{id}', [
            'uses' => 'WorkCompanyController@deleteOpportunity',
            'as' => 'workcompany.deleteOpportunity'
        ]);

        Route::patch('/enableOpportunity/{id}', [
            'uses' => 'WorkCompanyController@enableOpportunity',
            'as' => 'workcompany.enableOpportunity'
        ]);

        Route::patch('/disableOpportunity/{id}', [
            'uses' => 'WorkCompanyController@disableOpportunity',
            'as' => 'workcompany.disableOpportunity'
        ]);

        Route::patch('/enableQualification/{id}', [
            'uses' => 'WorkCompanyController@enableQualification',
            'as' => 'workcompany.enableQualification'
        ]);

        Route::patch('/disableQualification/{id}', [
            'uses' => 'WorkCompanyController@disableQualification',
            'as' => 'workcompany.disableQualification'
        ]);

        

        Route::get('/trash', ['uses' => 'WorkCompanyController@viewTrash', 'as' => 'workcompany.trash']);


        Route::get('/trash/{id}', ['uses' => 'WorkCompanyController@restoreTrash', 'as' => 'workcompany.restoretrash']);



        
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

        Route::delete('/deleteQualification/{id}', [
            'uses' => 'InternshipCompanyController@deleteQualification',
            'as' => 'internshipcompany.deleteQualification'
        ]);

        Route::delete('/deleteOpportunity/{id}', [
            'uses' => 'InternshipCompanyController@deleteOpportunity',
            'as' => 'internshipcompany.deleteOpportunity'
        ]);

        Route::patch('/enableOpportunity/{id}', [
            'uses' => 'InternshipCompanyController@enableOpportunity',
            'as' => 'internshipcompany.enableOpportunity'
        ]);

        Route::patch('/disableOpportunity/{id}', [
            'uses' => 'InternshipCompanyController@disableOpportunity',
            'as' => 'internshipcompany.disableOpportunity'
        ]);

        Route::patch('/enableQualification/{id}', [
            'uses' => 'InternshipCompanyController@enableQualification',
            'as' => 'internshipcompany.enableQualification'
        ]);

        Route::patch('/disableQualification/{id}', [
            'uses' => 'InternshipCompanyController@disableQualification',
            'as' => 'internshipcompany.disableQualification'
        ]);


        Route::get('/trash', ['uses' => 'InternshipCompanyController@viewTrash', 'as' => 'internshipcompany.trash']);


        Route::get('/trash/{id}', ['uses' => 'InternshipCompanyController@restoreTrash', 'as' => 'internshipcompany.restoretrash']);


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

        Route::get('/trash', ['uses' => 'ApplicationController@viewTrash', 'as' => 'application.trash']);


        Route::get('/trash/{id}', ['uses' => 'ApplicationController@restoreTrash', 'as' => 'application.restoretrash']);

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
    Route::group(['prefix' => 'promo'], function() {
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
Route::resource('aboutus', 'AboutUsController');
Route::resource('event', 'EventPluginController');
Route::resource('subscribe', 'SubscribeController');
Route::resource('internship', 'InternshipController');
Route::resource('work', 'WorkController');
Route::resource('faq', 'faqController');
Route::resource('media', 'MediaController');
Route::resource('workvisa', 'SkilledController');
Route::resource('aupair', 'AuPairController');
Route::resource('opportunities', 'opportunityController');


Route::get('/single_event/{fbevent_id}', [
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