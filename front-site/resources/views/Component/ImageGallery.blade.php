<div class="mt-5 d-md-block d-none">
    <div class="section-container">
        <div class="border-top shadow-sm border-bottom border-secondary  p-2  d-flex justify-content-between align-items-center">
            <h4 class="m-0">ছবি</h4>
            {{--            <button class="btn btn-danger rounded-pill">সকল</button>--}}
        </div>
    </div>
</div>

<div id="ImageGallery"  class="mt-3 d-none d-md-block">
    <div class="row">
        <div class="col-5" id="galleryFirstImage">

        </div>
        <div class="col-7">
            <div class="row" id="galleryAnotherImage">


            </div>
        </div>
    </div>
</div>


<script>

    ImageGallery();

    function ImageGallery() {
        GetData('/get-all-image/4', function (response){
            if(response.status === 200){
                let data = response.data;
                let FirstImage = $('#galleryFirstImage');
                let anotherImages = $('#galleryAnotherImage');

                for(let i = 0; i < data.length; i++){
                    if(i == 0){
                        let item = data[i];
                        FirstImage.append(`
                             <a  data-lg-size="1400-1400"  data-src="${item.image_file}" data-sub-html="<h4>${item.title}</h4>">
                                <div class="newsCardOverlay position-relative">
                                    <img style="height: 700px;object-fit: cover;width: 100%;"  src="${item.image_file}" />
                                    <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                                        <h5 class="card-title text-white line-1 p-2">${item.title}</h5>
                                    </div>
                                </div>
                             </a>
                        `)
                    }else if(i == 1){
                        let item = data[i];
                        anotherImages.append(`
                             <a data-lg-size="1400-1400" class="col-12" data-src="${item.image_file}" data-sub-html="<h4>${item.title}</h4>">
                                <div class="newsCardOverlay position-relative">
                                    <img style="height: 385px;object-fit: cover;width: 100%" src="${item.image_file}" />
                                    <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                                        <h5 class="card-title text-white line-1 p-2">${item.title}</h5>
                                    </div>
                                </div>
                             </a>
                        `)
                    }else if(i == 2){
                        let item = data[i];
                        anotherImages.append(`
                             <a data-lg-size="1400-1400" class="col-6 mt-4" data-src="${item.image_file}" data-sub-html="<h4>${item.title}</h4>">
                                <div class="newsCardOverlay position-relative">
                                    <img style="height: 290px;object-fit: cover;width: 100%" src="${item.image_file}" />
                                    <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                                        <h5 class="card-title text-white line-1 p-2">${item.title}</h5>
                                    </div>
                                </div>
                            </a>
                        `)
                    }else if(i == 3){
                        let item = data[i];
                        anotherImages.append(`
                             <a data-lg-size="1400-1400" class="col-6 mt-4" data-src="${item.image_file}" data-sub-html="<h4>${item.title}</h4>">
                                <div class="newsCardOverlay position-relative">
                                    <img style="height: 290px;object-fit: cover;width: 100%" src="${item.image_file}" />
                                    <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                                        <h5 class="card-title text-white line-1 p-2">${item.title}</h5>
                                    </div>
                                </div>
                            </a>
                        `)
                    }
                }

             /*   data.forEach(function(item){
                    if(item.order == "1"){
                        FirstImage.append(`
                         <a  data-lg-size="1400-1400"  data-src="${item.image_file}" data-sub-html="<h4>${item.title}</h4>">
                            <div class="newsCardOverlay position-relative">
                                <img style="height: 700px;object-fit: cover;width: 100%;"  src="${item.image_file}" />
                                <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                                    <h5 class="card-title text-white line-1 p-2">${item.title}</h5>
                                </div>
                            </div>
                         </a>
                    `)
                    }

                    else if(item.order == "2"){
                        anotherImages.append(`
                         <a data-lg-size="1400-1400" class="col-12" data-src="${item.image_file}" data-sub-html="<h4>${item.title}</h4>">
                            <div class="newsCardOverlay position-relative">
                                <img style="height: 385px;object-fit: cover;width: 100%" src="${item.image_file}" />
                                <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                                    <h5 class="card-title text-white line-1 p-2">${item.title}</h5>
                                </div>
                            </div>
                         </a>
                    `)
                    }
                    else if(item.order == "3"){
                        anotherImages.append(`
                         <a data-lg-size="1400-1400" class="col-6 mt-4" data-src="${item.image_file}" data-sub-html="<h4>${item.title}</h4>">
                            <div class="newsCardOverlay position-relative">
                                <img style="height: 290px;object-fit: cover;width: 100%" src="${item.image_file}" />
                                <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                                    <h5 class="card-title text-white line-1 p-2">${item.title}</h5>
                                </div>
                            </div>
                        </a>
                    `)
                    }
                    else if(item.order == "4"){
                        anotherImages.append(`
                         <a data-lg-size="1400-1400" class="col-6 mt-4" data-src="${item.image_file}" data-sub-html="<h4>${item.title}</h4>">
                            <div class="newsCardOverlay position-relative">
                                <img style="height: 290px;object-fit: cover;width: 100%" src="${item.image_file}" />
                                <div  class="cardOverlay w-100 position-absolute" style="bottom: 0;">
                                    <h5 class="card-title text-white line-1 p-2">${item.title}</h5>
                                </div>
                            </div>
                        </a>
                    `)
                    }
                });
*/

                const colours = ['#6a7583', '#1e304b', '#315460', '#080607'];
                const galleryEventsDemo2 = document.getElementById('galleryAnotherImage');
                galleryEventsDemo2.addEventListener('lgBeforeSlide', (event) => {
                    const { index } = event.detail;
                    document.querySelector('.lg-backdrop').style.backgroundColor =
                        colours[index];
                });
                lightGallery(galleryEventsDemo2);




                lightGallery(document.getElementById('galleryFirstImage'));
            }
        })
    }
</script>
