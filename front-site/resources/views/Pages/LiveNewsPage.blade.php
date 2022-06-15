@extends('Layout.app')
@section('title', "Home")


@section('content')
    <div class="section-container mt-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-9">

                <div id="news">

                </div>

                <div id="liveNews" class="mt-4">


                </div>

            </div>

            <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
                <div class="position-sticky sticky-lg-top sticky-xl-top">
                    <!--               Advertise   --->
                    <div  id="single_news_page_right_add" class="advertise mt-4 mb-3 text-center overflow-hidden">

                    </div>


                    <div class="Title pt-2 pb-2 border-bottom border-top border-dark">
                        <h3 class="m-0">এই সপ্তাহের পাঠক প্রিয়</h3>
                    </div>

                    <div class="card titleNews2 mt-2 border-left border-right">
                        <a href="#" class="news link border-bottom">
                            <img class="image" src="{{asset('img/titleNews.jpg')}}">
                            <div>
                                <h5 class="title m-0">রাশিয়া-ইউক্রেন যুদ্ধের সর্বশেষ</h5>
                                <div class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>২ ঘন্টা আগে</div>
                            </div>
                        </a>
                        <a href="#" class="news link border-bottom">
                            <img class="image" src="{{asset('img/titleNews.jpg')}}">
                            <div>
                                <h5 class="title m-0">রাশিয়া-ইউক্রেন যুদ্ধের সর্বশেষ</h5>
                                <div class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>২ ঘন্টা আগে</div>
                            </div>
                        </a>
                        <a href="#" class="news link border-bottom">
                            <img class="image" src="{{asset('img/titleNews.jpg')}}">
                            <div>
                                <h5 class="title m-0">রাশিয়া-ইউক্রেন যুদ্ধের সর্বশেষ</h5>
                                <div class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>২ ঘন্টা আগে</div>
                            </div>
                        </a>
                        <a href="#" class="news link border-bottom">
                            <img class="image" src="{{asset('img/titleNews.jpg')}}">
                            <div>
                                <h5 class="title m-0">রাশিয়া-ইউক্রেন যুদ্ধের সর্বশেষ</h5>
                                <div class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>২ ঘন্টা আগে</div>
                            </div>
                        </a>
                        <a href="#" class="news link border-bottom">
                            <img class="image" src="{{asset('img/titleNews.jpg')}}">
                            <div>
                                <h5 class="title m-0">রাশিয়া-ইউক্রেন যুদ্ধের সর্বশেষ</h5>
                                <div class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>২ ঘন্টা আগে</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        Advertise('/advertise/single_news_page_right_add',$('#single_news_page_right_add'))

        let getUrl = MakeUrlFromBrowserUrlSegment()




        $(document).ready(function (){
            let fontsize = 18;
            let printID = 1;
            $('body').on('click','.fontPlusBtn', function (e){
                e.preventDefault();
                fontsize += 2;
                $('.news-description *').css({
                    fontSize: fontsize+"px"
                })
            })

            $('body').on('click','.fontMinusBtn', function (e){
                e.preventDefault();
                fontsize -= 2;
                $('.news-description *').css({
                    fontSize: fontsize+"px"
                })
            })

            $('body').on('click','.newsPrintBtn', function (e){
                printID += 1;
                e.preventDefault();
                let nav = $(this).parent().parent();
                nav.css('display','none')
                let printableNews = $(this).parent().parent().parent().parent();
                let newsTitle = printableNews.find('.news-title');
                var newWin=window.open('','Print-Window'+printID);

                newWin.document.open();

                newWin.document.write(`
                    <html>
                        <head>
                            <title>${newsTitle.html()}</title>
                        </head>

                        <body onload="window.print()">
                            <img height="100px" src="http://bnbd.rakibmia.com/img/logo-color.png">
                            ${printableNews.html()}
                        </body>
                    </html>
                `);

                newWin.document.close();
                nav.css('display','flex')

            })
        })




        GetData(getUrl+"/"+100+"/"+0, function (response){
            if(response.status === 200){
                let news = response.data.news;
                let liveNews = response.data.live_news;

                News(news);

                liveNews.forEach(function (item){
                  LiveNews(item)
                })

            }
        })
        BodyLoaderOFF();


        function LiveNews(news){
            $('#liveNews').append(`
                    <div class="time-line-item position-relative">
                        <div class="time-line-content">
                            <div class="time-line-dot position-absolute"></div>
                            <div class="time-line-content-date">
                               ${site.localeFullDate(news.date)}
                            </div>
                            <div class="time-line-content-body pt-1 pb-1 titleNews2 border-0">
                                <a href="#" class="news link" style="padding-left: 0;">
                                    <h4 class="title m-0">${news.title}</h4>
                                </a>
                                <p>${news.details}</p>
                            </div>
                        </div>
                    </div>
            `)
        }

        function News(news){
            $('#news').append(`
                    <div class="news-item">

                        <h1 class="news-title">${news.title}</h1>
                        <hr style="height: 10px;width: 100px;background: #cecbcb;">
                        <h4 class="news-representative">আন্তর্জাতিক ডেস্ক</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="news-date">${site.localeFullDate(news.date)}</div>
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link icon-link" href="https://www.facebook.com/sharer/sharer.php?u=${site.front_site_url+'/'+getUrl}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link icon-link" href="http://twitter.com/share?text=text goes here&url=${site.front_site_url+'/'+getUrl}" target="_blank"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link icon-link" href="whatsapp://send?text=${site.front_site_url+'/'+getUrl}"><i class="fab fa-whatsapp"></i></a>
                                </li>
                                <li class="nav-item d-none d-sm-block">
                                    <a class="nav-link icon-link newsLinkCopy" href="whatsapp://send?${site.front_site_url+'/'+getUrl}"><i class="fas fa-copy"></i></a>
                                </li>


                                <li class="nav-item d-none d-sm-block">
                                    <a class="nav-link icon-link newsPrintBtn" href="#"><i class="fas fa-print"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link icon-link fontPlusBtn" href="#"><i>ফ+</i> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link icon-link fontMinusBtn" href="#"><i>ফ-</i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="images news-image  mt-3 mb-2">
                            <img src="${news.image}" class="w-100">
                        </div>
                        <div class="f-18 news-description">${news.sort_description}</div>
                    </div>
                `)
        }
    </script>
@endsection
