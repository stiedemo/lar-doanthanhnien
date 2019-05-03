<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
	protected $table = 'the_loai';

	public function LoaiTin()
	{
		return $this->hasMany('App\LoaiTin', 'idtheloai');
	}

    public function BaiDang()
    {
        return $this->hasManyThrough(
            'App\BaiDang', 'App\LoaiTin',
            'idtheloai', 'idloaitin', 'id'
        );
    }
}
