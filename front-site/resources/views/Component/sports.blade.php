
<div class="row section-container" id="sports">
    <div class="col-12 col-md-12 col-lg-8 col-xl-9">
        <div class="bg-light mt-5 border-top border-bottom border-secondary shadow-sm">
            <div class="bg-light p-2  d-flex justify-content-between align-items-center">
                <h4 class="m-0">খেলা</h4>
                <ul class="nav nav-tabs" role="tablist" id="SportsPills">
                    <li class="nav-item">
                        <a class="nav-link SportsItem active" SubCategoryID="0" data-bs-toggle="tab" href="#">সকল</a>
                    </li>
                </ul>
                <a href="/get-news-by-category/4" class="btn btn-danger rounded-pill">সকল</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-6 col-lg-7">
                <div id="sportsFirstLead">
                   <!--FIRST LEAD-->
                </div>

                <div class="mt-3">
                    <div class="titleNews2 mt-4 border-left border-right" id="firstSportSubNews">
                        <!--FIRST LEAD SUBNEWS -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5">
                <div class="" id="sportsSecondLead" style="height: 565px">
                    <!--SPORTS SECOND LEAD -->
                </div>
                <div>
                    <div id="sportsSecondLeadSubNews" class="titleNews2 mt-4 border-left border-right">

                        <!--   -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-4 col-xl-3">
        <div class="bg-light mt-5 border-top border-bottom border-secondary shadow-sm">
            <div class="bg-light p-2  d-flex justify-content-between align-items-center">
                <h4 class="m-0">অনলাইন ভোট</h4>
                <button class="btn btn-danger rounded-pill">সকল</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                <div id="vote-item-container" class="vs-slide-item" >
                    <!-- Vote Item Area -->
                </div>

            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-12">

                {{--                Advertise--}}
                <div id="home_sports_right" class="advertise mt-4 mb-3 text-center">

                </div>
            </div>
        </div>
    </div>
</div>




<script>

    Advertise('/advertise/home_sports_right_add',$('#home_sports_right'))

    HomeSports();
    function HomeSports(){
        PillsCategory('/category-by-id/4','#SportsPills','SportsItem')

        $('#SportsPills').on('click','.SportsItem',function (){
            BodyLoaderON();
            $('.SportsItem').removeClass('disabled')
            $(this).addClass('disabled')
            let id = $(this).attr('SubCategoryID');
            let FirstSportSubNews = $('#firstSportSubNews');
            let SecondSportSubNews = $('#sportsSecondLeadSubNews');
            if(id === "0"){
                AllSportsNews();
            }else{
                GetData(`/get-all-news/${id}/lead_news/3/sub`,function(response){
                    if(response.status === 200){
                        $('#sportsFirstLead').empty();
                        $('#sportsSecondLead').empty()
                        let data = response.data;
                        for(let i = 0; i < data.length; i++){
                            if(data[i].order == "1"){
                                $('#sportsFirstLead').append(`
                                 <a href="/get-news/${data[i].id}" class="card link border newsCardOverlay position-relative">
                                    <img class="img-fluid" src="${data[i].image}" >
                                    <div class="card-body">
                                        <h3>${data[i].title}</h3>
                                        <p>যুক্তরাষ্ট্রে থেকে বঙ্গবন্ধুকে স্মরণ করলেন শাকিব খান যুক্তরাষ্ট্রে থেকে বঙ্গবন্ধুকে স্মরণ করলেন শাকিব খান যুক্তরাষ্ট্রে থেকে বঙ্গবন্ধুকে স্মরণ করলেন শাকিব খান</p>
                                        <p class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>২ ঘন্টা আগে</p>
                                    </div>
                                 </a>
                            `);
                            }else if(data[i].order == "2"){
                                $('#sportsSecondLead').append(`
                             <a href="/get-news/${data[i].id}" class="card link" style="height: 550px">
                                  <img style="object-fit: cover;height: 100%; width: 100%;" src="${data[i].image}" class="img-fluid">
                                  <div  class="cardOverlay p-2 w-100 position-absolute" style="bottom: 0;">
                                       <h5 class="card-title text-white line-2" style="margin-bottom: 0;">${data[i].title}</h5>
                                   </div>
                             </a>
                        `)
                            }
                        }
                        BodyLoaderOFF();
                    }
                })


                GetData(`/get-all-news/${id}/sub_lead_news/4/0/sub`, function (response){
                    if(response.status === 200){
                        FirstSportSubNews.empty();
                        let data = response.data;
                        if(data.length > 0){
                            let order = 5;
                            for(let i = 0; i < data.length; i++){
                                for(let j = 0; j < order; j++){
                                    if(data[i].order == j){
                                        FirstLeadSubNews(data[i].id,data[i].title,data[i].image,data[i].date);
                                    }
                                }
                            }
                        }else{
                            //FirstSportSubNews.append(ErrorNotFoundData())
                        }
                    }
                });

                //Side News
                GetData(`/get-all-news/${id}/second_lead/3/0/sub`,function (response){
                    if(response.status === 200){
                        SecondSportSubNews.empty();
                        let data = response.data;
                        if(data.length > 0){
                            let order = 7;
                            for(let i = 0; i < data.length; i++){
                                for(let j = 0; j < order; j++){
                                    if(data[i].order == j+1){
                                        SecondLeadSubNews(data[i].id,data[i].title,data[i].image,data[i].date);
                                    }
                                }
                            }
                        }else{
                            //SecondSportSubNews.append(ErrorNotFoundData())
                        }
                    }
                });
            }
        })
    }


