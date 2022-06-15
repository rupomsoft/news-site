<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    //
    function Page(){
        $seo = SeoModel::where('page_name','trending')->get();
        return view('Pages.TrendingPage',["Seo" => $seo]);
    }
}
