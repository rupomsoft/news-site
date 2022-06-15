

<div style="border-top-width: 2px!important;" class="d-flex p-2 justify-content-center border-top border-bottom mt-2 bg-white" id="sompadok">
    <h4 class="m-0">{{env("ADDRESS_LINE1")}}</h4>
</div>
<div id="footer" class="bg-light pt-3 pb-3 mt-3 section-container border-top border-bottom">

    <div class="footer-area row align-items-center justify-content-between">
        <div class="col-12 col-md-12">
            <ul class="footer-list d-flex justify-content-center">
                <li style="margin-right: 7px;" class="footer-list-item mb-3 f-18 text-center text-md-right">
                    {{--                    <div>{{env("ADDRESS_LINE1")}}</div>--}}
                    <div>{{env("ADDRESS_LINE2")}}</div>
                </li>
                <li style="margin-right: 7px;" class="footer-list-item mb-3 text-center text-md-right f-18">
                    <i class="fas fa-phone"></i>
                    <span>{{env("CONTACT_NO1")}}</span>
                </li>
                <li style="margin-right: 7px;" class="footer-list-item mb-3 text-center text-md-right f-18">
                    <i class="fas fa-mobile"></i>
                    <span>{{env("CONTACT_NO2")}}</span>
                </li>
                <li style="margin-right: 7px;" class="footer-list-item mb-3 text-center text-md-right f-18">
                    <i class="fab fa-whatsapp"></i>
                    <span>{{env("WHATSAPP_NO")}}</span>
                </li>
                <li  class="footer-list-item mb-3 text-center text-md-right f-18">
                    <i class="fas fa-envelope"></i>
                    <span>{{env("EMAIL")}}</span>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-12 border-md-bottom">
            <ul class="footer-list d-flex justify-content-center ">
                <li class="footer-list-item float-start float-md-none">
                    <a class="link f-18" href="/privacy-policy">গোপনীয়তার নীতি</a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a class="link f-18" href="/terms-and-condition">ব্যবহারের শর্তাবলি</a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a class="link f-18" href="/about">আমাদের সম্পর্কে</a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a class="link f-18" href="/we">আমরা</a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a class="link f-18" href="/communication">যোগাযোগ</a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a class="link f-18" href="/Archive">আর্কাইভ</a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a class="link f-18" href="/advertise">বিজ্ঞাপন</a>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-12 mb-md-3 border-md-bottom">
            <ul class="footer-list d-flex justify-content-center">
                <li class="footer-list-item float-start float-md-none">
                    <a class="link f-18" href="{{env("FACEBOOK_URL")}}">
                        <i class="fab fa-facebook"></i>
                        <span>ফেসবুক</span>
                    </a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a class="link f-18" href="{{env("TWITTER_URL")}}">
                        <i class="fab fa-twitter"></i>
                        <span>টুইটার</span>
                    </a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a class="link f-18" href="{{env("YOUTUBE_URL")}}">
                        <i class="fab fa-youtube"></i>
                        <span>ইউটিউব</span>
                    </a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a class="link f-18" href="{{env("LINKEDIN_URL")}}">
                        <i class="fab fa-linkedin"></i>
                        <span>লিঙ্কড ইন</span>
                    </a>
                </li>
                <li class="footer-list-item float-start float-md-none">
                    <a class="link f-18" href="{{env("INSTRAGRAM_URL")}}">
                        <i class="fab fa-instagram"></i>
                        <span>ইন্সট্রাগ্রাম</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
