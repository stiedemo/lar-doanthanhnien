<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamHoc extends Model
{
	protected $table = 'nam_hoc';

	public function BaiDang()
	{
		return hasMany('App\BaiDang', 'idnamhoc');
	}
}
