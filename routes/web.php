<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('salary_groups', 'Admin\SalaryGroupsController');
    Route::post('salary_groups_mass_destroy', ['uses' => 'Admin\SalaryGroupsController@massDestroy', 'as' => 'salary_groups.mass_destroy']);
    Route::post('salary_groups_restore/{id}', ['uses' => 'Admin\SalaryGroupsController@restore', 'as' => 'salary_groups.restore']);
    Route::delete('salary_groups_perma_del/{id}', ['uses' => 'Admin\SalaryGroupsController@perma_del', 'as' => 'salary_groups.perma_del']);
    Route::resource('employees', 'Admin\EmployeesController');
    Route::post('employees_mass_destroy', ['uses' => 'Admin\EmployeesController@massDestroy', 'as' => 'employees.mass_destroy']);
    Route::post('employees_restore/{id}', ['uses' => 'Admin\EmployeesController@restore', 'as' => 'employees.restore']);
    Route::delete('employees_perma_del/{id}', ['uses' => 'Admin\EmployeesController@perma_del', 'as' => 'employees.perma_del']);
    Route::resource('import_attendances', 'Admin\ImportAttendancesController');
    Route::get('/import_attendances', 'ImportAttendancesController@index');
    Route::resource('employee_funds', 'Admin\EmployeeFundsController');
    Route::post('employee_funds_mass_destroy', ['uses' => 'Admin\EmployeeFundsController@massDestroy', 'as' => 'employee_funds.mass_destroy']);
    Route::post('employee_funds_restore/{id}', ['uses' => 'Admin\EmployeeFundsController@restore', 'as' => 'employee_funds.restore']);
    Route::delete('employee_funds_perma_del/{id}', ['uses' => 'Admin\EmployeeFundsController@perma_del', 'as' => 'employee_funds.perma_del']);



 
});
