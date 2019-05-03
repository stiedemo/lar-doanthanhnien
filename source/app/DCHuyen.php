<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DCHuyen extends Model
{
	protected $table = 'diachi_huyen';

	public function DiaChiXa()
	{
		return $this->hasMany('App\DCXa', 'idhuyen');
	}
	public function HocSinh()
	{
		return $this->hasMany('App\HocSinh', 'iddiachihuyen');
	}
}
