<div class="mt-5">
    <div class="section-container">
        <div class="border-top shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
            <h4 class="m-0">বিনোদন</h4>
            <ul class="nav nav-tabs" role="tablist" id="EntertainPills">
                <li class="nav-item">
                    <a class="nav-link EntertainItem active" SubCategoryID="0" data-bs-toggle="tab" href="#allPloytics">সকল</a>
                </li>
            </ul>
            <a  href="/get-news-by-category/6" class="btn btn-danger rounded-pill">সকল</a>
        </div>
    </div>
</div>


<div class="row section-container mt-2 ">
    <div class="col-12 col-sm-6 order-sm-2 col-md-6 col-lg-6 col-xl-3 order-md-2 order-lg-2 order-xl-1 mt-2">
        <div class="card" id="enterLeftSubLead">
            <!--First Lead of Main Lead-->
        </div>

        <div class="titleNews2 mt-2 border-left border-right" id="enterSecondLead">
            <!--ENTER SECOND LEAD OR LEFT SUB LEAD NEWS -->
        </div>
    </div>


    <div class="col-12 col-sm-12 order-sm-1 col-md-12 col-lg-12 col-xl-6 order-md-1 order-lg-1 order-xl-2">
        <div class="mt-2" style="padding-right: 0" id="enterFirstLead">
            <!--First Lead of Main Lead-->
        </div>

        <div class="row" id="enterAnotherLead">
            <!--First Lead of Main Lead-->
        </div>
    </div>



    <div class="col-12 col-sm-6 order-sm-3 col-md-6 col-lg-6 order-md-3 col-xl-3 order-lg-3 order-xl-3 mt-2">
        <div class="card"  id="enterRightSubLead">
            <!--Right Sub Lead News-->
        </div>

        <div class="titleNews2 mt-2 border-left border-right" id="enterRightSubNews">
           <!--RIGHT SUB NEWS -->
        </div>
    </div>
</div>

