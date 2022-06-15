<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','category')->get();
        return view('Pages.CategoryPage',["Seo" => $seo]);
    }
}
