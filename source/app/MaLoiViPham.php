<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaLoiViPham extends Model
{
	protected $table = 'ma_loi_vi_pham';


	public function HSViPham()
	{
		return $this->hasMany('App\ListViPham', 'idmaloi');
	}
}
