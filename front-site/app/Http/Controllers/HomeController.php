<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','home')->get();
        return view('Pages.HomePage',["Seo" => $seo]);
    }
}