/*

    //Get All Vote
    GetData('/vote-result',function (response){
        if(response.status === 200){
            let votedArray =  JSON.parse(localStorage.getItem('voted'))
            let data = response.data[0];

            votedArray.forEach(function (item){
                if(item.id !== data.id){
                    $('#vote-item-container').append(VoteItem(data, item.type));
                }else{
                     $('#vote-item-container').append(VoteItem(data, item.type));
                }
            })
            $('.vs-slide-item').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                // autoplay: true,
                // autoplaySpeed: 2000,
                nextArrow: '.v-next',
                prevArrow: '.v-prev'
            });
        }
    })



    var loaded = 0;
    var voting = [];
    $('#vote-item-container').on('click','.vote-select', function (){
        let voteID = $(this).attr('vote-id');
        let voteType = $(this).attr('vote-type');
        if(loaded == 0){
            loaded =  1;
            if(voting.length > 0){
                for(let i = 0 ; i < voting.length; i++){
                    var vote = voting[i];
                    if(vote.id === voteID){
                        voting.splice(i,1);
                        voting.push({id: voteID, type: voteType})
                    }else{
                        voting.push({id: voteID, type: voteType});
                        break;
                    }
                }
            }else{
                voting.push({id: voteID, type: voteType})
            }
        }
    })

    setInterval(function (){
        loaded = 0;
    }, 200)


    //Give Vote
    $('#vote-item-container').on('click','.GiveVoteBtn', function (){
        let voteID = $(this).attr('vote-id');
        if(voteID !== ""){
            for(let i = 0; i < voting.length; i++){
                let vote = voting[i];
                if(vote.id == voteID){
                    GetData(`/give-vote/${vote.id}/${vote.type}`, function (response){
                        if(response.status === 200){
                            let voted = localStorage.getItem('voted');
                            if(voted == null || voted == ""){
                                let votedArray = [{id: vote.id, type: vote.type}]
                                voting.splice(i,1);
                                localStorage.setItem('voted',JSON.stringify(votedArray));
                                GetData('/vote-result',function (response) {
                                    if (response.status === 200) {
                                        let data = response.data[0];
                                        if(data.id == votedArray[0].id){
                                            $('#vote-item-container').slick('slickRemove',null, null, true)
                                            $('#vote-item-container').slick('slickAdd',VoteItem(data,votedArray[0].type));
                                        }
                                    }
                                });
                            }else{
                               let votedArray =  JSON.parse(voted)

                                votedArray.forEach(function (item,index){
                                    if(item.id == voting[i].id){
                                       votedArray.splice(index,1);
                                       let obj = {id: voting[i].id, type: voting[i].type}
                                        votedArray.push(obj)
                                        localStorage.setItem('voted',JSON.stringify(votedArray));
                                        voting.splice(i,1);
                                    }else{
                                        let obj = {id: voting[i].id, type: voting[i].type}
                                        votedArray.push(obj)
                                        localStorage.setItem('voted',JSON.stringify(votedArray));
                                        voting.splice(i,1);
                                    }
                                })
                                GetData('/vote-result',function (response) {
                                    if (response.status === 200) {
                                        let data = response.data[0];
                                        votedArray.forEach(function (item){
                                            if(item.id == data.id){
                                                $('#vote-item-container').slick('slickRemove',null, null, true)
                                                $('#vote-item-container').slick('slickAdd',VoteItem(data,item.type));
                                            }else{
                                                $('#vote-item-container').slick('slickRemove',null, null, true)
                                                $('#vote-item-container').slick('slickAdd',VoteItem(data,item.type));
                                            }
                                        })
                                    }
                                });
                            }
                        }
                    })
                }
            }
        }
    });

*/



    AllSportsNews()


    function AllSportsNews(){
        //SPORT LEAD NEWS
        GetData('/get-all-news/4/lead_news/2/0',function(response){
            if(response.status === 200){
                let data = response.data;
                $('#sportsFirstLead').empty();
                $('#sportsSecondLead').empty()
                let firstLoad = 0;
                let secondLoad = 0;
                for(let i = 0; i < data.length; i++){
                    if(firstLoad == 0){
                        firstLoad = 1;
                        if(data[i].order == "1") {
                            $('#sportsFirstLead').append(`
                                 <a href="/get-news/${data[i].id}" class="card link">
                                    <img class="img-fluid" src="${data[i].image}" >
                                    <div class="card-body">
                                        <h3>${data[i].title}</h3>
                                        <p class="line-2">${data[i].short_description}</p>
                                        <p class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>>${site.localeDate(data[i].time)}</p>
                                    </div>
                                 </a>
                            `);
                        }
                    }else{
                        if(secondLoad == 0){
                            secondLoad = 1;
                            if(data[i].order == "2"){
                                $('#sportsSecondLead').append(`
                                     <a href="/get-news/${data[i].id}" class="card link" style="height: 550px">
                                          <img style="object-fit: cover;height: 100%; width: 100%;" src="${data[i].image}" class="img-fluid">
                                          <div  class="cardOverlay p-2 w-100 position-absolute" style="bottom: 0;">
                                               <h5 class="card-title text-white line-2" style="margin-bottom: 0;">${data[i].title}</h5>
                                           </div>
                                     </a>
                                `)
                            }
                        }
                    }
                }
                BodyLoaderOFF();
            }
        })

        // SPORTS FIRST LEAD SUB NEWS
        GetData('/get-all-news/4/sub_lead_news/4/0',function(response){

            if(response.status === 200){
                let data = response.data;
                let order = 5;
                for(let i = 0; i < data.length; i++){

                    for(let j = 0; j < order; j++){
                        if(data[i].order == j){
                            FirstLeadSubNews(data[i].id,data[i].title,data[i].image,data[i].date);
                        }
                    }
                }
            }
        })

        // SPORTS SECOND LEAD SUB NEWS
        GetData('/get-all-news/4/second_lead/3/0',function(response){
            if(response.status === 200){
                let data = response.data;
                let order = 4;
                for(let i = 0; i < data.length; i++){

                    for(let j = 0; j < order; j++){
                        if(data[i].order == j){
                            SecondLeadSubNews(data[i].id,data[i].title,data[i].image,data[i].date);
                        }
                    }
                }
            }
        })
    }

    //functions
    function FirstLeadSubNews(newsID,title,image,time){
        $('#firstSportSubNews').append(`
             <a href="/get-news/${newsID}" class="news link border-bottom mt-1 mb-1">
                <img class="image" src="${image}">
                <div>
                    <h5 class="title">${title}</h5>
                    <p class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>${site.localeDate(time)}</p>
                </div>
            </a>
        `)
    }

    function SecondLeadSubNews(newsID,title,image,time){
        $('#sportsSecondLeadSubNews').append(`
             <a href="/get-news/${newsID}" class="news link border-bottom mt-2 mb-2">
                <img class="image" src="${image}">
                <div>
                    <h5 class="title">${title}</h5>
                    <p class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>${site.localeDate(time)}</p>
                </div>
            </a>
        `)
    }




