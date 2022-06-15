<marquee id="marque" width="100%"  direction="left">
    <button type="button" id="MarqueFixedBottomClose" class="position-absolute btn" style="background: #F3F3F3;right: 10px;top: -15px;">
        <i class="fas fa-times text-danger"></i>
    </button>
    <div id="marque-news">

    </div>
</marquee>

<script>
   GetData('/get-marquee/2022-06-03', function (res) {
       if(res.status === 200){
           res.data.forEach(function (item){
               $('#marque-news').append(`
                    <a href="#" class="link p-2 border-danger border-right"> ${item.title} </a>
                `)
           })
       }
   })

    $('#MarqueFixedBottomClose').click(function () {
        $('#marque').remove();
        $('#AdvertiseBottomFixed').css("bottom","0")
    })
</script>
