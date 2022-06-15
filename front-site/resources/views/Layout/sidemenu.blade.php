<div class="offcanvas offcanvas-start " tabindex="-1" id="sideMenu" aria-labelledby="sideMenuLabel">
    <div class="offcanvas-header position-fixed  d-flex justify-content-end" style="z-index: 9999;margin-left: 220px;">
        <button type="button"  class="btn btn-light rounded-pill " data-bs-dismiss="offcanvas" aria-label="Close"><i class="fas f-20 fa-times-circle"></i></button>
    </div>
    <div class="offcanvas-body mt-3">
        <!-- Category List Here -->
    </div>
</div>


<script>
    $(document).ready(function (){
        let sideMenu = $('.offcanvas-body');
        axios.get(site.url('/category')).then(function(response){
            if(response.status === 200){
                let data = response.data[0];
                let ul = "<ul class='list-group list-group-item-action list-group-flush'>";



                for(let i  = 0; i < data.length; i++){
                    var category = data[i];
                    if(category.id == "1"){
                        ul += `<a href="/" class="list-group-item list-group-item-action">${category.name}</a>`;
                    }else{
                        if(category.visible == 1){
                            if(category.sub_categories.length > 0){
                                ul += `<a href="/get-news-by-category/${category.id}" class="list-group-item list-group-item-action">${category.name}</a>`;


                                for(let j = 0; j < category.sub_categories.length; j++ ){
                                    var sub = category.sub_categories[j];
                                    if(sub.visible == 1){
                                        ul += `<a href="/get-news-by-sub-category/${sub.id}" class="list-group-item list-group-item-action">${sub.name}</a>`;
                                    }
                                }
                            }else{
                                ul += `<a href="/get-news-by-category/${category.id}" class="list-group-item list-group-item-action">${category.name}</a>`;
                            }
                        }
                    }

                }
                ul += "</ul>";

                sideMenu.append(ul)
            }
        }).catch(function (error){
            console.log(error)
        })
    })
</script>
