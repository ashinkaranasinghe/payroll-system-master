<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEmployeesRequest;
use App\Http\Requests\Admin\UpdateEmployeesRequest;

class EmployeesController extends Controller
{
    /**
     * Display a listing of Employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('employee_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('employee_delete')) {
                return abort(401);
            }
            $employees = Employee::onlyTrashed()->get();
        } else {
            $employees = Employee::all();
        }

        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating new Employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('employee_create')) {
            return abort(401);
        }
        
        $salary_groups = \App\SalaryGroup::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.employees.create', compact('salary_groups'));
    }

    /**
     * Store a newly created Employee in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeesRequest $request)
    {
        if (! Gate::allows('employee_create')) {
            return abort(401);
        }
        $employee = Employee::create($request->all());



        return redirect()->route('admin.employees.index');
    }


    /**
     * Show the form for editing Employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('employee_edit')) {
            return abort(401);
        }
        
        $salary_groups = \App\SalaryGroup::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $employee = Employee::findOrFail($id);

        return view('admin.employees.edit', compact('employee', 'salary_groups'));
    }

    /**
     * Update Employee in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeesRequest $request, $id)
    {
        if (! Gate::allows('employee_edit')) {
            return abort(401);
        }
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());



        return redirect()->route('admin.employees.index');
    }


    /**
     * Display Employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('employee_view')) {
            return abort(401);
        }
        $employee = Employee::findOrFail($id);

        return view('admin.employees.show', compact('employee'));
    }


    /**
     * Remove Employee from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('employee_delete')) {
            return abort(401);
        }
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.employees.index');
    }

    /**
     * Delete all selected Employee at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('employee_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Employee::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Employee from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('employee_delete')) {
            return abort(401);
        }
        $employee = Employee::onlyTrashed()->findOrFail($id);
        $employee->restore();

        return redirect()->route('admin.employees.index');
    }

    /**
     * Permanently delete Employee from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('employee_delete')) {
            return abort(401);
        }
        $employee = Employee::onlyTrashed()->findOrFail($id);
        $employee->forceDelete();

        return redirect()->route('admin.employees.index');
    }
}
