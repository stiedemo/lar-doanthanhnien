<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DCTinh extends Model
{
	protected $table = 'diachi_tinh';

	public function DiaChiHuyen()
	{
		return $this->hasMany('App\DCHuyen', 'idtinh');
	}
	public function HocSinh()
	{
		return $this->hasMany('App\HocSinh', 'iddiachitinh');
	}
}
