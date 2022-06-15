<!-- Button to Open the Modal -->
<button type="button" id="AdvertiseModal" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#myModal">
    Open modal
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog  modal-lg d-flex align-items-center h-100" >
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body p-0 position-relative">
                <button type="button" id="AdvertiseModalClose" class="position-absolute close-btn" style="right: -15px;top: -15px;" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                <div class="image">
                    <img src="https://tpc.googlesyndication.com/simgad/16544477959574702658?" class="h-100 w-100">
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('#AdvertiseModal').trigger('click');

        setTimeout(function (){
            $('#AdvertiseModalClose').trigger('click');
        },10000);
    });
</script>

