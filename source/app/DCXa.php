<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DCXa extends Model
{
	protected $table = 'diachi_xa';
	public function HocSinh()
	{
		return $this->hasMany('App\HocSinh', 'iddiachixa');
	}
}
