@extends('Layout.app')
@section('title', "Local News")

@section('content')
    <div id="LocalNews" class="mt-3 section-container">
        <div class="row">
            <div class="col-12 col-md-9">
                <h5 id="DivisionName">বরিশাল</h5>
                <h2 id="DistrictName"></h2>
                <hr style="background: #D8D8D8">
                <ul class="keyword-link2" id="UpozelaList">
                   <!-- Upozila List -->
                </ul>
                <hr style="background: black;height: 2px;">

                <div id="LocalNewsContent">

                </div>
            </div>
            <div class="col-12 col-md-3">
                <!--               Advertise   --->
                <div id="loacal_news_right_add" class="advertise mt-0 mb-1 text-center overflow-hidden">

                </div>

                <div id="areaFilter" class="areaChose col-12 col-md-6 col-lg-12  mt-3">
                    <h3 class="text-center mt-3 border-bottom border-top bg-light p-2">আমাদের খবর</h3>
                    <form action="/LocalNews" method="get" class="form mt-3">
                        <select name="division" class="form-select shadow-none mt-3" id="division" aria-label="Default select example">
                            <option  selected value="">বিভাগ</option>
                        </select>
                        <select name="district" class="form-select shadow-none mt-3" id="district" aria-label="Default select example">
                            <option  selected value="">জেলা </option>
                        </select>
                        <select name="upozela" id="upazila" class="form-select shadow-none mt-3" aria-label="Default select example">
                            <option  selected value="">উপজেলা </option>
                        </select>
                        <button class="btn btn-danger shadow-none text-center mt-3 w-100">খুজুন</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        Advertise('/advertise/loacal_news_right_add', $('#loacal_news_right_add'))

        let urlData = MakeObjectFromBrowserUrlParams();
        let makeUrl = "/" + urlData.division;
        if(urlData.district != ""){makeUrl += "/" + urlData.district}
        if(urlData.upozela != ""){makeUrl += "/" + urlData.upozela}
        console.log(makeUrl)
        GetData('/get-filter-news'+makeUrl, function (response){
            if(response.status === 200){
                let data = response.data;
                if(data.length > 0){
                    data.forEach(function (item){
                        LocalNewsItem(item.id,item.title,item.image,item.date,item.sort_description)
                    })
                }else{
                    $('#LocalNewsContent').append(`
                         <div class="alert alert-danger text-center">
                            <strong>দুঃখিত!</strong> কোন তথ্য খুখে পাওয়া যায়নি ।
                          </div>
                    `)
                }
                BodyLoaderOFF();
            }
        })



        //Division Name
        GetData('/get-all-divisions', function (response){
           if(response.status === 200){
               let data = response.data;
               data.forEach( function (item){
                   if(item.id == urlData.division){
                       $('#DivisionName').html(item.bn_name);
                   }else{
                       //console.log(urlData.division);
                   }
               })
           }
        });


        //District Name
        GetData('/get-all-district-by-division/'+urlData.division, function (response){
            if(response.status === 200){
                let data = response.data;
                data.forEach( function (item){
                    if(item.id == urlData.district){
                        $('#DistrictName').html(item.bn_name);
                    }
                })
            }
        });

        //Upazila List
        GetData('/get-all-upozilla-by-district/'+urlData.district, function (response){
            if(response.status === 200){
                let data = response.data;
                data.forEach( function (item){
                    Upozila(item.id,item.bn_name)
                })



                function Upozila(id,name){
                    let url = "/LocalNews?division="+urlData.division+"&district="+urlData.district+"&upozela="+id;

                    $('#UpozelaList').append(`
                         <li class="keyword-link2-item">
                            <a href="${url}">${name}</a>
                        </li>
                    `)
                }
            }
        });


        function LocalNewsItem(newsID,title,image,date,shorDesc){
            $('#LocalNewsContent').append(`
                 <a href="/get-news/${newsID}" class="TrendingContent row mt-2 link mb-2  pt-2 pb-2">
                    <div class="ContentText col-7 col-md-8 col-xl-9">
                        <h2>${title}</h2>
                        <p>${site.localeFullDate(date)}</p>
                        <p class="line-2 d-none d-md-block">${shorDesc}</p>
                    </div>
                    <div class="ContentImage col-5 col-md-4 col-xl-3">
                        <img  class="img-fluid" src="${image}">
                    </div>
                </a>
            `)
        }


        //Get Division, District, And Upajela and set to form

        //Area Filter
        GetData('/get-all-divisions', function (response){
            if(response.status === 200){
                let data = response.data;
                data.forEach(function (item){
                    $('#division').append(`
                <option value="${item.id}">${item.bn_name}</option>
               `)
                })
            }
        });

        //Division Wise District
        $('#areaFilter').on('change','#division', function(){
            let divisionID = $(this).val();
            $('#district').empty();
            $('#upazila').empty();
            $('#upazila').append(`<option value="">উপজেলা</option>`)
            $('#district').append(`<option value="">জেলা</option>`)
            GetData('/get-all-district-by-division/'+divisionID, function (response){
                if(response.status === 200){
                    let data = response.data;
                    data.forEach(function (item){
                        $('#district').append(`
                        <option value="${item.id}">${item.bn_name}</option>
                    `)
                    })
                }
            });
        });



        //District Wise Upazila
        $('#areaFilter').on('change','#district', function(){
            let districtID = $(this).val();
            $('#upazila').empty();
            $('#upazila').append(`<option value="">উপজেলা</option>`)
            GetData('/get-all-upozilla-by-district/'+districtID, function (response){
                if(response.status === 200){
                    let data = response.data;
                    data.forEach(function (item){
                        $('#upazila').append(`
                        <option value="${item.id}">${item.bn_name}</option>
                    `)
                    })
                }
            });
        });

    </script>

@endsection
