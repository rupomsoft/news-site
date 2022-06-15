@extends('Layout.app')
@section('title', "Privacy Policy")


@section('content')
    <div id="cms"  class="section-container mt-2">
        <h1>অনুসন্ধানের ফলাফল</h1>
        <div class="d-flex mt-2 align-items-center">
            <input type="text" id="searchTextInput2" class="form-control">
            <button id="searchingTextBtn2" class="fas fa-search  btn btn-danger" style="padding: 11px"></button>
        </div>
        <div class="mt-3" id="searchNewsArea">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#home">Web</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Image</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content mt-3 ">
                <div class="tab-pane container  p-0 m-0 active row" id="home">
                    <div class="col-12  " id="searchNewsItems">

                    </div>
                    <div id="pages" class="col-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
{{--                                <li class="page-item disabled">--}}
{{--                                    <a class="page-link">Previous</a>--}}
{{--                                </li>--}}
                                <div id="pagesLink" class="d-flex">

                                </div>
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="#">Next</a>--}}
{{--                                </li>--}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="tab-pane container  p-0 m-0 fade" id="menu1">Sed ut perspiciatis unde om
                    nis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                    aperiam.
                </div>
           </div>

        </div>

    </div>

    <script>

        $('#searchingTextBtn2').on('click',function (){
            let data = $('#searchTextInput2').val();
            if(data !== ""){
                window.location.href = site.front_site_url + "/search/"+data;
            }
        })



        let url = MakeUrlFromBrowserUrlSegment();
        GetData(url, function (res){
           if(res.status === 200){
               let allres = res.data;
               let news = allres.data;
               let pages = allres.links;
               let firstPage = allres.first_page_url;
               let lastPage = allres.last_page_url;
               let nextPage = allres.next_page_url;
               let prevPage = allres.prev_page_url;

               if(news.length > 0 ){
                   news.forEach(function (item){
                       $('#searchNewsItems').append(`



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

                   pages.forEach(function (item){
                       if(item.url !== null){
                           var url = item.url.split('/')
                           var makeUrl = "/"+url[5]+"/"+url[6];
                           $('#pagesLink').append(`
                            <li class="page-item ${allres.current_page == item.label ? "active": ""}"  aria-current="page">
                                <a class="page-link" href="${makeUrl}">${item.label}</a>
                            </li>
                        `)
                       }
                   })
               }else{
                   $('#searchNewsArea').empty();
                   $('#searchNewsArea').append(ErrorNotFoundData())
               }
               BodyLoaderOFF();
           }
        })
    </script>
@endsection
