<div id="trending" class="section-container ">
    <div class="keywords mt-2 mb-2">
        <label style="margin-right: 10px;" class="f-18">ট্রেন্ডিংঃ </label>
        <div id="trendingItems" class="d-inline-block">

        </div>
    </div>
</div>

<script>

    GetData('/get-all-trending/6', function (response){
        if(response.status === 200){
            let data = response.data;
            if(data.length > 0){
                data.forEach(function (item){
                    $('#trendingItems').append(`
                        <a href="/get-trending-news/${item.id}" class="btn btn-sm btn-danger m-2">${item.name}</a>
                    `)
                })
            }else{
                $('#trending').remove();
            }
        }
    })
</script>
