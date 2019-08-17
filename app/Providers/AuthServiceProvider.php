<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Salary groups
        Gate::define('salary_group_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('salary_group_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('salary_group_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('salary_group_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('salary_group_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Employees
        Gate::define('employee_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('employee_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('employee_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('employee_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('employee_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Import attendance
        Gate::define('import_attendance_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Employee funds
        Gate::define('employee_fund_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('employee_fund_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('employee_fund_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('employee_fund_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('employee_fund_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

    }
}