/*    let vote = {
        image : "",
        yes: 40,
        no: 40,
        no_comments: 20,
        id: 1,
        topic: "Hello World"
    }
    $('#vote-item-container').append(VoteItem(vote,2))*/

    GetData('/vote-result', function (response) {
        if(response.status === 200){
            let data = response.data;
            // $('#vote-item-container').empty();
            let loaded = 0;
            data.forEach(function (item,index) {
               if(loaded == 0){
                   $('#vote-item-container').append(VoteItem(item,2))
                   loaded = 1;
               }
            })
            $('.vs-slide-item').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                // autoplay: true,
                // autoplaySpeed: 2000,
                nextArrow: '.v-next',
                prevArrow: '.v-prev'
            });
        }
    })



    function VoteItem(vote,type){
         return (`
                <div class="vote-section mt-3" style="height: 620px">

                    <div class="h-100 position-relative card  border border-danger vote">
                        <button id="v-next" class="v-next v-action bg-white btn btn-outline-danger"><i class="fas fa-angle-left"></i> </button>
                        <button id="v-prev" class="v-prev v-action bg-white btn btn-outline-danger"><i class="fas fa-angle-right"></i> </button>

                        <img src="${vote.image}"   height="160px">
                        <div style="flex: 0;" class="card-body pt-3 pb-0">
                            <p class="f-18 m-0 line-4">${vote.topic}</p>
                        </div>

                        <div class="vote-select-area p-3 pt-1 pb-1 ">
                            <label vote-type="1" vote-id="${vote.id}" for="vs1${vote.id}" class="vote-select  mt-3 d-block">
                                <div style="width: ${vote.yes}%"  class="select-overlay"></div>
                                <div class="vote-input d-flex align-items-center text-danger p-3 pt-1 pb-1">
                                    <input ${(type == 1) ? "checked" : ""} name="vs-input" id="vs1${vote.id}" type="radio" style="margin-right: 7px;">
                                    <span>হ্যা</span>
                                    <span style="padding-left: 12px;padding-top:3px;font-size: 14px;">${vote.yes.toFixed(2)+" %"}</span>
                                </div>
                            </label>
                            <label vote-type="2" vote-id="${vote.id}" for="vs2${vote.id}" class="vote-select  mt-3 d-block">
                                <div style="width: ${vote.no}%"   class="select-overlay"></div>
                                <div class="vote-input d-flex align-items-center text-danger p-3 pt-1 pb-1">
                                    <input ${(type == 2) ? "checked=\"checked\"" : ""}  name="vs-input" id="vs2${vote.id}" type="radio" style="margin-right: 7px;">
                                    <span>না</span>
                                    <span style="padding-left: 12px;padding-top:3px;font-size: 14px;">${vote.no.toFixed(2)+" %"}</span>
                                </div>
                            </label>
                            <label vote-type="3" vote-id="${vote.id}" for="vs3${vote.id}" class="vote-select  mt-3 d-block">
                                <div  style="width: ${vote.no_comments}%"  class="select-overlay"></div>
                                <div class="vote-input d-flex align-items-center text-danger p-3 pt-1 pb-1">
                                    <input ${(type == 3) ? "checked" : ""}  name="vs-input" id="vs3${vote.id}" type="radio" style="margin-right: 7px;">
                                    <span>মন্তব্য নেই </span>
                                    <span style="padding-left: 12px;padding-top:3px;font-size: 14px;">${vote.no_comments.toFixed(2)+" %"}</span>
                                </div>
                            </label>
                        </div>

                        <div class="vote-buttons p-3">
                            <div class="vote-din text-center">
                                <button class="btn btn-danger rounded-pill GiveVoteBtn" vote-id="${vote.id}">ভোট দিন</button>
                            </div>

                            <div class="d-flex justify-content-between mt-3 align-items-center">
                                <button class="btn btn-outline-danger p-4 pt-1 pb-1 rounded-pill">শেয়ার</button>
                                <button class="btn btn-outline-danger p-4 pt-1 pb-1  rounded-pill">এমবেড</button>
                            </div>
                        </div>
                    </div>
                </div>
        `)

    }





</script>
