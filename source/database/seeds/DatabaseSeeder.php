<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $noidung = "Chào Cờ, Khi Tôi 18|Bùi Thị Hiền Phương/Trực Bình Thường|Nguyễn Đức Hải Cường/Trực Bình Thường|Lê Quang Hải/Trực Bình Thường|Bùi Thị Hiền Phương/Trực Bình Thường|Nguyễn Đức Hải Cường/Trực Bình Thường|Lê Quang Hải";
        DB::table('ke_hoach_hoat_dong')->insert(
            [
                'tuan' => '33',
                'noidung' => $noidung,
                'created_at' => new DateTime(),
            ]);
        // DB::table('danh_gia')->insert(
        //     [
        //         'ten' => 'Nguyễn Văn Anh',
        //         'sao' => '5',
        //         'sodienthoai' => '0583466994',
        //         'sao'=> 4,
        //         'tinhtrang' => 1,
        //         'created_at' => new DateTime(),
        //     ]);
        // DB::table('danh_gia')->insert(
        //     [
        //         'ten' => 'Nguyễn Văn Anh',
        //         'sao' => '5',
        //         'sodienthoai' => '0583466994',
        //         'sao'=> 3,
        //         'tinhtrang' => 1,
        //         'created_at' => new DateTime(),
        //     ]);
        // DB::table('danh_gia')->insert(
        //     [
        //         'ten' => 'Nguyễn Văn Anh',
        //         'sao' => '5',
        //         'sodienthoai' => '0583466994',
        //         'sao'=> 2,
        //         'tinhtrang' => 1,
        //         'created_at' => new DateTime(),
        //     ]);
        // DB::table('danh_gia')->insert(
        //     [
        //         'ten' => 'Nguyễn Văn Anh',
        //         'sao' => '5',
        //         'sodienthoai' => '0583466994',
        //         'sao'=> 5,
        //         'danhgia' => 'Trang web rất hay và bổ ích',
        //         'tinhtrang' => 0,
        //         'created_at' => new DateTime(),
        //     ]);
        // # insert Data Bảng Thể Loại mặc định:
        // DB::table('the_loai')->insert(
        //     [
        //         'id' => 1,
        //         'ten' => 'Công Văn',
        //         'tenkhongdau' => 'cong-van',
        //         'mota' => 'Tổng hợp công văn, chỉ đạo được upload chính thức và công khai',
        //         'tukhoa'=> '',
        //     ]);
        // DB::table('the_loai')->insert(
        //     [
        //         'id' => 2,
        //         'ten' => 'Chia Sẻ',
        //         'tenkhongdau' => 'chia-se',
        //         'mota' => 'Tổng hợp các bài viết chia sẻ của các thành viên gửi tới mọi người hoặc những người yêu thương',
        //         'tukhoa'=> '',
        //     ]);
        // DB::table('the_loai')->insert(
        //     [
        //         'id' => 3,
        //         'ten' => 'Tin Tức',
        //         'tenkhongdau' => 'tin-tuc',
        //         'mota' => 'Tổng hợp tin tức về các sự kiện, hoạt động của nhà trường cũng như của đoàn thanh niên',
        //         'tukhoa'=> '',
        //     ]
        // );
        

        // # insert Data Bảng Thể Loại mặc định:
        // DB::table('loai_tin')->insert(
        //     [
        //         'idtheloai' => 1,
        //         'ten' => 'Công Văn Đoàn Trường',
        //         'tenkhongdau' => 'cong-van-doan-truong',
        //         'mota' => 'Tổng hợp công văn của đoàn trường update công khai trên Blog',
        //         'tukhoa'=> '',
        //     ]);
        // DB::table('loai_tin')->insert(
        //     [
        //         'idtheloai' => 1,
        //         'ten' => 'Công Văn Ban Giám Hiệu',
        //         'tenkhongdau' => 'cong-van-ban-giam-hieu',
        //         'mota' => 'Tổng hợp các công văn từ Ban giám hiệu trường được update công khai',
        //         'tukhoa'=> '',
        //     ]);
        // DB::table('loai_tin')->insert(
        //     [
        //         'idtheloai' => 2,
        //         'ten' => 'Câu Chuyện Học Đường',
        //         'tenkhongdau' => 'cau-chuyen-hoc-duong',
        //         'mota' => 'Tổng hợp những câu chuyện của các đồng chí đoàn viên thanh niên gửi về và được chọn lọc, kể về những câu chuyện vui, buồn trên mái trường, trong lớp học',
        //         'tukhoa'=> '',
        //     ]);
        // DB::table('loai_tin')->insert(
        //     [
        //         'idtheloai' => 3,
        //         'ten' => 'Giới Thiệu',
        //         'tenkhongdau' => 'gioi-thieu',
        //         'mota' => 'Tổng hợp những bài viết giới thiệu về các cá nhân, tổ chức và các vấn đề liên quan',
        //         'tukhoa'=> '',
        //     ]
        // );
    }
}
