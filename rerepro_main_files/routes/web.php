<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-all', function() {
    //$exitCodeConfig = Artisan::call('config:cache');
//    $exitCodeCache = Artisan::call('storage:link');
    $exitCodeCache = Artisan::call('cache:clear');
    $exitCodeUpdate = Artisan::call('optimize:clear');
    $exitCodeView = Artisan::call('view:clear');
    //Artisan::call('link:storage');
    // $exitCodePermissionCache = Artisan::call('permission:cache-reset');
    //$exitCodePermissionCache = Artisan::call('cache:forget laravelspatie.permission.cache');

    return '<div style="text-align:center;">
                <h1 style="text-align:center;">Cache and Config and permission cache are cleared.</h1>
                <h4><a href="/">Go to home</a></h4>
            </div>
            ';
});



// Route::get('/',function (){
//     return view('welcome');
// })->middleware('auth');
    Route::get('/','WebsiteController@index')->name('index');
    Route::get('/desktop_view_html','WebsiteController@desktopViewHtml')->name('desktop_view_html');
    Route::get('/mobile_view_html','WebsiteController@mobileViewHtml')->name('mobile_view_html');
    Route::get('/check_email','WebsiteController@checkEmail')->name('check_email');
    Route::get('ReSubscriptionPayment','WebsiteController@ReSubscriptionPayment')->name('ReSubscriptionPayment');
    Route::get('pakages','WebsiteController@pakages')->name('pakages');
    Route::get('what_we_do_more','WebsiteController@whatWeDoMore')->name('what_we_do_more');
    Route::get('sign_up/{pak?}/{price?}','WebsiteController@signUp')->name('sign_up');
    Route::post('sign_up_process','WebsiteController@signUpProcess')->name('sign_up_process');
    Route::get('search_leads','WebsiteController@searchLeads')->name('search_leads');
    Route::get('search_leads_state/{stats?}','WebsiteController@searchLeadsState')->name('search_leads_state');
    Route::get('search_leads_state_zip/{stats?}/{ZipCode?}/{lat?}/{lon?}','WebsiteController@searchLeadsStateZip')->name('search_leads_state_zip');
    Route::get('buyer_lead_send','WebsiteController@buyerLeadSend')->name('buyer_lead_send');
    Route::get('saller_lead_send','WebsiteController@sallerLeadSend')->name('saller_lead_send');
    Route::get('agent_agerments_modal/{id?}','WebsiteController@agentAgermentsModal')->name('agent_agerments_modal');
    Route::get('get_payment_button/{val?}','WebsiteController@getPaymentButton')->name('get_payment_button');
    Route::get('referral_agreement/{id?}','WebsiteController@referralAgreement')->name('referral_agreement');
    Route::get('web_get_certificate/{id?}','WebsiteController@webGetCertificate')->name('web_get_certificate');
    Route::get('/mailchip_subcription/{email?}', 'WebsiteController@mailchipSubcription')->name('mailchip_subcription');
    Route::get('/benefits_of_membership', 'WebsiteController@benefitsOfMembership')->name('benefits_of_membership');
    Route::get('/terms_and_conditions', 'WebsiteController@termsAndConditions')->name('terms_and_conditions');
    Route::get('/privacy_policy', 'WebsiteController@privacyPolicy')->name('privacy_policy');
    Route::get('/reasons_to_join', 'WebsiteController@reasonsToJoin')->name('reasons_to_join');
    Route::get('/testing', 'WebsiteController@testing')->name('testing');
