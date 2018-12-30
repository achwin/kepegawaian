<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Shop;
use Excel;
use Session;
use Response;
use DB;

class ShopController extends Controller
{

    public function index()
    {
        $shops = DB::table('shops')->get();
        $data = [
            'page'      => 'shops',
            'shops'     => $shops,
        ];
        return view('admin.shop.index',$data);
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

    public function addShop()
    {
        $data = [
            'page' => 'shops',
        ];
        return view('admin.shop.add',$data);
    }

    public function postAddShop(Request $request)
    {   
        $attributes = $request->all();
        $attributes['listProduk'] = implode(',', $attributes['produkMasuk']);
        $attributes['produkMasuk'] = count($attributes['produkMasuk']);
        $date1 = date('Y-m-d');
        $date2 = $attributes['lamaCust'];
        $months = (int)abs((strtotime($date1) - strtotime($date2))/(60*60*24*30));
        $attributes['mulaiCust'] = $attributes['lamaCust'];
        
        // > 36 bulan
        if ($months > 36) {
            $attributes['lamaCust'] = '>36 bln';
        }
        // 25 bulan - 36 bulan
        elseif ($months > 24 && $months <= 36) {
            $attributes['lamaCust'] = '24-36 bln';   
        }
        // 13 bulan - 24 bulan
        elseif ($months > 12 && $months <= 24) {
            $attributes['lamaCust'] = '13-24 bln'; 
        }
        // 10 bulan - 12 bulan
        elseif ($months > 9 && $months <= 12) {
            $attributes['lamaCust'] = '10-12 bln'; 
        }
        // 7 bulan - 9 bulan
        elseif ($months > 6 && $months <= 9) {
            $attributes['lamaCust'] = '7-9 bln'; 
        }
        // 4 bulan - 6 bulan
        elseif ($months > 3 && $months <= 6) {
            $attributes['lamaCust'] = '4-6 bln'; 
        }
        // 0 bulan - 3 bulan
        elseif ($months >= 0 && $months <= 3) {
            $attributes['lamaCust'] = '0-3 bln'; 
        }
        Shop::create($attributes);
        Session::put('alert-success', 'Data pelanggan berhasil ditambahkan.');
        return Redirect::to('shops');
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

    public function edit($shop_id)
    {
        $shop = Shop::find($shop_id);
        $listProduk = explode(',', $shop->listProduk);
        $data = [
            'page' => 'shops',
            'shop' => $shop,
            'listProduk' => $listProduk
        ];
        return view('admin.shop.edit',$data);
    }

    public function postEdit($shop_id,Request $request)
    {
        $attributes = $request->all();
        $attributes['listProduk'] = implode(',', $attributes['produkMasuk']);
        $attributes['produkMasuk'] = count($attributes['produkMasuk']);
        $date1 = date('Y-m-d');
        $date2 = $attributes['lamaCust'];
        $months = (int)abs((strtotime($date1) - strtotime($date2))/(60*60*24*30));
        $attributes['mulaiCust'] = $attributes['lamaCust'];
        
        // > 36 bulan
        if ($months > 36) {
            $attributes['lamaCust'] = '>36 bln';
        }
        // 25 bulan - 36 bulan
        elseif ($months > 24 && $months <= 36) {
            $attributes['lamaCust'] = '24-36 bln';   
        }
        // 13 bulan - 24 bulan
        elseif ($months > 12 && $months <= 24) {
            $attributes['lamaCust'] = '13-24 bln'; 
        }
        // 10 bulan - 12 bulan
        elseif ($months > 9 && $months <= 12) {
            $attributes['lamaCust'] = '10-12 bln'; 
        }
        // 7 bulan - 9 bulan
        elseif ($months > 6 && $months <= 9) {
            $attributes['lamaCust'] = '7-9 bln'; 
        }
        // 4 bulan - 6 bulan
        elseif ($months > 3 && $months <= 6) {
            $attributes['lamaCust'] = '4-6 bln'; 
        }
        // 0 bulan - 3 bulan
        elseif ($months >= 0 && $months <= 3) {
            $attributes['lamaCust'] = '0-3 bln'; 
        }
        Shop::find($shop_id)->update($attributes);
        Session::put('alert-success', 'Data pelanggan berhasil diubah.');
        return Redirect::to('shops');
    }
}