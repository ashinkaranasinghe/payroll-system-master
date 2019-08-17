<?php
namespace App\Http\Controllers\Admin;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class ImportAttendancesController extends Controller
{
    public function index()
    {
        if (! Gate::allows('import_attendance_access')) {
            return abort(401);
        }
        return view('admin.import_attendances.create');
    }

    public function import() 
    {
        Excel::import(new UsersImport, 'users.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }

    public function create()
    {
        if (! Gate::allows('import_attendance_access')) {
            return abort(401);
        }
        return view('admin.import_attendances.create');
    }
}