<script>
    HomeEntertain();
    function HomeEntertain(){
        PillsCategory('/category-by-id/6','#EntertainPills','EntertainItem')

        $('#EntertainPills').on('click','.EntertainItem',function (){
            BodyLoaderON();
            $('.EntertainItem').removeClass('disabled')
            $(this).addClass('disabled')
            let id = $(this).attr('SubCategoryID');
            if(id === "0"){
                EntertainAllNews();
            }else{
                getEnterSubNews(`/get-all-news/${id}/sub_lead_news/2/0/sub`);
                GetEnterLeadNews(`/get-all-news/${id}/lead_news/5/0/sub`);
                GetEnterSecondLead(`/get-all-news/${id}/second_lead/4/0/sub`);
                GetEnterSidebarNews(`/get-all-news/${id}/side_bar_news/4/0/sub`);
            }
        })




        EntertainAllNews();

        function EntertainAllNews() {
            getEnterSubNews('/get-all-news/6/sub_lead_news/2/0');
            GetEnterLeadNews('/get-all-news/6/lead_news/5/0');
            GetEnterSecondLead('/get-all-news/6/second_lead/4/0');
            GetEnterSidebarNews('/get-all-news/6/side_bar_news/4/0');
        }


        function getEnterSubNews(url){
            GetData(url, function (response){
                if(response.status === 200){
                    let data = response.data;
                    $('#enterLeftSubLead').empty();
                    $('#enterRightSubLead').empty();
                    for(let i = 0; i < data.length; i++){
                        if(data[i].order == "1"){
                            $('#enterLeftSubLead').append(`
                                <a href="/get-news/${data[i].id}" class="link">
                                    <img src="${data[i].image}" class="card-img">
                                    <div class="card-body">
                                        <h5 class="m-0">${data[i].title}</h5>
                                    </div>
                                </a>
                               `)
                        }else if(data[i].order == "2"){
                            $('#enterRightSubLead').append(`
                                <a href="/get-news/${data[i].id}" class="link">
                                    <img src="${data[i].image}" class="card-img">
                                    <div class="card-body">
                                        <h5 class="m-0">${data[i].title}</h5>
                                    </div>
                                </a>
                           `)
                        }
                    }
                }
            });

        }


        function GetEnterLeadNews(url){
            GetData(url,function (response){
                if(response.status === 200){
                    let data = response.data;
                    let order = 6;
                    $('#enterFirstLead').empty();
                    $('#enterAnotherLead').empty();
                    for(let i = 0; i < data.length; i++){
                        if(data[i].order == "1"){
                            $('#enterFirstLead').append(`
                                <a href="/get-news/${data[i].id}" class="link overflow-hidden hover-zoom p-0 card newsCardOverlay position-relative">
                                    <img class="card-img" style="height: 260px;" " style="object-fit: cover" src="${data[i].image}" >
                                    <div  class="cardOverlay w-100 position-absolute p-2" style="bottom: 0;">
                                        <h4 class="card-title text-white m-0">${data[i].title}</h4>
                                    </div>
                                </a>
                            `)
                        }else{
                            for(let j = 2; j < order; j++){
                                if(data[i].order == j){
                                    EnterAnotherLead(data[i].id,data[i].title, data[i].image);
                                }
                            }
                        }
                    }
                }
            })
        }


        function GetEnterSecondLead(url){
            GetData(url,function(response){
                if(response.status === 200 ){
                    let data = response.data;
                    let order = 4;
                    $('#enterSecondLead').empty();
                    for(let i = 0; i < data.length; i++){
                        for(let j = 1; j < order; j++){
                            if(data[i].order == j){
                                EnterSecondLead(data[i].id,data[i].title, data[i].image,data[i].time);
                            }
                        }
                    }
                }
            })
        }


        function GetEnterSidebarNews(url){
            GetData(url,function(response){
                if(response.status === 200){
                    let data = response.data;
                    let order = 4;
                    $('#enterRightSubNews').empty();
                    for(let i = 0; i < data.length; i++){
                        for(let j = 1; j < order; j++){
                            if(data[i].order == j){
                                EnterSideSubLeadNews(data[i].id,data[i].title, data[i].image,data[i].time);
                            }
                        }
                    }
                    BodyLoaderOFF();
                }
            })
        }





        function EnterAnotherLead(newsID,title,image){
            $('#enterAnotherLead').append(`
            <div class="col-6">
                <div class="mt-2" style="padding-right: 0">
                    <a href="/get-news/${newsID}" class="link overflow-hidden hover-zoom p-0 card newsCardOverlay position-relative">
                        <img class="card-img" style="object-fit: cover;height: 132px;" src="${image}" >
                        <div  class="cardOverlay w-100 position-absolute p-2" style="bottom: 0;">
                            <h5 class="card-title text-white line-1 m-0">${title}</h5>
                        </div>
                    </a>
                </div>
            </div>
        `)
        }

        function EnterSecondLead(newsID,title, image, time){
            $('#enterSecondLead').append(`
            <a href="/get-news/${newsID}" class="news link border-bottom mt-2 mb-2">
                <img class="image" style="height: 70px;" src="${image}">
                <div>
                    <h5 class="title line-2" style="margin-bottom: 5px!important;">${title}</h5>
                    <div class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>${site.localeDate(time)}</div>
                </div>
            </a>
        `)
        }

        function EnterSideSubLeadNews(newsID,title, image, time){
            $('#enterRightSubNews').append(`
                <a href="/get-news/${newsID}" class="news link border-bottom mt-2 mb-2">
                    <img class="image" style="height: 70px;" src="${image}">
                    <div>
                        <h5 class="title line-2" style="margin-bottom: 3px!important;">${title}</h5>
                        <div class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>${site.localeDate(time)}</div>
                    </div>
                </a>
            `)
        }
    }
</script>
