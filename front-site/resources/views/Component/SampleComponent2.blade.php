<div class="row section-container">
    <div class="col-12 col-sm-6 col-md-6 order-md-2 order-sm-2 order-lg-1 col-lg-3">
        <div class="mt-5">
            <div class="border-top shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
                <h4 class="m-0">সাস্থ্য</h4>
                <ul class="nav nav-tabs" role="tablist" id="HealthPills">
                    <li class="nav-item">
                        <a class="nav-link HealthItem active" SubCategoryID="0" data-bs-toggle="tab" href="#">সকল</a>
                    </li>
                </ul>
                <a href="/get-news-by-category/7" class="btn btn-danger rounded-pill">সকল</a>
            </div>
        </div>

        <div class="row mt-3">

            <div class="col-12" >
                <div id="HealthLeadNews">
                    <!-- Health Lead News -->
                </div>

                <div class="card titleNews2 mt-2 border-left border-right" id="HealthSubNews">
                   <!-- Health Sub News -->
                </div>
            </div>
        </div>

    </div>
    <div class="col-12 col-sm-12 order-sm-1 col-md-12 col-lg-6 order-md-1 order-lg-2">
        <div class="mt-5">
            <div class="border-top shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
                <h4 class="m-0"> প্রবাস </h4>
                <ul class="nav nav-tabs" role="tablist" id="ForeignPills">
                    <li class="nav-item">
                        <a class="nav-link ForeignItem active" SubCategoryID="0" data-bs-toggle="tab" href="#">সকল</a>
                    </li>
                </ul>
                <a href="/get-news-by-category/10" class="btn btn-danger rounded-pill">সকল</a>
            </div>
        </div>

        <div class="row mt-3">
            <div  class="col-12 col-sm-6 col-md-7">
                <div id="foreignLeadNews" class="titleNews2 mt-2 border-left border-right">

                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-5" style="margin-top: -10px;">
                <div id="foreignRightNews" class="titleNews2 mt-2 border-left border-right">

                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 order-sm-3 col-md-6  col-lg-3 order-md-3 order-lg-3">
        <div class="mt-5">
            <div class="border-top shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
                <h4 class="m-0">জবস</h4>
                <ul class="nav nav-tabs" role="tablist" id="JobsPills">
                    <li class="nav-item">
                        <a class="nav-link JobsItem active" SubCategoryID="0" data-bs-toggle="tab" href="#">সকল</a>
                    </li>
                </ul>
                <a href="/get-news-by-category/13" class="btn btn-danger rounded-pill">সকল</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12" >
                <div id="JobsLeadNews">
                    <!-- Jobs Lead News -->
                </div>

                <div class="card titleNews2 mt-2 border-left border-right" id="JobsSubNews">
                    <!-- Jobs Sub News -->
                </div>
            </div>
        </div>
    </div>


    <script>
        /*---  Health Section --------*/
        PillsCategory('/category-by-id/7','#HealthPills','HealthItem')
        $('#HealthPills').on('click','.HealthItem',function (){
            BodyLoaderON();
            $('.HealthItem').removeClass('disabled')
            $(this).addClass('disabled')
            let id = $(this).attr('SubCategoryID');
            if(id === "0"){
                AllHealthNews();
            }else{
                GetComponentNews(`/get-all-news/${id}/lead_news/1/0/sub`,'#HealthLeadNews');
                GetComponentSubNews(`/get-all-news/${id}/side_bar_news/2/0/sub`,'#HealthSubNews')
            }
        })
        AllHealthNews();
        function AllHealthNews(){
            GetComponentNews('/get-all-news/7/lead_news/1/0','#HealthLeadNews');
            GetComponentSubNews('/get-all-news/7/side_bar_news/2/0','#HealthSubNews');
        }
        /*---------- END Health Section ------------*/


        /*---  Foreign Section --------*/
        PillsCategory('/category-by-id/10','#ForeignPills','ForeignItem')
        $('#ForeignPills').on('click','.ForeignItem',function (){
            BodyLoaderON();
            $('.ForeignItem').removeClass('disabled')
            $(this).addClass('disabled')
            let id = $(this).attr('SubCategoryID');
            if(id === "0"){
                AllForeignNews();
            }else{
                ForeignLeadNews(`/get-all-news/${id}/lead_news/5/0/sub`,'#foreignLeadNews')
                ForeignRightNews(`/get-all-news/${id}/side_bar_news/6/0/sub`,'#foreignRightNews')
            }
        })
        AllForeignNews();



        function AllForeignNews(){
            ForeignLeadNews('/get-all-news/10/lead_news/5/0','#foreignLeadNews')
            ForeignRightNews('/get-all-news/10/lead_news/5/0','#foreignRightNews')
        }





        function ForeignLeadNews(url,element){
            GetData(url, function (response){
                if(response.status === 200 ){
                    let data = response.data;
                    let order = 5;
                    $(element).empty();
                    for(let i = 0; i < data.length; i++){
                        for(let j = 0; j < order; j++){
                            if(data[i].order == j+1){
                                LeadNews(data[i].id,data[i].image,data[i].title,data[i].date)
                            }
                        }
                    }

                    function LeadNews(newsID,image,title,date){
                        $(element).append(`
                           <a href="/get-news/${newsID}" class="news link border-bottom mt-2 mb-2">
                                <img class="image" src="${image}">
                                <div>
                                    <h5 class="title line-2" style="margin-bottom: 3px!important;">${title}</h5>
                                    <div class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>${site.localeDate(date)}</div>
                                </div>
                            </a>
                        `)
                    }
                }
            });
        }

        function ForeignRightNews(url,element){
            GetData(url, function (response){
                if(response.status === 200 ){
                    BodyLoaderOFF();
                    let data = response.data;
                    let order = 6;
                    $(element).empty();
                    for(let i = 0; i < data.length; i++){
                        for(let j = 0; j < order; j++){
                            if(data[i].order == j+1){
                                LeadNews(data[i].id,data[i].title,data[i].date)
                            }
                        }
                    }

                    function LeadNews(newsID,title,date){
                        $(element).append(`
                           <a href="/get-news/${newsID}" class="news link border-bottom ">
                                <div>
                                    <h5 class="title line-2" style="margin-bottom: 3px!important;">${title}</h5>
                                    <div class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>${site.localeDate(date)}</div>
                                </div>
                            </a>
                        `)
                    }
                }
            });
        }


        /*---  End Foreign Section --------*/



        /*---  Jobs Section --------*/
        PillsCategory('/category-by-id/13','#JobsPills','JobsItem')
        $('#JobsPills').on('click','.JobsItem',function (){
            BodyLoaderON();
            $('.JobsItem').removeClass('disabled')
            $(this).addClass('disabled')
            let id = $(this).attr('SubCategoryID');
            if(id === "0"){
                AllJobsNews();
            }else{
                GetComponentNews(`/get-all-news/${id}/lead_news/1/0/sub`,'#JobsLeadNews');
                GetComponentSubNews(`/get-all-news/${id}/side_bar_news/2/0/sub`,'#JobsSubNews')
            }
        })
        AllJobsNews();
        function AllJobsNews(){
            GetComponentNews('/get-all-news/13/lead_news/1/0','#JobsLeadNews');
            GetComponentSubNews('/get-all-news/13/side_bar_news/2/0','#JobsSubNews');
        }
        /*---------- END Jobs Section ------------*/




    </script>
</div>



