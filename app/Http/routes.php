<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
# --VIEWS--
Route::get('/', function () {
    return view('home');
});

# --AUTHENTICATION ROUTES--
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

# --USER--
Route::post('user/request', 'User\UserRequestController@sendNewRequest');

# --ADMIN SECTION--
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    # --DASHBOARD--
    Route::get('dashboard', 'Admin\DashboardController@index');

    Route::group(['prefix' => 'dashboard'], function () {

        # --REQUESTS--
        Route::get('requests', 'Admin\AdminRequestController@showAllRequests');
        Route::get('requests/{id}', [
            'as' => 'request',
            'uses' => 'Admin\AdminRequestController@showRequest'
        ]);
        Route::post('requests/{id}/decline', [
            'as' => 'request.decline',
            'uses' => 'Admin\AdminRequestController@declineRequest'
        ]);
        Route::get('requests/{id}/approve', [
            'as' => 'request.approve',
            'uses' => 'Admin\AdminRequestController@approveRequest'
        ]);
        Route::get('all-requests/excel/export', 'Admin\ExcelController@getAllRequestsToExcel');

        # --EMAILS--
        Route::get('contact', 'Admin\EmailController@showForm');
        Route::post('sendEmail', [
            'as' => 'send.email',
            'uses' => 'Admin\EmailController@sendEmail'
        ]);

        # --PROJECTS--
        Route::get('project', 'Admin\ProjectController@showAllProjects');
        Route::post('projects/create', [
            'as' => 'project.create',
            'uses' => 'Admin\ProjectController@store'
        ]);
        Route::get('project/{id}/group', [
            'as' => 'project.group',
            'uses' => 'Admin\ProjectController@showGroups'
        ]);
        Route::post('project/group/assign', [
            'as' => 'project.group.assign',
            'uses' => 'Admin\ProjectController@assignGroup'
        ]);
        Route::post('project/group/revoke', [
            'as' => 'project.group.revoke',
            'uses' => 'Admin\ProjectController@revokeGroup'
        ]);

        # --USERS--
        Route::resource('user', 'Admin\UserController');

        # --GROUPS--
        Route::get('group', 'Admin\GroupController@showAllGroups');
        Route::get('group/create', 'Admin\GroupController@showForm');
        Route::post('group/store', 'Admin\GroupController@store');
        Route::get('group/{id}/user', [
            'as' => 'group.user',
            'uses' => 'Admin\GroupController@showUsers'
        ]);
        Route::post('group/user/assign', [
            'as' => 'group.user.assign',
            'uses' => 'Admin\GroupController@assignUser'
        ]);
        Route::post('group/user/revoke', [
            'as' => 'group.user.revoke',
            'uses' => 'Admin\GroupController@revokeUser'
        ]);

        # --INTERESTS--
        Route::get('interest', 'Admin\InterestController@showAllInterests');
        Route::get('interest/create', 'Admin\InterestController@showForm');
        Route::post('interest/store', 'Admin\InterestController@store');

        # --FEEDBACKS--
        Route::get('feedback/{type?}', 'Admin\FeedbackController@showProjects');
        Route::get('feedback/project/{id}', [
            'as' => 'feedback.project',
            'uses' => 'Admin\FeedbackController@showFeedbacks'
        ]);

    });
});

# API FOR MOBILE
Route::group(['prefix' => 'api'], function()
{
    Route::post('login', 'Api\AuthController@login');

    Route::post('register', 'Api\AuthController@register');

    Route::post('logout', 'Api\AuthController@logout');

    Route::group(['middleware' => ['jwt.auth', 'jwt.refresh']], function() {

        # API - projects
        Route::get('allprojects', 'Api\ProjectController@getAllProjects');
        Route::get('allprojects/public', 'Api\ProjectController@getAllPublicProjects');
        Route::get('allprojects/private', 'Api\ProjectController@getAllPrivateProjects');
        Route::get('user/{id}/projects', 'Api\ProjectController@getUserProjects');
        Route::get('user/{id}/public-projects', 'Api\ProjectController@getUserPublicProjects');
        Route::get('user/{id}/private-projects', 'Api\ProjectController@getUserPrivateProjects');
        Route::get('search-projects/{search}', 'Api\ProjectController@searchAllProjects');

        # API - feedbacks
        Route::post('feedback/send', 'Api\FeedbackController@sendFeedback');

        # API - interests
        Route::get('user/{id}/interests', 'Api\InterestController@getUserInterests');
        Route::post('user/add-interest', 'Api\InterestController@addInterestToUser');
    });
});


