<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','privacy')->get();
        return view('Pages.Privacy',["Seo" => $seo]);
    }
}
