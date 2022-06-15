<div class="mt-5 d-md-block d-none">
    <div class="section-container">
        <div class="border-top shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
            <h4 class="m-0">ফিচার</h4>
            <a href="/get-news-by-category/8" class="btn btn-danger rounded-pill">সকল</a>
        </div>
    </div>
</div>

<div id="feature" class="p-4 pt-0 p-lg-3 p-lg-2 position-relative" >
    <button class="f-prev position-absolute feature-action-btn" style="left: 30px;"><i class="fas fa-angle-left"></i></button>
    <button class="f-next position-absolute feature-action-btn" style="right: 30px;"><i class="fas fa-angle-right"></i></button>
    <div class="feature-wrap p-3 row" id="Feature">

    </div>
</div>

<script>
    function FeatureItem(newsID,title,image,ticker){
        return `
            <div class="col-3 p-1">
                <a href="/get-news/`+newsID+`" style="height: 450px;" class="card position-relative overflow-hidden" >
                    <div class="feature-title position-absolute p-4 pt-2 pb-2" style="background: var(--bg-danger);left: 28%;">
                        <h4 class="text-center text-white m-0">`+ticker+`</h4>
                    </div>
                    <img style="object-fit: cover;" class="h-100 card-img w-100" src='`+ image +`'>

                    <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                        <h4 class="card-title text-white p-2">`+title+`</h4>
                    </div>
                </a>
            </div>
        `
    }

    let featureObj = {
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: '.f-next',
        prevArrow: '.f-prev',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    adaptiveHeight: true,
                },
            },
            {
                breakpoint: 700,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 568,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    }
    function featureSlickSlider(obj){
        $('.feature-wrap').slick(obj);
    }

    $(document).ready(function(){
        GetData('/get-news-by-category/8/8/0', function(response){
            if(response.status === 200){
                let news = response.data.news;
                let order = 8;
                for(let i = 0; i < news.length; i++){

                    for(let j = 0; j < order; j++){
                        if(news[i].order == j){
                            $('#Feature').append(
                                FeatureItem(news[i].id,news[i].title,news[i].image, news[i].ticker)
                            )
                        }
                    }
                }
                featureSlickSlider(featureObj)
            }
        })

    });



</script>
