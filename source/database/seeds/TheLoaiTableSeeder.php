<?php

use Illuminate\Database\Seeder;

class TheLoaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        # insert Data Bảng Thể Loại mặc định:
        DB::table('the_loai')->insert(
            [
                'id' => 1,
                'ten' => 'Công Văn',
                'tenkhongdau' => 'cong-van',
                'mota' => 'Tổng hợp công văn, chỉ đạo được upload chính thức và công khai',
                'tukhoa'=> '',
            ]);
        DB::table('the_loai')->insert(
            [
                'id' => 2,
                'ten' => 'Chia Sẻ',
                'tenkhongdau' => 'chia-se',
                'mota' => 'Tổng hợp các bài viết chia sẻ của các thành viên gửi tới mọi người hoặc những người yêu thương',
                'tukhoa'=> '',
            ]);
        DB::table('the_loai')->insert(
            [
                'id' => 3,
                'ten' => 'Tin Tức',
                'tenkhongdau' => 'tin-tuc',
                'mota' => 'Tổng hợp tin tức về các sự kiện, hoạt động của nhà trường cũng như của đoàn thanh niên',
                'tukhoa'=> '',
            ]
        );

    }
}
