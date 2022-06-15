<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','advertise')->get();
        return view('Pages.Advertise',["Seo" => $seo]);
    }
}