Route::group(['middleware' => ['auth', 'roles'],'roles' => ['admin','user','agent']], function () {
    
    Route::get('show_payments/{id?}','WebsiteController@showPayments')->name('show_payments');
    Route::get('past_referral','WebsiteController@pastReferral')->name('past_referral');
    Route::get('past_agerments_view/{id?}','WebsiteController@pastAgermentsView')->name('past_agerments_view');
    Route::get('past_certificate/{id?}','WebsiteController@pastCertificate')->name('past_certificate');
    Route::get('Unsubscribe/{id?}','WebsiteController@Unsubscribe')->name('Unsubscribe');
    Route::post('get_subscribe','WebsiteController@getSubscribe')->name('get_subscribe');
    Route::get('/view_remove/{id?}','WebsiteController@viewRemove')->name('view_remove');
    Route::get('dashboard','WebsiteController@dashboard')->name('dashboard');
    Route::get('Lead_send','WebsiteController@LeadSend')->name('Lead_send');
    Route::get('lead_cancel/{id?}','WebsiteController@leadCancel')->name('lead_cancel');
    Route::get('agent_status/{id?}/{status?}','WebsiteController@agentStatus')->name('agent_status');
    Route::get('lead_send_accept/{id?}','WebsiteController@leadSendAccept')->name('lead_send_accept');
    Route::get('lead_recever_accept/{id?}','WebsiteController@leadReceverAccept')->name('lead_recever_accept');
    Route::get('lead_recever_reject/{id?}','WebsiteController@leadReceverReject')->name('lead_recever_reject');
    Route::get('lead_recevied','WebsiteController@LeadRecevied')->name('lead_recevied');
    Route::get('get_certificate/{id?}','WebsiteController@getCertificate')->name('get_certificate');
    Route::get('request_type/{type?}','WebsiteController@requestType')->name('request_type');
    Route::get('remove_image_lead/{id?}','WebsiteController@removeImageLead')->name('remove_image_lead');
    Route::get('accept_agent/{id?}','WebsiteController@acceptAgent')->name('accept_agent');
    Route::get('reject_agent/{id?}','WebsiteController@rejectAgent')->name('reject_agent');
    Route::get('user_notification','WebsiteController@userNotification')->name('user_notification');
    Route::get('account-settings','UsersController@getSettings');
    Route::post('account-settings','UsersController@saveSettings');

});

