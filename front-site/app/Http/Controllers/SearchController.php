<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','search')->get();
        return view('Pages.SearchPage',["Seo" => $seo]);
    }
}
