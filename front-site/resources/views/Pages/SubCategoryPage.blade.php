@extends('Layout.app')
@section('title', "Home")


@section('content')
    <div class="section-container mt-2">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-9">
                <div class="Title pt-2 pb-2 border-bottom border-dark">
                    <h1 class="m-0" id="DisplayCategoryName">সাস্থ্য</h1>
                </div>

                <div id="categoryContent" class="categoryContent mt-3">
                    <div class="row" id="DisplayTopNews">
                        <!-- Top First 3 News -->

                    </div>


                    <div id="categoryCardContent">
                        <div class="row" id="CategoryMoreNews">
                            <!-- Category More News -->
                        </div>

                        <div class="loadMore text-center mt-4">
                            <button id="LoadMoreBtn" class="btn btn-outline-danger">আরও দেখুন</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3 col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
                <div class="position-sticky sticky-lg-top sticky-xl-top">
                    <!--               Advertise   --->
                    <div class="advertise mt-4 mb-3 text-center overflow-hidden">
                        <img  src="{{asset('img/300x300.gif')}}">
                    </div>


                    <div class="Title pt-2 pb-2 border-bottom border-top border-dark">
                        <h3 class="m-0">এই সপ্তাহের পাঠক প্রিয়</h3>
                    </div>

                    <div id="FavoriteNewsInWeek" class="card titleNews2 mt-2 border-left border-right">
                        <!-- FavoriteNewsInWeek -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let url = MakeUrlFromBrowserUrlSegment();
        let newsLimit = 20;
        let skip = 0;
        GetData(url+"/"+newsLimit+"/"+skip, function (response){
            if(response.status === 200){
                let category = response.data['sub-category'];
                let news = response.data.news;
                $('#DisplayCategoryName').html(category.name);
                if(news.length > 0){
                    DisplayTopNews(news)
                    CategoryMoreNews(news);
                }else{
                    $('#categoryContent').empty();
                    $('#categoryContent').append(`
                        <div class="alert alert-danger" role="alert">
                          <strong>দুঃখিত! </strong> কোন তত্থ্য পাওয়া যায়নি
                        </div>
                    `);
                }
                BodyLoaderOFF();
            }else{
                console.log(response)
            }
        })


        // Top Reading News In this week
        GetData('/readers-choice/5/0', function (response){
            let data = response.data;
            if(response.data.length > 0){
                data.forEach(function (item){
                    $('#FavoriteNewsInWeek').append(`
                     <a href="/get-news/${item.id}" class="news link border-bottom">
                            <img style="height: 65px;" class="image" src="${item.image}">
                            <div>
                                <h5 class="title line-2" style="margin: 0!important;">${item.title}</h5>
                                <div class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>${site.localeDate(item.date)}</div>
                            </div>
                        </a>
                `)
                })
            }
        })


        $('#LoadMoreBtn').on('click',function (){
            skip = skip+20;
            GetData(url+"/"+newsLimit+"/"+skip, function (response){
                if(response.status === 200){
                    let category = response.data.category;
                    let news = response.data.news;
                    if(news.length > 0){
                        console.log(news.length)
                        // DisplayTopNews(news)
                    }else {
                        skip = skip-20;
                        $('.loadMore').empty();
                        $('.loadMore').append(ErrorNotFoundData())
                    }
                    BodyLoaderOFF();
                }else{
                    console.log(response)
                }
            })

        })

        function DisplayTopNews(news){
            let DisplayTopNews = $('#DisplayTopNews');
            for(let i = 0; i < news.length; i++){
                if(i == 0){
                    DisplayTopNews.append(`
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                            <a style="padding-left: 0;padding-right: 0;padding-top: 0;"  href="/get-news/${news[i].id}"  class="link  d-block card-body">
                                <img class="w-100" src="${news[0].image}" style="object-fit: cover">
                                <h2 class="mt-2">${news[0].title}</h2>
                                <p class="line-3">${news[0].sort_description}</p>
                            </a>
                        </div>
                    `)
                }
                else if (i == 1){
                    DisplayTopNews.append(`
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                            <div class="row" id="CategorySideNews">

                            </div>
                        </div>
                    `)

                    $('#CategorySideNews').append(`
                        <div class="col-12 col-sm-6 col-md-6 col-lg-12">
                           <a  href="/get-news/${news[i].id}" class="card border-0 shadow-sm d-block  pt-0 pb-0 link">
                                <img src="${news[1].image}" style="height: 210px;width: 100%;object-fit: cover;" >
                                <div class="card-body p-2">
                                    <h5 class="m-0 line-2">${news[1].title}</h5>
                                </div>
                            </a>
                        </div>
                    `)
                }

                else if( i == 2){
                    $('#CategorySideNews').append(`
                         <div class="col-12 col-sm-6 mt-2 col-md-6 col-lg-12">
                            <a style="height: 280px;  href="/get-news/${news[i].id}" class="card border-0 shadow-sm d-block  pt-0 pb-0 link">
                                <img src="${news[2].image}" style="height: 210px;width: 100%;object-fit: cover;" >
                                <div class="card-body p-2">
                                    <h5 class="m-0 line-2">${news[2].title}</h5>
                                </div>
                            </a>
                        </div>
                    `)
                }
            }
        }


        function CategoryMoreNews(news){
            for(let i = 3; i < news.length; i++){
                $('#CategoryMoreNews').append(`
                    <div class="col-12  mt-3 col-sm-6 col-md-6 col-lg-4">
                        <a style="height: 290px;" href="/get-news/${news[i].id}" class="card shadow-sm border-0 border-bottom  pt-0 pb-0 link">
                            <img src="${news[i].image}" style="height: 210px;object-fit: cover;" >
                            <div class="card-body pb-2">
                                <h5 class="m-0 line-2">${news[i].title}</h5>
                            </div>
                        </a>
                    </div>
                `)
            }
        }
    </script>

@endsection