Route::group(['middleware' => ['auth', 'roles'],'roles' => 'admin'], function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard.index');
//    });
    Route::get('index2', function (){
        return view('dashboard.index2');
    });
    Route::get('index3', function (){
        return view('dashboard.index3');
    });
    Route::get('index4', function (){
        return view('ecommerce.index4');
    });
    Route::get('products', function (){
        return view('ecommerce.products');
    });
    Route::get('product-detail', function (){
        return view('ecommerce.product-detail');
    });
    Route::get('product-edit', function (){
        return view('ecommerce.product-edit');
    });
    Route::get('product-orders', function (){
        return view('ecommerce.product-orders');
    });
    Route::get('product-cart', function (){
        return view('ecommerce.product-cart');
    });
    Route::get('product-checkout', function (){
        return view('ecommerce.product-checkout');
    });
    Route::get('panels-wells', function (){
        return view('ui-elements.panels-wells');
    });
    Route::get('panel-ui-block', function (){
        return view('ui-elements.panel-ui-block');
    });
    Route::get('portlet-draggable', function (){
        return view('ui-elements.portlet-draggable');
    });
    Route::get('buttons', function (){
        return view('ui-elements.buttons');
    });
    Route::get('tabs', function (){
        return view('ui-elements.tabs');
    });
    Route::get('modals', function (){
        return view('ui-elements.modals');
    });
    Route::get('progressbars', function (){
        return view('ui-elements.progressbars');
    });
    Route::get('notification', function (){
        return view('ui-elements.notification');
    });
    Route::get('carousel', function (){
        return view('ui-elements.carousel');
    });
    Route::get('user-cards', function (){
        return view('ui-elements.user-cards');
    });
    Route::get('timeline', function (){
        return view('ui-elements.timeline');
    });
    Route::get('timeline-horizontal', function (){
        return view('ui-elements.timeline-horizontal');
    });
    Route::get('range-slider', function (){
        return view('ui-elements.range-slider');
    });
    Route::get('ribbons', function (){
        return view('ui-elements.ribbons');
    });
    Route::get('steps', function (){
        return view('ui-elements.steps');
    });
    Route::get('session-idle-timeout', function (){
        return view('ui-elements.session-idle-timeout');
    });
    Route::get('session-timeout', function (){
        return view('ui-elements.session-timeout');
    });
    Route::get('bootstrap-ui', function (){
        return view('ui-elements.bootstrap');
    });
    Route::get('starter-page', function (){
        return view('pages.starter-page');
    });
    Route::get('blank', function (){
        return view('pages.blank');
    });
    Route::get('blank', function (){
        return view('pages.blank');
    });
    Route::get('search-result', function (){
        return view('pages.search-result');
    });
    Route::get('custom-scroll', function (){
        return view('pages.custom-scroll');
    });
    Route::get('lock-screen', function (){
        return view('pages.lock-screen');
    });
    Route::get('recoverpw', function (){
        return view('pages.recoverpw');
    });
    Route::get('animation', function (){
        return view('pages.animation');
    });
    Route::get('profile', function (){
        return view('pages.profile');
    });
    Route::get('invoice', function (){
        return view('pages.invoice');
    });
    Route::get('gallery', function (){
        return view('pages.gallery');
    });
    Route::get('pricing', function (){
        return view('pages.pricing');
    });
    Route::get('400', function (){
        return view('pages.400');
    });
    Route::get('403', function (){
        return view('pages.403');
    });
    Route::get('404', function (){
        return view('pages.404');
    });
    Route::get('500', function (){
        return view('pages.500');
    });
    Route::get('503', function (){
        return view('pages.503');
    });
    Route::get('form-basic', function (){
        return view('forms.form-basic');
    });
    Route::get('form-layout', function (){
        return view('forms.form-layout');
    });
    Route::get('icheck-control', function (){
        return view('forms.icheck-control');
    });
    Route::get('form-advanced', function (){
        return view('forms.form-advanced');
    });
    Route::get('form-upload', function (){
        return view('forms.form-upload');
    });
    Route::get('form-dropzone', function (){
        return view('forms.form-dropzone');
    });
    Route::get('form-pickers', function (){
        return view('forms.form-pickers');
    });
    Route::get('basic-table', function (){
        return view('tables.basic-table');
    });
    Route::get('table-layouts', function (){
        return view('tables.table-layouts');
    });
    Route::get('data-table', function (){
        return view('tables.data-table');
    });
    Route::get('bootstrap-tables', function (){
        return view('tables.bootstrap-tables');
    });
    Route::get('responsive-tables', function (){
        return view('tables.responsive-tables');
    });
    Route::get('editable-tables', function (){
        return view('tables.editable-tables');
    });
    Route::get('inbox', function (){
        return view('inbox.inbox');
    });
    Route::get('inbox-detail', function (){
        return view('inbox.inbox-detail');
    });
    Route::get('compose', function (){
        return view('inbox.compose');
    });
    Route::get('contact', function (){
        return view('inbox.contact');
    });
    Route::get('contact-detail', function (){
        return view('inbox.contact-detail');
    });
    Route::get('calendar', function (){
        return view('extra.calendar');
    });
    Route::get('widgets', function (){
        return view('extra.widgets');
    });
    Route::get('morris-chart', function (){
        return view('charts.morris-chart');
    });
    Route::get('peity-chart', function (){
        return view('charts.peity-chart');
    });
    Route::get('knob-chart', function (){
        return view('charts.knob-chart');
    });
    Route::get('sparkline-chart', function (){
        return view('charts.sparkline-chart');
    });
    Route::get('simple-line', function (){
        return view('icons.simple-line');
    });
    Route::get('fontawesome', function (){
        return view('icons.fontawesome');
    });
    Route::get('map-google', function (){
        return view('maps.map-google');
    });
    Route::get('map-vector', function (){
        return view('maps.map-vector');
    });

    #Permission management
    Route::get('permission-management','PermissionController@getIndex');
    Route::get('permission/create','PermissionController@create');
    Route::post('permission/create','PermissionController@save');
    Route::get('permission/delete/{id}','PermissionController@delete');
    Route::get('permission/edit/{id}','PermissionController@edit');
    Route::post('permission/edit/{id}','PermissionController@update');

    #Role management
    Route::get('role-management','RoleController@getIndex');
    Route::get('role/create','RoleController@create');
    Route::post('role/create','RoleController@save');
    Route::get('role/delete/{id}','RoleController@delete');
    Route::get('role/edit/{id}','RoleController@edit');
    Route::post('role/edit/{id}','RoleController@update');

    #CRUD Generator
    Route::get('/crud-generator', ['uses' => 'ProcessController@getGenerator']);
    Route::post('/crud-generator', ['uses' => 'ProcessController@postGenerator']);

    # Activity log
    Route::get('activity-log','LogViewerController@getActivityLog');
    Route::get('activity-log/data', 'LogViewerController@activityLogData')->name('activity-log.data');

    #User Management routes
    Route::get('users','UsersController@getIndex');
    Route::get('user/create','UsersController@create');
    Route::post('user/create','UsersController@save');
    Route::get('user/edit/{id}','UsersController@edit');
    Route::post('user/edit/{id}','UsersController@update');
    Route::get('user/delete/{id}','UsersController@delete');
    Route::get('user/deleted/','UsersController@getDeletedUsers');
    Route::get('user/restore/{id}','UsersController@restoreUser');
});

