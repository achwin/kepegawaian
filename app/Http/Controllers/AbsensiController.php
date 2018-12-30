<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Attendance;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Session;
use Carbon\Carbon;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class AbsensiController extends Controller
{
    public function index()
    {
        return view('absensi');
    }

    public function postAbsensi($type,Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');
        $nip = $request->input('nip');
        $password = $request->input('password');
        $user = User::where('username',$nip)->first();
        if ($user == null) {
            Session::put('msg', 'not-found');
            return Redirect::back();
        }
        $dateNow = Carbon::today()->toDateString();
        // Cek apakah sudah absen
        $absensi = Attendance::where([
            ['nip','=',$nip],
            ['tanggal','=',$dateNow],
            ['type','=',$type]
        ])->get();
        if (count($absensi) > 0) {
            Session::put('msg', 'sudah-absen');
            return Redirect::back();
        }
        // Kondisi belum absen
        if ($type == 'datang') {
            // Cek apakah telat
            $timeNow = date('H:i:s');
            $timeTreshold = date('09:00:00');
            $is_late = 't';
            if (strtotime($timeNow) >= strtotime($timeTreshold)) {
              $is_late = 'y';
            }
            Attendance::create([
                'tanggal' => $dateNow,
                'is_late' => $is_late,
                'nip' => $nip,
                'type' => $type,
                'pukul' => $timeNow
            ]);
        }
        elseif ($type == 'pulang') {
            // Cek apakah sudah absen pas datang
            $absensiKedatangan = Attendance::where([
                ['nip','=',$nip],
                ['tanggal','=',$dateNow],
                ['type','=','datang']
            ])->get();
            if (count($absensiKedatangan) == 0) {
                Session::put('msg', 'belum-absen-kedatangan');
                return Redirect::back();
            }
            Attendance::create([
                'tanggal' => $dateNow,
                'nip' => $nip,
                'type' => $type,
                'pukul' => date('H:i:s')
            ]);
        }
        Session::put('msg', 'sukses-absen');
        return Redirect::back();
    }
}