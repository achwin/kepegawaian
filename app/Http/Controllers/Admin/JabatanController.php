<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Position;
use Excel;
use Session;
use Response;
use DB;

class JabatanController extends Controller
{

    public function index()
    {
        $positions = DB::table('positions')->get();
        $data = [
            'page'      => 'master',
            'positions'     => $positions,
        ];
        return view('admin.master.jabatan.index',$data);
    }

    public function indexExport()
    {
        $periods = DB::table('periods')->get();
        $data = [
            'page'      => 'export',
            'periods'  => $periods,
        ];
        return view('admin.data.export',$data);
    }

    public function detail($period_id)
    {
        $students = DB::table('students')->where('period_id','=',$period_id)->get();
        $data = [
            'page'      => 'data-siswa',
            'students'  => $students,
        ];
        return view('admin.data.detail',$data);
    }

    public function add(Request $request)
    {
        $jabatan = $request->input('name');
        $checkPosition = Position::where('name',$jabatan)->count();
        if ($checkPosition == 0) {
            Position::create(['name' => $jabatan]);
            Session::put('alert-success', 'Data jabatan berhasil ditambahkan.');
        }
        else{
            Session::put('alert-danger', 'Jabatan ini sudah pernah ditambahkan.');
        }
        return Redirect::to('master/jabatan');
    }

    public function edit(Request $request)
    {
        $position = Position::find($request->input('jabatan_id'));
        $position->name = $request->input('name');
        $position->save();
        Session::put('alert-success', 'Data jabatan berhasil diubah.');
        return Redirect::to('master/jabatan');
    }

    public function delete($period_id)
    {
        $period = Period::find($period_id);
        $students = Student::where('period_id',$period_id);
        $students->delete();
        $period->delete();
        Session::put('alert-success', 'Data periode '.$period->tahun.' berhasil dihapus.');
        return Redirect::to('data-siswa');

    }
}