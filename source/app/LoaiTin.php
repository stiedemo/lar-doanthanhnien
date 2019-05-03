<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
	protected $table = 'loai_tin';

	public function BaiDang()
	{
		return hasMany('App\BaiDang', 'idloaitin');
	}
	public function TheLoai()
	{
		return $this->belongsTo('App\TheLoai', 'idtheloai');
	}
}
