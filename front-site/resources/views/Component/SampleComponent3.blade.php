<div class="row section-container">
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <div class="mt-5">
            <div class="border-top shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
                <h4 class="m-0">লাইফ-স্টাইল</h4>
                <ul class="nav nav-tabs" role="tablist" id="LifeStylePills">
                    <li class="nav-item">
                        <a class="nav-link LifeStyleItem active" SubCategoryID="0" data-bs-toggle="tab" href="#">সকল</a>
                    </li>
                </ul>
                <a href="/get-news-by-category/12" class="btn btn-danger rounded-pill">সকল</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12" >
                <div id="LifeStyleLeadNews">
                    <!-- LifeStyle Lead News -->
                </div>

                <div class="card titleNews2 mt-2 border-left border-right" id="LifeStyleSubNews">
                    <!-- LifeStyle Sub News -->
                </div>
            </div>
        </div>

    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <div class="mt-5">
            <div class="border-top shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
                <h4 class="m-0">তথ্য-প্রযুক্তি</h4>
                <ul class="nav nav-tabs" role="tablist" id="TechnologyPills">
                    <li class="nav-item">
                        <a class="nav-link TechnologyItem active" SubCategoryID="0" data-bs-toggle="tab" href="#">সকল</a>
                    </li>
                </ul>
                <a href="/get-news-by-category/14" class="btn btn-danger rounded-pill">সকল</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12" >
                <div id="TechnologyLeadNews">
                    <!-- Jobs Lead News -->
                </div>

                <div class="card titleNews2 mt-2 border-left border-right" id="TechnologySubNews">
                    <!-- Jobs Sub News -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <div class="mt-5">
            <div class="border-top shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
                <h4 class="m-0">ধর্ম</h4>
                <ul class="nav nav-tabs" role="tablist" id="RigionPills">
                    <li class="nav-item">
                        <a class="nav-link RigionItem active" SubCategoryID="0" data-bs-toggle="tab" href="#">সকল</a>
                    </li>
                </ul>
                <a href="/get-news-by-category/15" class="btn btn-danger rounded-pill">সকল</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12" >
                <div id="RigionLeadNews">
                    <!-- Rigion Lead News -->
                </div>

                <div class="card titleNews2 mt-2 border-left border-right" id="RigionSubNews">
                    <!-- Rigion Sub News -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <div class="mt-5">
            <div class="border-top shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
                <h4 class="m-0">সারাদেশ</h4>
                <ul class="nav nav-tabs" role="tablist" id="SaradeshPills">
                    <li class="nav-item">
                        <a class="nav-link SaradeshItem active" SubCategoryID="0" data-bs-toggle="tab" href="#">সকল</a>
                    </li>
                </ul>
                <a href="/get-news-by-category/16" class="btn btn-danger rounded-pill">সকল</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12" >
                <div id="SaradeshLeadNews">
                    <!-- Jobs Lead News -->
                </div>

                <div class="card titleNews2 mt-2 border-left border-right" id="SaradeshSubNews">
                    <!-- Jobs Sub News -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /*---  LifeStyle Section --------*/
    PillsCategory('/category-by-id/12','#LifeStylePills','LifeStyleItem')
    $('#LifeStylePills').on('click','.LifeStyleItem',function (){
        $('.LifeStyleItem').removeClass('disabled')
        $(this).addClass('disabled')
        let id = $(this).attr('SubCategoryID');
        if(id == "0"){
            AllLifeStyleNews();
        }else{
            GetComponentNews(`/get-all-news/${id}/lead_news/1/0/sub`,'#LifeStyleLeadNews');
            GetComponentSubNews(`/get-all-news/${id}/side_bar_news/2/0/sub`,'#LifeStyleSubNews')
        }
    })
    AllLifeStyleNews();
    function AllLifeStyleNews(){
        GetComponentNews('/get-all-news/12/lead_news/1/0','#LifeStyleLeadNews');
        GetComponentSubNews('/get-all-news/12/side_bar_news/2/0','#LifeStyleSubNews');
    }
    /*---------- END Lify Style Section ------------*/


    /*---  Technology Section --------*/
    PillsCategory('/category-by-id/14','#TechnologyPills','TechnologyItem')
    $('#TechnologyPills').on('click','.TechnologyItem',function (){
        BodyLoaderON();
        $('.TechnologyItem').removeClass('disabled')
        $(this).addClass('disabled')
        let id = $(this).attr('SubCategoryID');
        if(id == "0"){
            AllTechnologyNews();
        }else{
            GetComponentNews(`/get-all-news/${id}/lead_news/1/0/sub`,'#TechnologyLeadNews');
            GetComponentSubNews(`/get-all-news/${id}/side_bar_news/2/0/sub`,'#TechnologySubNews')
        }
    })
    AllTechnologyNews();
    function AllTechnologyNews(){
        GetComponentNews('/get-all-news/14/lead_news/1/0','#TechnologyLeadNews');
        GetComponentSubNews('/get-all-news/14/side_bar_news/2/0','#TechnologySubNews');
    }
    /*---------- END Jobs Section ------------*/

    /*---  Rigion Section --------*/
    PillsCategory('/category-by-id/15','#RigionPills','RigionItem')
    $('#RigionPills').on('click','.RigionItem',function (){
        BodyLoaderON();
        $('.RigionItem').removeClass('disabled')
        $(this).addClass('disabled')
        let id = $(this).attr('SubCategoryID');
        if(id == "0"){
            AllRigionNews();
        }else{
            GetComponentNews(`/get-all-news/${id}/lead_news/1/0/sub`,'#RigionLeadNews');
            GetComponentSubNews(`/get-all-news/${id}/side_bar_news/2/0/sub`,'#RigionSubNews')
        }
    })
    AllRigionNews();
    function AllRigionNews(){
        GetComponentNews('/get-all-news/15/lead_news/1/0','#RigionLeadNews');
        GetComponentSubNews('/get-all-news/15/side_bar_news/2/0','#RigionSubNews');
    }
    /*---------- END Rigion Section ------------*/

    /*---  Saradesh Section --------*/
    PillsCategory('/category-by-id/16','#SaradeshPills','SaradeshItem')
    $('#SaradeshPills').on('click','.SaradeshItem',function (){
        BodyLoaderON();
        $('.SaradeshItem').removeClass('disabled')
        $(this).addClass('disabled')
        let id = $(this).attr('SubCategoryID');
        if(id == "0"){
            AllSaradeshNews();
        }else{
            GetComponentNews(`/get-all-news/${id}/lead_news/1/0/sub`,'#SaradeshLeadNews');
            GetComponentSubNews(`/get-all-news/${id}/side_bar_news/2/0/sub`,'#SaradeshSubNews')
        }
    })
    AllSaradeshNews();
    function AllSaradeshNews(){
        GetComponentNews('/get-all-news/16/lead_news/1/0','#SaradeshLeadNews');
        GetComponentSubNews('/get-all-news/16/side_bar_news/2/0','#SaradeshSubNews');
    }
    /*---------- END Saradesh Section ------------*/
</script>


