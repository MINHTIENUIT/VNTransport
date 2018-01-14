<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use App\NhaXe;
use App\Xe;

Route::get('/', function () {
	return redirect()->route('index');
});

Route::get('index', 'Controller@getIndex')->name('index');

Route::get('dang_ki_nha_xe','DangKiController@viewDangKiNhaXe')->name('dang_ki_nha_xe');

Route::get('chi_tiet_nha_xe/{id}','Controller@getChiTietNhaXe')->name('chi_tiet_nha_xe');

Route::post('insert_nha_xe', "DangKiController@dangKiNhaXe")->name('insert_nha_xe');

Route::post('ket_qua_tim_kiem', "Controller@timKiem")->name('ket_qua_tim_kiem');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('post_img', 'Controller@postImg')->name('post_img');

Route::get('save_img_demo', function (){
	return view('pages.save_img_demo');
});

Route::get('binh_luan/{id}/{user_id}', "Controller@addComment")->name('binh_luan');

Route::get('my_account', function(){
	$user = Auth::user();
	$nhaxe = NhaXe::find($user->id);
	if($nhaxe)
	{
		$listxe = Xe::where('nha_xe_id', $nhaxe->id)
		->join('dia_diem as noidi','noidi.id','=','xe.noi_di_id')
		->join('dia_diem as noiden','noiden.id','=','xe.noi_den_id')
		->select('noidi.tinh_tp as noidi_tinh_tp',
			'noiden.tinh_tp as noiden_tinh_tp',
			'noidi.quan_huyen as noidi_quan_huyen',
			'noiden.quan_huyen as noiden_quan_huyen',
			'xe.dich_vu as dich_vu',
			'xe.gia as gia_ve',
			'xe.so_tuyen_di as so_tuyen_di')->get();
		return view('pages.my_account', ['user'=> $user, 'nhaxe' => $nhaxe, 'listxe'=>$listxe]);
	}
	return view('pages.my_account', ['user'=> $user, 'nhaxe' => $nhaxe]);
})->name('my_account')->middleware('auth');

Route::get('dang_ki_xe', function(Request $req){	
	$id = $req->id;
	return view('pages.dang_ki_xe',['id' => $id]);
})->name('dang_ki_xe')->middleware('auth');

Route::post('insert_xe/{id}',"Controller@dangKiXe")->name('insert_xe');

Route::post('chinh_sua_nha_xe', function(Request $req){
	$id = $req->id;
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
			return view('pages.my_account', [
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
		return view('pages.my_account', [
			'error'     =>  'Không tìm thấy file này',
			'HangXe'    =>  $hangXe, 
			'ChuXe'     =>  $chuXe, 
			'DiaChi'    =>  $diaChi,
			'Phone'     =>  $dienThoai, 
			'Info'      =>  $thongTin,
			'Email'     =>  $email]);
	}

	DB::table('nha_xe')->where('id', $id)->update([
		'ten_nha_xe' 	=>  $hangXe,
		'ten_chu_xe' 	=> 	$chuXe,
		'email'			=>	$email,
		'dien_thoai'	=> 	$dienThoai,
		'thong_tin'		=> 	$thongTin,
		'dia_chi'		=> 	$diaChi,
		'link_anh'		=> 	'/imgs/'.$fileName
	]);

	return redirect()->back();
})->name('chinh_sua_nha_xe')->middleware('auth');