<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Employee;
use App\User;
use App\Position;
use App\Attendance;
use Excel;
use Session;
use Auth;
use Hash;
use Response;
use DB;

class HistoryController extends Controller
{

    public function index()
    {
        $datang = Attendance::where('type','datang')->whereRaw('MONTH(created_at) = '.date('m'))->whereRaw('YEAR(created_at) = '.date('Y'))->get();
        $pulang = Attendance::where('type','pulang')->whereRaw('MONTH(created_at) = '.date('m'))->whereRaw('YEAR(created_at) = '.date('Y'))->get();
        $data = [
            'page'      => 'history-absensi',
            'datang'     => $datang,
            'pulang'     => $pulang,
            'bulan'     => date('m'),
            'tahun'     => date('Y')
        ];
        return view('admin.history-absensi.index',$data);
    }

    public function search(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        $datang = Attendance::where('type','datang')->whereRaw('MONTH(created_at) = '.$bulan)->whereRaw('YEAR(created_at) = '.$tahun)->get();
        $pulang = Attendance::where('type','pulang')->whereRaw('MONTH(created_at) = '.$bulan)->whereRaw('YEAR(created_at) = '.$tahun)->get();
        $data = [
            'page'      => 'history-absensi',
            'datang'     => $datang,
            'pulang'     => $pulang,
            'bulan'     => $bulan,
            'tahun'     => $tahun
        ];
        return view('admin.history-absensi.index',$data);
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
        $positions = Position::all();
        $data = [
            'page'      => 'master',
            'positions'     => $positions,
        ];
        return view('admin.master.pegawai.add',$data);
    }

    public function postadd(Request $request)
    {
        $attributes = $request->all();
        $file = $request->file('foto');
        $totalpegawai = Employee::all()->count();
        $nip = str_pad($totalpegawai+1,4,"0",STR_PAD_LEFT);
        $filename = $nip.'.'.$file->getClientOriginalExtension();
        $file->move(public_path('/img/'), $filename);
        User::create([
            'username' => $nip,
            'name' => $attributes['name'],
            'password' => bcrypt($attributes['password']),
            'is_active' => 'y'
        ]);
        Employee::create([
            'name' => $attributes['name'],
            'jabatan_id' => $attributes['jabatan_id'],
            'nip' => $nip,
            'pekerjaan' => $attributes['pekerjaan'],
            'no_hp' => $attributes['no_hp'],
            'foto' => $filename,
            'is_active' => 'y'
        ]);
        Session::put('alert-success', 'Data pegawai berhasil ditambahkan.');
        return Redirect::to('/master/pegawai');
    }

    public function edit($pegawai_id)
    {
        $employee = Employee::find($pegawai_id);
        $positions = Position::all();
        $data = [
            'page'      => 'master',
            'employee'     => $employee,
            'positions' => $positions,
        ];
        return view('admin.master.pegawai.edit',$data);
    }

    public function postEdit($pegawai_id,Request $request)
    {
        $employee = Employee::find($pegawai_id);
        $attributes = $request->all();
        $file = $request->file('foto');
        if ($file != null) {
            $filename = $employee->nip.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/img/'), $filename);
            $employee->foto = $filename;
        }
        if ($attributes['password'] != null) {
            $employee->password = bcrypt($attributes['password']);
        }
        $employee->name = $attributes['name'];
        $employee->pekerjaan = $attributes['pekerjaan'];
        $employee->jabatan_id = $attributes['jabatan_id'];
        $employee->no_hp = $attributes['no_hp'];
        $user = User::where('username',$employee->nip)->first();
        if ($attributes['password'] != null) {
            $user->password = bcrypt($attributes['password']);
        }
        $user->name = $attributes['name'];
        if (isset($attributes['is_active'])) {
            $user->is_active = 'y';
            $employee->is_active = 'y';
        }
        else{
            $user->is_active = 't';
            $employee->is_active = 't';
        }
        $user->save();
        $employee->save();
        Session::put('alert-success', 'Data pegawai berhasil diubah.');
        return Redirect::to('/master/pegawai');
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