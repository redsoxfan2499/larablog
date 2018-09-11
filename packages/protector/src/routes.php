<?php

Route::group( ['middleware' => 'web' ], function()
{
    /*----------- Users Routes ------------------*/
    Route::get('protector/user', 'HyperdriveDesigns\Protector\Controllers\UserController@index');
    Route::post('protector/user', 'HyperdriveDesigns\Protector\Controllers\UserController@newUser');
    Route::get('protector/user/{id?}/edit', 'HyperdriveDesigns\Protector\Controllers\UserController@edit');
    Route::post('protector/user/{id?}/edit', 'HyperdriveDesigns\Protector\Controllers\UserController@update');
    Route::post('protector/user/{id?}/delete', 'HyperdriveDesigns\Protector\Controllers\UserController@destroy');
    Route::get('protector/user/matrix', 'HyperdriveDesigns\Protector\Controllers\UserController@showUserMatrix');
    Route::post('protector/user/matrix', 'HyperdriveDesigns\Protector\Controllers\UserController@updateUserMatrix');

    /*----------- Roles Routes ------------------*/
    Route::get('protector/role', 'HyperdriveDesigns\Protector\Controllers\RoleController@index');
    Route::post('protector/role', 'HyperdriveDesigns\Protector\Controllers\RoleController@newRole');
    Route::get('protector/role/{id?}/edit', 'HyperdriveDesigns\Protector\Controllers\RoleController@edit');
    Route::post('protector/role/{id?}/edit', 'HyperdriveDesigns\Protector\Controllers\RoleController@update');
    Route::post('protector/role/{id?}/delete', 'HyperdriveDesigns\Protector\Controllers\RoleController@destroy');

    Route::get('protector/role/{id?}/add', 'HyperdriveDesigns\Protector\Controllers\RoleController@addPermission');
    Route::get('protector/role/matrix', 'HyperdriveDesigns\Protector\Controllers\RoleController@showRoleMatrix');
    Route::post('protector/role/matrix', 'HyperdriveDesigns\Protector\Controllers\RoleController@updateRoleMatrix');

    /*----------- Permissions Routes ------------------*/
    Route::get('protector/permission', 'HyperdriveDesigns\Protector\Controllers\PermissionController@index');
    Route::post('protector/permission', 'HyperdriveDesigns\Protector\Controllers\PermissionController@newPermission');
    Route::get('protector/permission/{id?}/edit', 'HyperdriveDesigns\Protector\Controllers\PermissionController@edit');
    Route::post('protector/permission/{id?}/edit', 'HyperdriveDesigns\Protector\Controllers\PermissionController@update');
    Route::post('protector/permission/{id?}/delete', 'HyperdriveDesigns\Protector\Controllers\PermissionController@destroy');

});
