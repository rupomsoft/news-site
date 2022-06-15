<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class SingleNewsController extends Controller
{
    function Page(Request $request){
        $seo = SeoModel::where('news_id',$request->NewsID)->get();
        if(count($seo) < 1){
            $seo = [
                [
                    'title' => "breakingnews24.com",
                    'share_title' => "breakingnews24.com",
                    'description' => "breakingnews24.com",
                    'keywords' => "breakingnews24.com",
                    'page_img' => "https://nikash-online.com/public/images/1652705530Profile.png",
                ]
            ];

        }

        return view('Pages.SingleNewsPage',["Seo" => $seo]);
    }
}
