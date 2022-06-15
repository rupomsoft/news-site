<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','terms')->get();
        return view('Pages.TermsUsePage',["Seo" => $seo]);
    }
}
