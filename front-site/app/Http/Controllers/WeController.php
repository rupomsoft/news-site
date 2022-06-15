<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class WeController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','we')->get();
        return view('Pages.WePage',["Seo" => $seo]);
    }
}
