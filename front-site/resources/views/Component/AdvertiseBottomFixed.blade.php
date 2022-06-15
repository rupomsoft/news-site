<div id="AdvertiseBottomFixed"  class="position-fixed" style="left: 0;z-index: 999; bottom: 0px;">
    <div class="AdvertiseBottomBody position-relative">
        <button type="button" id="AdvertiseFixedBottomClose" class="position-absolute btn" style="background: #F3F3F3;right: 25px;top: -15px;">
            <i class="fas fa-times"></i>
        </button>
        <div id="layout_fixed_bottom" class="image d-flex justify-content-center p-2" style="background: #F3F3F3;height: 100px;width: 100vw">
            <!--- Layout Fixed Bottom Advertise -->
        </div>
    </div>
</div>


<script>

    Advertise('/advertise/layout_fixed_bottom_add',$('#layout_fixed_bottom'))

    $('#AdvertiseFixedBottomClose').click(function (){
        $('#AdvertiseBottomFixed').remove();
    })
</script>
