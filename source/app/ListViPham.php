<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListViPham extends Model
{
	protected $table = 'list_vi_pham';

	public function LoiViPham()
	{
		return $this->belongsTo('App\MaLoiViPham','idmaloi');
	}
	public function HocSinh()
	{
		return $this->belongsTo('App\HocSinh','idhocsinh');
	}
	public function Users()
	{
		return $this->belongsTo('App\User','idusers');
	}
}
