<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
    		'name' => 'Vũ Văn Tuyến',
    		'email' => 'vvt@gmail.com',
    		'password' => '00000000',
    		'remember_token' => '00000000'
    	]);

    	DB::table('users')->insert([
    		'name' => 'Lê Thanh Thủy',
    		'email' => 'ThanhThuy@gmail.com',
    		'password' => '00000000',
    		'remember_token' => '00000000'
    	]);

    	DB::table('users')->insert([
    		'name' => 'Nguyễn Phương Trang',
    		'email' => 'phuongtrang@gmail.com',
    		'password' => '00000000',
    		'remember_token' => '00000000'
    	]);

    	DB::table('nha_xe')->insert([
    		'user_id' => 1,
    		'ten_nha_xe' => 'Hoàng Long',
    		'ten_chu_xe' => 'Vũ Văn Tuyến',
    		'dien_thoai' => '02253920920',
            'email' => 'hoanglong@bus.com',
            'thong_tin' => 'Hãng xe Hoàng Long hay còn gọi là Hoàng Long Asia hoặc Hoàng Long Bus là một trong những thương hiệu xe chất lượng cao hàng đầu Việt Nam. Phục vụ hàng chục triệu hành khách Việt Nam và quốc tế trong suốt 16 năm hoạt động, xe khách Hoàng Long đã đạt giải thưởng Sao Vàng đất Việt 3 lần liên tiếp. Xe giường nằm cao cấp Hoàng Long liên tục cải tiến với rất nhiều tiện ích như TV, máy lạnh, khăn lạnh, nhà vệ sinh,...',
            'dia_chi' => 'Số 05 Phạm Ngũ Lão - P.Lương Khánh Thiện - Q.Ngô Quyền - TP. Hải Phòng',
            'link_anh' => ''            
        ]);

    	DB::table('nha_xe')->insert([
    		'user_id' => 2,
    		'ten_nha_xe' => 'Thanh Thủy',
    		'ten_chu_xe' => 'Lê Thanh Thủy',
    		'dien_thoai' => '0165666229',
            'email' => 'thanhthuy@bus.com',
            'thong_tin' => 'Hãng xe Thanh Thủy hay còn gọi là một trong những thương hiệu xe chất lượng cao hàng đầu Việt Nam. Phục vụ hàng chục triệu hành khách Việt Nam và quốc tế trong suốt 16 năm hoạt động, xe khách Thanh Thủy đã đạt giải thưởng Sao Vàng đất Việt 3 lần liên tiếp. Xe giường nằm cao cấp Thanh Thủy liên tục cải tiến với rất nhiều tiện ích như TV, máy lạnh, khăn lạnh, nhà vệ sinh,...',
            'dia_chi' => 'Cát Hưng, Phù Cát, Bình Định, Việt Nam',
            'link_anh' => ''
        ]);

    	DB::table('nha_xe')->insert([
    		'user_id' => 3,
    		'ten_nha_xe' => 'Phương Trang',
    		'ten_chu_xe' => 'Nguyễn Phương Trang',
    		'dien_thoai' => '19006067',
            'email' => 'phuongtrang@bus.com',
            'thong_tin' => 'Phương Trang phục vụ hơn 20 triệu lượt khách/ bình quân 1 năm trên toàn quốc. Phương Trang có hơn 200 Phòng vé, Trạm trung chuyển, Bến xe... trên toàn hệ thống FUTA. Phương Trang phục vụ hơn 1000 chuyến xe đường dài và liên tỉnh mỗi ngày,...',
            'dia_chi' => '80 Trần Hưng Đạo, Q1, TP Hồ Chí Minh',
            'link_anh' => ''
        ]);

    	DB::table('dia_diem')->insert([
    		'quan_huyen' => 'Phù Cát',
    		'tinh_tp' => 'Bình Định'
    	]);

      DB::table('dia_diem')->insert([
          'quan_huyen' => 'Thủ Đức',
          'tinh_tp' => 'TP Hồ Chí Minh'
      ]);

      DB::table('dia_diem')->insert([
          'quan_huyen' => 'Bình Tân',
          'tinh_tp' => 'TP Hồ Chí Minh'
      ]);

      DB::table('dia_diem')->insert([
          'quan_huyen' => 'Nhơn Hạnh',
          'tinh_tp' => 'Bình Định'
      ]);

      DB::table('dia_diem')->insert([
          'quan_huyen' => 'Tây Biên',
          'tinh_tp' => 'Tây Ninh'
      ]);

      DB::table('dia_diem')->insert([
          'quan_huyen' => 'Trảng Bàn',
          'tinh_tp' => 'Tây Ninh'
      ]);   	

      DB::table('xe')->insert([    		
          'nha_xe_id' => 1,
          'so_tuyen_di' => 10,
          'gia' => 100000,
          'dich_vu' => 'Giường năm cao cấp',
          'noi_di_id' => 3,
          'noi_den_id' => 5
      ]);

      DB::table('xe')->insert([
          'nha_xe_id' => 1,
          'so_tuyen_di' => 10,
          'gia' => 150000,
          'dich_vu' => 'Giường năm cao cấp',          
          'noi_di_id' => 3,
          'noi_den_id' => 5
      ]);

      DB::table('xe')->insert([
          'nha_xe_id' => 1,
          'so_tuyen_di' => 10,
          'gia' => 300000,
          'dich_vu' => 'Giường năm cao cấp',
          'noi_di_id' => 2,
          'noi_den_id' => 1
      ]);

      DB::table('xe')->insert([    		
          'nha_xe_id' => 2,
          'so_tuyen_di' => 10,
          'gia' => 280000,
          'dich_vu' => 'Giường năm cao cấp',    
          'noi_di_id' => 2,
          'noi_den_id' => 1
      ]);

      DB::table('xe')->insert([
          'nha_xe_id' => 2,
          'so_tuyen_di' => 10,
          'gia' => 280000,
          'dich_vu' => 'Giường năm cao cấp',
          'noi_di_id' => 2,
          'noi_den_id' => 1
      ]);

      DB::table('xe')->insert([    		
          'nha_xe_id' => 2,
          'so_tuyen_di' => 10,
          'gia' => 290000,
          'dich_vu' => 'Giường năm cao cấp',    		
          'noi_di_id' => 1,
          'noi_den_id' => 2
      ]);

      DB::table('xe')->insert([    		
          'nha_xe_id' => 3,
          'so_tuyen_di' => 10,
          'gia' => 90000,
          'dich_vu' => 'Giường năm cao cấp',    		
          'noi_di_id' => 3,
          'noi_den_id' => 5
      ]);

      DB::table('xe')->insert([    		
          'nha_xe_id' => 3,
          'so_tuyen_di' => 10,
          'gia' => 100000,
          'dich_vu' => 'Giường năm cao cấp',    		
          'noi_di_id' => 3,
          'noi_den_id' => 6
      ]);

      DB::table('xe')->insert([    		
          'nha_xe_id' => 3,
          'so_tuyen_di' => 10,
          'gia' => 350000,
          'dich_vu' => 'Giường năm cao cấp',    		
          'noi_di_id' => 2,    		
          'noi_den_id' => 1
      ]);

      DB::table('comment')->insert([
          'user_id' => 1,
          'nha_xe_id' => 1,
          'noi_dung' => 'Chất lượng rất tốt, giá cả phải chăng',
          'ngay' => '2018-01-10 07:30:00'
      ]);

      DB::table('comment')->insert([
          'user_id' => 2,
          'nha_xe_id' => 1,
          'noi_dung' => 'Chất lượng rất tốt',
          'ngay' => '2018-01-10 07:30:00'
      ]);

      DB::table('comment')->insert([
          'user_id' => 3,
          'nha_xe_id' => 1,
          'noi_dung' => 'giá cả phải chăng',
          'ngay' => '2018-01-10 07:30:00'
      ]);

      DB::table('comment')->insert([
          'user_id' => 1,
          'nha_xe_id' => 2,
          'noi_dung' => 'Chất lượng rất tốt, giá cả phải chăng',
          'ngay' => '2018-01-10 07:30:00'
      ]);

      DB::table('comment')->insert([
          'user_id' => 3,
          'nha_xe_id' => 1,
          'noi_dung' => 'Chất lượng rất tốt, giá cả phải chăng',
          'ngay' => '2018-01-10 07:30:00'
      ]);   	
        // $this->call(UsersTableSeeder::class);
  }
}
