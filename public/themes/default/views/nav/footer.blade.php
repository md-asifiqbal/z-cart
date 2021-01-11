<!-- FOOTER -->
<div class="main-footer">
  <div class="container">
    <div class=" col-sm-12 col-md-4">
      <div class="footer-subscribe-form">
        <img src="{{asset('images/footer/logo.png')}}" alt="Logo" style="color: #fff;width: 40%;">
        
            </div>

      <div class="footer-social-networks" style="width: 350px;">
        <h3>বাংলাদেশের সবচেয়ে বড়, বিশ্বস্ত অনলাইন শপিং এ আপনাকে স্বাগতম</h3>
        <h4 style="color: #06064F;"><i class="fa fa-paper-plane" aria-hidden="true"></i> Comilla,Bangladesh</h4>
        <h4 style="color: #06064F;"><i class="fa fa-envelope" aria-hidden="true"></i>
 admin@amraibest.com</h4>
      </div>
      <div class="footer-social-networks">
        @if($social_media_links = get_social_media_links())
          <h3>@lang('theme.stay_connected')</h3>
          <ul class="footer-social-list">
            @foreach($social_media_links as $social_media => $link)
              <li><a class="fa fa-{{$social_media}}" href="{{$link}}" target="_blank"></a></li>
            @endforeach
          </ul>
        @endif
      </div>
    </div>

    <div class=" col-sm-4 col-md-4" style="text-align: center;">
     <img src="{{asset('images/footer/qr_amraibest.png')}}" alt="Logo" style="color: #fff;width: 40%;"><br>
     <a target="_blank" href="https://play.google.com/store/apps/details?id=com.amraibestpro.shop"><img src="{{asset('images/footer/Google.png')}}" alt="Logo" style="color: #fff;width: 40%;"></a>
    </div>

    <div class="col-sm-4 col-md-2">
      <h3>@lang('theme.nav.make_money')</h3>
      <ul class="footer-link-list">
        <li>
          <a class="navbar-item-mergin-top" href="{{ url('/selling') }}">{{ trans('theme.nav.sell_on', ['platform' => get_platform_title()]) }}</a>
        </li>
        <li><a href="{{ url('/selling#pricing') }}" rel="nofollow">@lang('theme.nav.become_merchant')</a></li>
        <li><a href="{{ url('/selling#howItWorks') }}" rel="nofollow">@lang('theme.nav.how_it_works')</a></li>
        @foreach($pages->where('position', 'footer_2nd_column') as $page)
          <li><a href="{{ get_page_url($page->slug) }}" rel="nofollow" target="_blank">{{ $page->title }}</a></li>
        @endforeach
        <li><a href="{{ url('/selling#faqs') }}" rel="nofollow">@lang('theme.nav.faq')</a></li>
      </ul>
    </div>

    <div class=" col-sm-4 col-md-2">
      <h3>@lang('theme.nav.customer_service')</h3>
      <ul class="footer-link-list">
        <li><a href="{{ route('account', 'disputes') }}" rel="nofollow">@lang('theme.nav.refunds_disputes')</a></li>
        <li><a href="{{ route('account', 'orders') }}" rel="nofollow">@lang('theme.nav.contact_seller')</a></li>
        @foreach($pages->where('position', 'footer_3rd_column') as $page)
          <li><a href="{{ get_page_url($page->slug) }}" rel="nofollow" target="_blank">{{ $page->title }}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
</div><!-- /.container -->


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f9f07137f0a8e57c2d8da76/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->




<!-- SECONDARY FOOTER -->
<footer class="user-helper-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div><!-- /.main-footer -->
</footer>

