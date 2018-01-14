<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;

use Exception;
use App\DiaDiem;
use App\Xe;
use App\NhaXe;
use App\Comment;


class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function getIndex(){
		$strs = Controller::getDiaDiemStrs();
		return view('pages.index', ['diaDiem' => $strs]);
	}

	public static function getDiaDiemStrs(){
		try{
			$diaDiem = DiaDiem::all();
			$strs = array();
			foreach ($diaDiem as $value) {
				$str = $value->quan_huyen.'-'. $value->tinh_tp;
				array_push($strs, $str);
			}
			return $strs;
		}catch(Exception $e)
		{
			echo "Error: Thông tin lỗi, vui lòng back và nhập lại";
		}

	}

	public function timKiem(Request $req){
		try{
			$strs = Controller::getDiaDiemStrs();

			if (strpos($req->txtNoiDi,"-") != false){			
				$noiDi = explode('-', $req->txtNoiDi);				
				$quan_huyen_di = $noiDi[0];
				$tinh_tp_di = $noiDi[1];
				$noidi = DiaDiem::select('id','quan_huyen','tinh_tp')->where('quan_huyen','like','%'.$quan_huyen_di.'%')->where('tinh_tp','like','%'.$tinh_tp_di.'%')->first();	
			//echo $noidi->id;		
			}else{
				$tinh_tp_di = $req->txtNoiDi;			
				$noidi = DiaDiem::select('id','quan_huyen','tinh_tp')->where('tinh_tp','like','%'.$tinh_tp_di.'%')->first();			
			//echo $noidi->id;
			}

			if (strpos($req->txtNoiDen, "-") != false) {			
				$noiDen = explode('-', $req->txtNoiDen);
				$quan_huyen_den = $noiDen[0];
				$tinh_tp_den = $noiDen[1];	
				$noiden = DiaDiem::select('id','quan_huyen','tinh_tp')->where('quan_huyen','like','%'.$quan_huyen_den.'%')->where('tinh_tp','like','%'.$tinh_tp_den.'%')->first();
			//echo $noiden->id;
			}else{
				$tinh_tp_den = $req->txtNoiDen;
				$noiden = DiaDiem::select('id','quan_huyen','tinh_tp')->where('tinh_tp','like','%'.$tinh_tp_den.'%')->first();
			//echo $noiden->id;
			}				

			if ($noidi == NULL || $noiden ==  NULL){
				$results = null;
				$noidi = null;
				$noiDen = null;
			}else{
				$results = Xe::where('noi_di_id',$noidi->id)->where('noi_den_id',$noiden->id)->join('nha_xe','Xe.nha_xe_id','=','nha_xe.id')->select('nha_xe.id','nha_xe.ten_nha_xe','xe.gia','xe.so_tuyen_di','nha_xe.dien_thoai','xe.dich_vu')->orderBy('xe.gia','ASC')->get();		

			}
			return view('pages.ket_qua_tim_kiem', ['noiDi' => $noidi,'noiDen' => $noiden,'results' => $results,'req' => $req,'diaDiem' => $strs]);
		}catch(Exception $e)
		{
			echo "Error: Thông tin lỗi, vui lòng back và nhập lại";
		}
		
	}

	public function getChiTietNhaXe(Request $req){
		try{
			$id = $req->id;
			$strs = Controller::getDiaDiemStrs();
			$nha_xe = NhaXe::where('id',$id)->first();

			$list_xe = Xe::where('nha_xe_id',$id)->join('dia_diem as noidi','noidi.id','=','xe.noi_di_id')->join('dia_diem as noiden','noiden.id','=','xe.noi_den_id')->select('noidi.tinh_tp as noidi','noiden.tinh_tp as noiden','xe.dich_vu as dich_vu','xe.gia as gia_ve','xe.so_tuyen_di as so_tuyen_di')->get();

			$list_comment = Comment::where('nha_xe_id', $id)->join('users', 'users.id', '=', 'Comment.user_id')->select('users.name as name', 'comment.ngay as gio', 'comment.noi_dung as noi_dung')->orderBy('comment.ngay','ASCN')->get();
			echo $nha_xe->link_anh;

			return view('pages.chi_tiet_nha_xe', ['diaDiem' => $strs, 'nha_xe' => $nha_xe, 'list_xe' => $list_xe, 'list_comment' => $list_comment]);
		}catch(Exception $e)
		{
			echo "Error: Thông tin lỗi, vui lòng back và nhập lại";
		}
		
	}

	public function postImg(Request $request){
		try{
			if($request->hasFile('imgFile'))
			{
				$file = $request->file('imgFile');
				$ext = $file->getClientOriginalExtension();
				$name = $file->getClientOriginalName();
				if( $ext == 'png' || $ext == 'jpg'){
					$file->move('imgs', $name);
					echo "Post success";
				} else {
					echo "Not image file";
				}
			} else
			{
				echo "Not found file";
			}
		}catch(Exception $e)
		{
			echo "Error: Thông tin lỗi, vui lòng back và nhập lại";
		}
		
	}

	public function addComment($id, $user_id, Request $req)
	{		
		try{
			$comment = new Comment();
			$comment->user_id = $user_id;
			$comment->nha_xe_id = $id;
			$comment->noi_dung = $req->noi_dung;
			date_default_timezone_set('Asia/Ho_Chi_minh'); 
			$comment->ngay = Carbon::now();
			$comment->save();
			return Redirect::back();
		}catch(Exception $e)
		{
			echo "Error: Thông tin lỗi, vui lòng back và nhập lại";
		}
		
	}

	public function insertDiaDiem($str){
		try{
			if (strpos($str,"-") != false){
				$str = explode('-', $str);
				$quan_huyen = $str[0];
				$tinh_tp = $str[1];	
				$DiaDiem = new DiaDiem();
				$DiaDiem->quan_huyen = $quan_huyen;
				$DiaDiem->tinh_tp = $tinh_tp;
				$id = DiaDiem::select('id')->where('quan_huyen','=',$quan_huyen)->where('tinh_tp','=',$tinh_tp)->first();				

				if ($id == null){
					$DiaDiem->save();					
					$id = DiaDiem::select('id')->where('quan_huyen','=',$quan_huyen)->where('tinh_tp','=',$tinh_tp)->first();	
				}						
				return $id->id;		
			}else{
				return null;
			}

		}catch(Exception $e)
		{
			echo "Error: Thông tin lỗi, vui lòng back và nhập lại";
		}
		
	}

	public function dangKiXe($id, Request $request){
		try{
			$noidi = $request->noi_di;
			$noiden = $request->noi_den;
			$noidi = Controller::insertDiaDiem($noidi);
			$noiden = Controller::insertDiaDiem($noiden);

			$xe = new Xe();		
			$xe->nha_xe_id = $id;
			$xe->so_tuyen_di = $request->so_tuyen_di;		
			$xe->gia = $request->gia;
			$xe->dich_vu = $request->dich_vu;
			if ($noidi == null || $noiden == null){
				echo "Sai Cú Pháp Địa Điểm";			
			}else{
				$xe->noi_di_id = $noidi;
				$xe->noi_den_id = $noiden;
				$xe->save();
				echo "đăng kí thành công";	
				return redirect()->route('my_account');
			}		
		}catch(Exception $e){
			echo "Error: Thông tin lỗi, vui lòng back và nhập lại";
		}
	}
}
