<div class="mt-5">
    <div class="section-container">
        <div class="border-top shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
            <h4 class="m-0">আন্তর্জাতিক</h4>
            <ul class="nav nav-tabs" role="tablist" id="InternationalPills">
                <li class="nav-item">
                    <a class="nav-link InternationalItem active" SubCategoryID="0" data-bs-toggle="tab" href="#">সকল</a>
                </li>
            </ul>
            <a href="/get-news-by-category/5" class="btn btn-danger rounded-pill">সকল</a>
        </div>
    </div>
</div>

<div id="international" class="section-container">
    <div class="row mt-2" id="internationalLeadNews">
        <!--
            InterNational News
        -->
    </div>
</div>

<script>

    HomeInternational();
    function HomeInternational(){
        PillsCategory('/category-by-id/5','#InternationalPills','InternationalItem')

        $('#InternationalPills').on('click','.InternationalItem',function (){
            BodyLoaderON();
            $('.InternationalItem').removeClass('disabled')
            $(this).addClass('disabled')
            let id = $(this).attr('SubCategoryID');
            let LeadNews = $('#internationalLeadNews');
            if(id === "0"){
                AllInternationalNews();
            }else{
                GetData(`/get-all-news/${id}/lead_news/4/sub`, function (response){
                    if(response.status === 200){
                        LeadNews.empty();
                        let data = response.data;
                        if(data.length > 0){
                            let order = 5;
                            for(let i = 0; i < data.length; i++){
                                for(let j = 0; j < order; j++){
                                    if(data[i].order == j){
                                        InternationalLeadNews(data[i].id,data[i].title,data[i].image,data[i].sort_description,data[i].date);
                                    }
                                }
                            }
                        }else{
                            LeadNews.append(ErrorNotFoundData())
                        }
                        BodyLoaderOFF();
                    }
                });
            }
        })


        AllInternationalNews()


        function AllInternationalNews(){
            $('#internationalLeadNews').empty()
            GetData('/get-all-news/5/lead_news/4/0', function(response){
                if(response.status === 200){
                    let data = response.data;
                    let order = 5;
                    for(let i = 0; i < data.length; i++){

                        for(let j = 0; j < order; j++){
                            if(data[i].order == j){
                                InternationalLeadNews(data[i].id,data[i].title,data[i].image,data[i].sort_description,data[i].date);
                            }
                        }
                    }
                }
                BodyLoaderOFF();
            })

        }

        function InternationalLeadNews(newsID,title,image,shortDesc,date){
            $('#internationalLeadNews').append(`
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <a href="/get-news/${newsID}" class="card link" style="height: 400px;overflow: hidden;">
                    <img class="card-img" src="${image}" >
                    <div class="card-body">
                        <h3 class="line-2">${title}</h3>
                        <p class="line-3">${shortDesc}</p>
                        <p class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>${site.localeDate(date)}</p>
                    </div>
                </a>
            </div>
        `)
        }
    }
</script>
