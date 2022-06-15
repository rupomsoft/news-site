<div id="secondLead" class="section-container">
    <div class="row">
        <div  class="endNews col-12 sm-6 col-md-4 col-lg-3">
            <!-- Nav pills -->
            <ul class="nav border-bottom  mb-2  pb-1 pt-1 border-top nav-pills">
                <li class="nav-item">
                    <a class="nav-link text-dark active f-20" data-bs-toggle="pill" href="#home">সর্বশেষ</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link text-dark f-20" data-bs-toggle="pill" href="#menu1">সর্বাধিক</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content endNewsItem">
                <div class="tab-pane p-0 container active" id="home">
                    <div class="titleNews2" id="SorbosesNews">
                        <!--- Sorboses News -->
                    </div>
                </div>
                <div class="tab-pane p-0 container fade" id="menu1">
                    <div class="titleNews2" id="SorbadikNews">
                        <!-- Sorbadik News -->
                    </div>
                </div>
            </div>

            {{--                Advertise--}}
            <div id="home_second_lead_left" class="advertise mt-5 mb-3 text-center overflow-hidden">

            </div>
        </div>

        <div class=" col-12 sm-6 col-md-8 col-lg-9">
            <div class="row" id="secondLeadNews">
                <!--SECOND LEAD NEWS -->
            </div>
        </div>
    </div>
</div>

<script>


    GetData('/get-all-live-news/1/0', function (response){

        if(response.status === 200){
            let data = response.data;
            if(data.length > 0){
                $('#SorbosesNews').append(`
                    <a href="/get-live-news/${data[0].id}" class="news  p-0 link border-bottom mt-2 mb-2">
                        <div class="position-relative">
                            <img style="height: 65px;" class="image" src="${data[0].image}">
                            <div class="position-absolute text-center text-white " style="height: 20px;width: 90%;background: rgba(255,255,255,1);bottom: 0">

                                <img src="https://www.pngall.com/wp-content/uploads/2018/03/Live-PNG-File.png" height="20px">
                            </div>
                        </div>
                        <div>
                            <h5 class="title line-2" style="margin-bottom: 0px!important;">${data[0].title}</h5>
                            <p class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>${site.localeDate(data[0].date)}</p>
                        </div>
                    </a>
                `)}
        }
    })

    HomeSecondLead();

    Advertise('/advertise/home_second_lead_left_add',$('#home_second_lead_left'))

    function HomeSecondLead(){
        GetData('/get-all-news/1/second_lead/9/0', function(response){
            if(response.status === 200){
                let data = response.data;
                let order = 9;
                for(let i = 0;i < data.length; i++){

                    for(let j = 0;j < order; j++){
                        if(data[i].order == j+1){
                            SecondLead(data[i].id,data[i].title, data[i].image, data[i].date);
                        }
                    }
                }
            }
            else{
                console.log(response)
            }

            function SecondLead(newsID,title,image,time,category){
                $('#secondLeadNews').append(`
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 p-2">
                    <a  href="/get-news/${newsID}" class="card link overflow-hidden w-100" style="width: 18rem;height: 300px;">
                        <img src="${image}" height="180px" style="object-fit: cover" alt="Tittle">
                        <div class="card-body">
                            <p class="card-text f-18">${title}</p>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex f-13 align-items-center"><i class="fas fa-clock" style="margin-right: 5px"></i> ${moment(time).locale('bn').startOf('hour').fromNow()}</div>
<!--                                <div class="f-13"><i class="fas fa-tags" style="margin-right: 5px"></i> ${category} </div>-->
                            </div>
                        </div>
                    </a>
                </div>
            `);
            }
        })



        GetData('/get-all-latest/12/0', function (response){
            if(response.status === 200){
                let data = response.data;
                let order = 12;
                for(let i = 0; i < data.length; i++){
                    // for(let j = 0; j < order ; j++){
                    //     if(data[i].order == j+1){
                            //console.log(j+1)
                            $('#SorbosesNews').append(`
                            <a href="/get-news/${data[i].id}" class="news p-0 link border-bottom mt-2 mb-2">
                                <img  style="height: 65px;" class="image" src="${data[i].image}">
                                <div>
                                    <h5 class="title line-2" style="margin-bottom: 5px!important;">${data[i].title}</h5>
                                    <p class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>${site.localeDate(data[i].datae)}</p>
                                </div>
                            </a>
                         `);
                        // }
                    // }
                }
            }
        });




        GetData('/get-all-sorbadhik/12', function (response){
            if(response.status === 200){
                let data = response.data;
                for(let i = 0; i < data.length; i++){
                    $('#SorbadikNews').append(`
                    <a href="/get-news/${data[i].id}" class="news p-0 link border-bottom mt-2 mb-2">
                        <img style="height: 65px;" class="image" src="${data[i].image}">
                        <div>
                            <h5 class="title line-2" style="margin-bottom: 5px!important;">${data[i].title}</h5>
                            <p class="hour"><i class="fas  fa-clock" style="margin: 0 5px 0 0;"></i>${site.localeDate(data[i].datae)}</p>
                        </div>
                    </a>
                `);
                }
            }
        });
    }
</script>
