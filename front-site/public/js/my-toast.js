$(document).ready(function(){
    $('#toast-btn').on('click',function (){

        myToast({
            title: "Do you know?",
            subtitle: "Join us for a free Product Design workshop on Monday.",
            errType: "danger",
            position: "bottom-center",
            duration: 3000
        });


    });






})



function myToast(object){


    $('body').append(`
             <div id="my-toast" class="${object.position} animate__animated animate__slideInUp">
                <div class="my-toast-wrap ${object.errType}">
                    <div class="my-toast-border"></div>
                    <div class="my-toast-icon">
                        <i class="fas ${object.errType === "success" ? 'fa-check-circle' : (object.errType === 'danger') ? 'fa-exclamation-triangle': 'fa-exclamation-circle'}"></i>
                    </div>
                    <div class="my-toast-content">
                        <h6>${object.title}</h6>
                        <p>${object.subtitle}</p>
                    </div>
                    <i style="float:right;padding: 10px;cursor: pointer;" class="fas fa-times" id="my-toast-close"></i>
                </div>
            </div>
        `);




    setTimeout(function (){
        $('#my-toast').remove();
    }, object.duration);


    $('body').on('click','#my-toast-close',function(){
        $('#my-toast').remove();
    })
}




