@extends('Layout.app')
@section('title', "Local News")

@section('content')
    <div id="LocalNews" class="mt-4 section-container">
        <div class="row">
            <div class="col-12">
                <h1 id="TrendingName">ট্রেন্ডিং নিউজ</h1>
{{--                <hr style="background: #D8D8D8">--}}
                <hr style="background: black;height: 2px;">

                <div id="TrendingItems">

                </div>
            </div>
        </div>
    </div>

    <script>
        let url = MakeUrlFromBrowserUrlSegment();

        GetData(url+"/"+20, function (response){
            if(response.status === 200){
                let data = response.data;
                // d-flex justify-content-between style="height: 150px;width: 250px;object-fit: cover;"
                data.forEach(function (item){
                    $('#TrendingItems').append(`
                        <a href="/get-news/${item.id}" class="TrendingContent row mt-2 link mb-2  pt-2 pb-2">
                            <div class="ContentText col-7 col-md-8 col-xl-9">
                                <h2>${item.title}</h2>
                                <p>${site.localeFullDate(item.date)}</p>
                                <p class="line-2 d-none d-md-block">${item.sort_description}</p>
                            </div>
                            <div class="ContentImage col-5 col-md-4 col-xl-3" style="/*margin-left: 15px;*/">
                                <img  class="img-fluid" src="${item.image}">
                            </div>
                        </a>
                    `)
                })
                BodyLoaderOFF();
            }
        })

    </script>

@endsection
