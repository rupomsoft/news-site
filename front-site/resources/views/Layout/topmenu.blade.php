<div id="top-nav" class="bg-light border-top border-bottom shadow-sm">
    <nav class="navbar section-container navbar-light navbar-expand-md  d-none d-md-block">
        <div class="container-fluid">
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
                <ul id="category" class="navbar-nav">

                </ul>
            </div>
        </div>
    </nav>
</div>

<script>
    let nav = $('#category');
    axios.get(site.url('/category')).then(function(response){
        if(response.status === 200){
            let data = response.data[0];
            let catLimit = 0;
            let order = 9;
            for(let i = 0; i < data.length; i++){
                for(let j = 0; j < order; j++){
                    if(data[i].order == j+1){
                        if(data[i].id == "1"){
                            nav.append(`
                                <li class="nav-item">
                                    <a class="nav-link top-menu" href="/">${data[i].name}</a>
                                </li>
                            `);
                        }else{
                            if(data[i].visible == 1){
                                if(data[i].sub_categories.length > 0){
                                    nav.append(`
                                    <li class="nav-item dropdown">
                                        <a class="nav-link top-menu dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            ${data[i].name}
                                        </a>
                                        <ul id="sub${data[i].id}"  class="dropdown-menu" >

                                        </ul>
                                    </li>
                                `);

                                    let subcat = data[i].sub_categories;
                                    let visibleItemList = [];
                                    for(let sci = 0; subcat.length > sci;sci++ ){
                                        if(subcat[sci].visible == 1){
                                            visibleItemList.push(sci);
                                            $('#sub'+data[i].id).append(`
                                            <li><a class="dropdown-item top-menu" href="/get-news-by-sub-category/${subcat[sci].id}">${subcat[sci].name}</a></li>
                                        `);
                                        }
                                    }
                                    $('#sub'+data[i].id).append(`
                                    <li><a class="dropdown-item top-menu" href="/get-news-by-category/${data[i].id}">সকল  ${data[i].name}</a></li>
                                `);

                                    //if All Category Visible in Subcategory then dropdown item remove
                                    if(visibleItemList.length < 1){
                                        $('#sub'+data[i].id).prev().removeClass('dropdown-toggle');
                                        $('#sub'+data[i].id).remove();
                                    }
                                }else{
                                    nav.append(`
                                        <li class="nav-item">
                                            <a class="nav-link top-menu" href="/get-news-by-category/${data[i].id}">${data[i].name}</a>
                                        </li>
                                    `);
                                }

                                catLimit++
                                if(catLimit == 9){break}
                            }
                        }
                    }
                }
            }
        }
    }).catch(function (error){
        console.log(error)
    });
</script>
