<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\NhaXe;

class DangKiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewDangKiNhaXe(){
        $nhaxe = NhaXe::find(Auth::user()->id);
        if ($nhaxe) {
            return redirect()->route('index');
        }

        return view('pages.dang_ki_nha_xe');
    }

    public function dangKiNhaXe(Request $req)
    {
    	$hangXe = $req->HangXe;
    	$chuXe = $req->ChuXe;
    	$diaChi = $req->DiaChi;
    	$dienThoai = $req->Phone;
    	$thongTin = $req->Info;
        $email = $req->Email;

        if($req->hasFile('imgFile')) 
        {
            $file = $req->file('imgFile');
            $ext = $file->getClientOriginalExtension();
            $fileName = $file->getClientOriginalName();
            if( $ext == 'png' || $ext == 'jpg')
            {
                $file->move('imgs', $fileName);
            } else 
            {
               return view('pages.dang_ki_nha_xe', [
                'error'     =>  'Vui lòng chọn file ảnh (.png, .jpg)',
                'HangXe'    =>  $hangXe, 
                'ChuXe'     =>  $chuXe, 
                'DiaChi'    =>  $diaChi,
                'Phone'     =>  $dienThoai, 
                'Info'      =>  $thongTin,
                'Email'     =>  $email]);
           }
       }
       else
       {
            return view('pages.dang_ki_nha_xe', [
                'error'     =>  'Không tìm thấy file này',
                'HangXe'    =>  $hangXe, 
                'ChuXe'     =>  $chuXe, 
                'DiaChi'    =>  $diaChi,
                'Phone'     =>  $dienThoai, 
                'Info'      =>  $thongTin,
                'Email'     =>  $email]);
        }

        $nhaxe = new NhaXe();
        $nhaxe->user_id = Auth::user()->id;
        $nhaxe->ten_nha_xe = $hangXe;
        $nhaxe->ten_chu_xe = $chuXe;
        $nhaxe->email = $email;
        $nhaxe->dien_thoai = $dienThoai;
        $nhaxe->thong_tin = $thongTin;
        $nhaxe->dia_chi = $diaChi;
        $nhaxe->link_anh = '/imgs/'.$fileName;
        $nhaxe->save();
        return view('my_account');
    }
}
