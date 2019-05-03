<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\TheLoai;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        $idCongVan = TheLoai::select('id')->where('tenkhongdau', '=', 'cong-van')->get()->toArray();
        if(count($idCongVan) > 0){
            $congVan = TheLoai::find($idCongVan[0]['id']);
        }else{
            $congVan = null;
        }
        View::Share([
            'getListTheLoai' => TheLoai::all(),
            'listCongVan' => $congVan,
        ]);
    }
}
