<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocSinh extends Model
{
	protected $table = 'hoc_sinh';

	public function chiDoan()
	{
		return $this->belongsTo('App\ChiDoan','idchidoan');
	}
}
