<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiDang extends Model
{
	protected $table = 'bai_dang';

	public function TheLoai()
	{
		return $this->belongsTo('App\LoaiTin','idloaitin');
	}
	public function LoaiTin()
	{
		return $this->belongsTo('App\LoaiTin','idloaitin');
	}
	public function NamHoc()
	{
		return $this->belongsTo('App\NamHoc','idnamhoc');
	}
	public function User()
	{
		return $this->belongsTo('App\User','idnguoidang');
	}
}
