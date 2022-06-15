<?php

namespace App\Http\Controllers;
use App\Models\SeoModel;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','about')->get();
        return view('Pages.About',["Seo" => $seo]);
    }
}
