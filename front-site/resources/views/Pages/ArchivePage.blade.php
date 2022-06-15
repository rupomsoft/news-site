@extends('Layout.app')
@section('title', "Home")


@section('content')
    <div class="section-container mt-2">
        <div class="Title pt-2 pb-2 border-bottom border-dark">
            <h1 class="m-0">আর্কাইভ </h1>
        </div>

        <form action="/Archive" method="get" id="areaFilter" class="archiveFilter mt-3 mb-3">
            <div class="row">
                <div class="mb-3 col-6 col-sm-6 col-md-4 col-lg-3">
                    <input name="startDate" type="text" onfocusout="(this.type='text')" onfocus="(this.type = 'date')" class="form-control"  placeholder="তারিখ থেকে">
                </div>
                <div class="mb-3 col-6 col-sm-6 col-md-4 col-lg-3">
                    <input name="endDate" onfocusout="(this.type='text')" onfocus="(this.type = 'date')" type="text" class="form-control"  placeholder="তারিখ পর্যন্ত">
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <select name="category_id" id="categoryElem" class="form-select shadow-none" aria-label="Default select example">
                        <option value="">ক্যটাগরি</option>
                    </select>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <input name="title" id="fiterText" type="text" class="form-control" placeholder="অনুসন্ধান করুন">
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <select name="dvision" id="division" class="form-select shadow-none" aria-label="Default select example">
                        <option selected value="">বিভাগ</option>
                    </select>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <select name="district" id="district" class="form-select shadow-none" aria-label="Default select example">
                        <option selected value="">জেলা</option>
                    </select>
                </div>
                <div class="col-6 mb-3 col-sm-6 col-md-4 col-lg-3">
                    <select name="upozilla" id="upazila" class="form-select shadow-none" aria-label="Default select example">
                        <option selected value="">উপজেলা</option>
                    </select>
                </div>
                <input type="hidden" name="limit" value="20">
                <div class="col-6 mb-3 col-sm-6 col-md-4 col-lg-3">
                    <input id="archiveFilter" type="submit" class="btn btn-secondary w-100" value="খুজুন">
                </div>
            </div>



        </form>

        <div id="archiveCardContent">
            <div class="row" id="archiveItem">
                <!-- Archive Data -->
            </div>

            <div class="loadMore text-center mt-4">
                <button id="archiveLoadMore" class="btn btn-outline-danger">আরও দেখুন</button>
            </div>
        </div>
    </div>




    <script>
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


        GetData('/category',function (response){
            if(response.status === 200){
                let data = response.data[0];
                let catElem = $('#categoryElem');
                data.forEach(function (catItem){
                    if(catItem.visible == 1){
                        catElem.append(`
                            <option value="${catItem.id}" >${catItem.name}</option>
                        `)
                    }
                })
            }
        })


        /* ---------------  Filter ------------*/

        if(window.location.search.length > 3) {
            let getFilterObj = MakeObjectFromBrowserUrlParams();
            PostData('/archive/filter', getFilterObj, function (response) {
                if (response.status === 200) {
                    let data = response.data;
                    let archiveItem = $('#archiveItem');
                    if (data.length > 0) {
                        data.forEach(function (item) {
                            archiveItem.append(`
                                <div class="col-12  col-sm-6 col-md-4 col-lg-3">
                                    <a href="/get-news/${item.id}" class="card border-0 pt-0 pb-0 link">
                                        <img src="${item.image}" class="card-img">
                                        <div class="card-body border-bottom pb-0  plr-0">
                                            <h5 class="pb-1">${item.title}</h5>
                                            <p class="m-0">${site.localeDate(item.date)}<p>
                                        </div>
                                    </a>
                                </div>
                            `);
                        });
                    }else{
                        archiveItem.append(`
                            <div class="alert alert-danger text-center" role="alert">
                               দুঃখিত! কোন ডাটা পাওয়া যায়নি ।
                            </div>
                        `);

                        $('#archiveLoadMore').remove();
                    }

                    BodyLoaderOFF();
                }
            })
        }
        /*--------------- Filter End ----------*/
        else{
            let firstTimeNews = 100;
            let loadCount = 1;
            GetData('/archive/index/'+firstTimeNews,function(response){
                if(response.status === 200){
                    let data = response.data;
                    let archiveItem = $('#archiveItem');
                    //console.log(data)
                    data.forEach(function(item){
                        archiveItem.append(`
                        <div class="col-12  col-sm-6 col-md-4 col-lg-3">
                            <a href="/get-news/${item.id}" class="card border-0 pt-0 pb-0 link">
                                <img src="${item.image}" class="card-img">
                                <div class="card-body border-bottom pb-0  plr-0">
                                    <h5 class="pb-1">${item.title}</h5>
                                    <p class="m-0">${site.localeFullDate(item.time)}<p>
                                </div>
                            </a>
                        </div>
                    `);
                    })

                    BodyLoaderOFF();
                }
            });
        }
    </script>
@endsection
