<div class="mt-5 d-md-block d-none">
    <div class="section-container">
        <div class="border-top shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
            <h4 class="m-0">ভিডিও</h4>
{{--            <button class="btn btn-danger rounded-pill">সকল</button>--}}
        </div>
    </div>
</div>

<div id="VideoComponent" class="bg-dark d-md-block d-none mt-3 p-4 section-container">
    <div class="row" id="gallery-container">


    </div>
</div>




<script>
    GetData('/get-all-video/6/0',function (response){
        if(response.status === 200){
            let data = response.data;
            let GalleryContainer = $('#gallery-container');

            for(let i = 0; i <  data.length ;i++){
                if(i == 0){
                    let item = data[i];
                    GalleryContainer.append(`
                        <div class="col-4 mt-2 mb-2" data-lg-size="1280-720" data-pinterest-text="Pin it3" data-tweet-text="lightGallery slide  4" data-src="${item.video_link}" data-poster="${item.video_thumbnail}" data-sub-html="<h4>Here Is Video Title Shown</h1>">
                            <div class="card video-card position-relative">
                                <img class="card-img img-fluid" src="${item.video_thumbnail}">
                                <div class="video-card-overlay d-none  h-100 w-100 position-absolute d-flex align-items-center justify-content-center" ><i class="fas fa-play text-danger" style="font-size: 80px;"></i></div>
                            </div>
                        </div>
                    `)
                }else if(i == 1){
                    let item = data[i];
                    GalleryContainer.append(`
                        <div class="col-4 mt-2 mb-2" data-lg-size="1280-720" data-pinterest-text="Pin it3" data-tweet-text="lightGallery slide  4" data-src="${item.video_link}" data-poster="${item.video_thumbnail}" data-sub-html="<h4>Here Is Video Title Shown</h1>">
                            <div class="card video-card position-relative">
                                <img class="card-img img-fluid" src="${item.video_thumbnail}">
                                <div class="video-card-overlay d-none  h-100 w-100 position-absolute d-flex align-items-center justify-content-center" ><i class="fas fa-play text-danger" style="font-size: 80px;"></i></div>
                            </div>
                        </div>
                    `)
                }else if( i == 2){
                    let item = data[i];
                    GalleryContainer.append(`
                        <div class="col-4 mt-2 mb-2" data-lg-size="1280-720" data-pinterest-text="Pin it3" data-tweet-text="lightGallery slide  4" data-src="${item.video_link}" data-poster="${item.video_thumbnail}" data-sub-html="<h4>Here Is Video Title Shown</h1>">
                            <div class="card video-card position-relative">
                                <img class="card-img img-fluid" src="${item.video_thumbnail}">
                                <div class="video-card-overlay d-none  h-100 w-100 position-absolute d-flex align-items-center justify-content-center" ><i class="fas fa-play text-danger" style="font-size: 80px;"></i></div>
                            </div>
                        </div>
                    `)
                }else if( i == 3){
                    let item = data[i];
                    GalleryContainer.append(`
                        <div class="col-4 mt-2 mb-2" data-lg-size="1280-720" data-pinterest-text="Pin it3" data-tweet-text="lightGallery slide  4" data-src="${item.video_link}" data-poster="${item.video_thumbnail}" data-sub-html="<h4>Here Is Video Title Shown</h1>">
                            <div class="card video-card position-relative">
                                <img class="card-img img-fluid" src="${item.video_thumbnail}">
                                <div class="video-card-overlay d-none  h-100 w-100 position-absolute d-flex align-items-center justify-content-center" ><i class="fas fa-play text-danger" style="font-size: 80px;"></i></div>
                            </div>
                        </div>
                    `)
                }else if(i ==  4){
                    let item = data[i];
                    GalleryContainer.append(`
                        <div class="col-4 mt-2 mb-2" data-lg-size="1280-720" data-pinterest-text="Pin it3" data-tweet-text="lightGallery slide  4" data-src="${item.video_link}" data-poster="${item.video_thumbnail}" data-sub-html="<h4>Here Is Video Title Shown</h1>">
                            <div class="card video-card position-relative">
                                <img class="card-img img-fluid" src="${item.video_thumbnail}">
                                <div class="video-card-overlay d-none  h-100 w-100 position-absolute d-flex align-items-center justify-content-center" ><i class="fas fa-play text-danger" style="font-size: 80px;"></i></div>
                            </div>
                        </div>
                    `)
                }else if(i ==  5){
                    let item = data[i];
                    GalleryContainer.append(`
                        <div class="col-4 mt-2 mb-2" data-lg-size="1280-720" data-pinterest-text="Pin it3" data-tweet-text="lightGallery slide  4" data-src="${item.video_link}" data-poster="${item.video_thumbnail}" data-sub-html="<h4>Here Is Video Title Shown</h1>">
                            <div class="card video-card position-relative">
                                <img class="card-img img-fluid" src="${item.video_thumbnail}">
                                <div class="video-card-overlay d-none  h-100 w-100 position-absolute d-flex align-items-center justify-content-center" ><i class="fas fa-play text-danger" style="font-size: 80px;"></i></div>
                            </div>
                        </div>
                    `)
                }
            }

            lightGallery(document.getElementById("gallery-container"), {
                speed: 500,
                plugins: [lgVideo]
            });
        }



    })
</script>


