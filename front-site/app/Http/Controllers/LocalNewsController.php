<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class LocalNewsController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','local')->get();
        return view('Pages.LocalNewsPage',["Seo" => $seo]);
    }
}
