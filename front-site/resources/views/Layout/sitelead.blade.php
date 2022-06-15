<div class="section-container position-relative">
    <div class="container-fluid">
        <div id="siteLead" class="pt-2 pb-2 d-flex justify-content-between align-items-center">
            <div class="siteLeft">
                <div class="siteAction d-flex">
                    <button data-bs-toggle="offcanvas" href="#sideMenu" role="button" aria-controls="sideMenu" class="fas fa-bars"></button>
                    <button id="openSearchBtn" class="fas fa-search"></button>
                    <div  method="get" class="d-flex d-none bg-white align-items-center position-absolute check" style="left: 100px;"  id="openSearchBoxArea">
                        <input type="text"  class="form-control" id="searchTextInput">
                        <button id="searchingTextBtn"  class="fas fa-search"></button>
                        <button type="button" id="openSearchClose" class="fas btn-warning fa-times"></button>
                    </div>
                </div>
                <div class="siteDate d-none d-md-block ">
                    <p class="f-16 mt-2 mb-0" id="todayDate">
                        <script>
                            let dateText = moment().locale('bn').format('LLLL').toString();
                            let date = dateText.split(',');
                            document.write(date[0] + ", " + date[1] + " ইং")
                        </script>
                    </p>
                    <p class="f-16 mt-0" id="todayDate">
                        <script>
                            let dateConverted = new buetDateConverter().convert("j F, Y");
                            document.write(dateConverted + " বঙ্গাব্দ")
                        </script>
                    </p>
                </div>
            </div>
            <div class="siteLogo">
                <a href="/"><img  src="{{asset("img/logo-color.png")}}" alt="site logo"></a>
            </div>
            <div class="siteRight">
                <div class="siteLanguage text-end f-16">
                    <label style="margin-right: 10px;" class="d-none d-sm-inline">সংস্করন </label>
                    <select id="language" class="">
                        <option>বাংলা</option>
                        <option>ইংরেজি</option>
                    </select>
                </div>
                <div class="siteSocial d-none d-md-block mt-2">
                    <a href="{{env("FACEBOOK_URL")}}" class="fab fa-facebook"></a>
                    <a href="{{env("TWITTER_URL")}}" class="fab fa-youtube"></a>
                    <a href="{{env("YOUTUBE_URL")}}" class="fab fa-twitter"></a>
                    <a href="{{env("INSTRAGRAM_URL")}}" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#searchingTextBtn').on('click',function (){
        let data = $('#searchTextInput').val();
        if(data !== ""){
            window.location.href = site.front_site_url + "/search/"+data;
        }

    })

    $('#openSearchBtn').on('click', function (){
        $(this).addClass('d-none');
        $('#openSearchBoxArea').removeClass("d-none")
    })

    $('#openSearchClose').on('click', function (){
        $('#openSearchBtn').removeClass('d-none');
        $('#openSearchBoxArea').addClass("d-none")
    })



</script>