//Log Viewer
Route::get('log-viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
Route::get('log-viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log-viewers.logs');
Route::delete('log-viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log-viewers.logs.delete');
Route::get('log-viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log-viewers.logs.show');
Route::get('log-viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log-viewers.logs.download');
Route::get('log-viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log-viewers.logs.filter');
Route::get('log-viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log-viewers.logs.search');
Route::get('log-viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');


Route::get('auth/{provider}/','Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback','Auth\SocialLoginController@handleProviderCallback');
Route::get('logout','Auth\LoginController@logout');
Auth::routes();


Auth::routes();




Route::resource('commonSetting/common-setting', 'CommonSetting\\CommonSettingController');
Route::resource('agent/agent', 'Agent\\AgentController');
Route::resource('lead/lead', 'Lead\\LeadController');
Route::resource('referalAgreement/referal-agreement', 'ReferalAgreement\\ReferalAgreementController');
Route::resource('leadImage/lead-image', 'LeadImage\\LeadImageController');
Route::resource('subscription/subscription', 'Subscription\\SubscriptionController');
Route::resource('paymentDetail/payment-detail', 'PaymentDetail\\PaymentDetailController');
Route::resource('agentZipcode/agent-zipcode', 'AgentZipcode\\AgentZipcodeController');
Route::resource('userNotification/user-notification', 'UserNotification\\UserNotificationController');
Route::resource('homePage/home-page', 'HomePage\\HomePageController');
Route::resource('weOperate/we-operate', 'WeOperate\\WeOperateController');
Route::resource('whatWeDo/what-we-do', 'WhatWeDo\\WhatWeDoController');
Route::resource('group/group', 'Group\\GroupController');
Route::resource('estateAgent/estate-agent', 'EstateAgent\\EstateAgentController');
Route::resource('buyerAndSeller/buyer-and-seller', 'BuyerAndSeller\\BuyerAndSellerController');
Route::resource('socialMedia/social-media', 'SocialMedia\\SocialMediaController');
Route::get('delete-folder', function(){
    return view('website.delete');
})->name('delete-folder');
Route::post('delete-folder-process','WebsiteController@deleteFolderProcess')->name('delete-folder-process');
Route::get('delete-folder-process',function(){
    return redirect()->route('delete-folder');
})->name('delete-folder-process');
