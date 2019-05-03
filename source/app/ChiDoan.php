<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiDoan extends Model
{
	protected $table = 'chi_doan';

	public function HocSinh()
	{
		return $this->hasMany('App\HocSinh', 'idchidoan');
	}
}
