<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','communication')->get();
        return view('Pages.CommunicationPage',["Seo" => $seo]);
    }
}
