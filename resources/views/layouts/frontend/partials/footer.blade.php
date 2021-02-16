<footer class="footer-area">
    <!-- footer-top -->
    <div class="footer-content">
        <div class="container">
            <div class="row d-flex justify-content-center mx-auto">
                <div class="col-md-3 col-sm-12">
                    <img  class="img-fluid" src="{{ asset('images/logo/dafb.png') }}" alt="">
                    <p>{{__('footer.desc')}}</p>
                </div>
                <div class="col-md-2 col-sm-12">
                    <h4>{{__('footer.title')}}</h4>
                    <ul>
                        <li><a href="{{ route('report.show','financialstatement') }}">{{__('footer.link')}}</a></li>
                        <li><a href="{{ route('report.show','annualreport') }}">{{__('footer.link1')}}</a></li>
                        <li><a href="{{ route('privacy') }}">{{__('footer.link2')}}</a></li>
                        <li><a href="{{ route('terms') }}">{{__('footer.link3')}}</a></li>
                        <li><a href="{{ route('contact') }}">{{__('share.contact')}}</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-12">
                    <h4>{{__('footer.title')}}</h4>
                    <ul>
                        <li><a href="{{ route('about') }}">{{__('share.about')}}</a></li>
                        <li><a href="{{ route('blog') }}">{{__('footer.link5')}}</a></li>
                        <li><a href="{{ route('events') }}">{{__('share.events')}}</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-12">
                    <h4>{{__('share.contact')}}</h4>
                    <p>{{__('footer.contacttitle')}}</p>
                    <p>{{__('form.phone')}}: +49 176 59853281</p>
                    <p>{{__('form.email')}}: info@dafbangladesch.com</p>
                    <ul class="social-links">
                        <li><a href="https://www.facebook.com/DAfBangladesh" target="blank"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom -->
    <div class="footer-copy-right text-center">
        <div class="container">
            <p>&copy; COPYRIGHT <span id="copyright" class="font-weight-bold"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>  DAfB Deutsche Arbeitsgemeinschaft für Bangladesch e.V</i></p>
        </div>
    </div>
</footer>