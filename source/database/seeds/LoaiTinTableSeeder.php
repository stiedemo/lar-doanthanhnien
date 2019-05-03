<?php

use Illuminate\Database\Seeder;

class LoaiTinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        # insert Data Bảng Thể Loại mặc định:
        DB::table('loai_tin')->insert(
            [
                'idtheloai' => 1,
                'ten' => 'Công Văn Đoàn Trường',
                'tenkhongdau' => 'cong-van-doan-truong',
                'mota' => 'Tổng hợp công văn của đoàn trường update công khai trên Blog',
                'tukhoa'=> '',
            ]);
        DB::table('loai_tin')->insert(
            [
                'idtheloai' => 1,
                'ten' => 'Công Văn Ban Giám Hiệu',
                'tenkhongdau' => 'cong-van-ban-giam-hieu',
                'mota' => 'Tổng hợp các công văn từ Ban giám hiệu trường được update công khai',
                'tukhoa'=> '',
            ]);
        DB::table('loai_tin')->insert(
            [
                'idtheloai' => 2,
                'ten' => 'Câu Chuyện Học Đường',
                'tenkhongdau' => 'cau-chuyen-hoc-duong',
                'mota' => 'Tổng hợp những câu chuyện của các đồng chí đoàn viên thanh niên gửi về và được chọn lọc, kể về những câu chuyện vui, buồn trên mái trường, trong lớp học',
                'tukhoa'=> '',
            ]);
        DB::table('loai_tin')->insert(
            [
                'idtheloai' => 3,
                'ten' => 'Giới Thiệu',
                'tenkhongdau' => 'gioi-thieu',
                'mota' => 'Tổng hợp những bài viết giới thiệu về các cá nhân, tổ chức và các vấn đề liên quan',
                'tukhoa'=> '',
            ]
        );

    }
}
