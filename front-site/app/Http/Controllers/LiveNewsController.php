<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class LiveNewsController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','archive')->get();
        return view('Pages.LiveNewsPage',["Seo" => $seo]);
    }
}
