<!-- FOOTER -->
<div class="main-footer">
  <div class="container">
    <div class=" col-sm-12 col-md-4">
      <div class="footer-subscribe-form">
        <img src="<?php echo e(asset('images/footer/logo.png'), false); ?>" alt="Logo" style="color: #fff;width: 40%;">
        
            </div>

      <div class="footer-social-networks" style="width: 350px;">
        <h3>বাংলাদেশের সবচেয়ে বড়, বিশ্বস্ত অনলাইন শপিং এ আপনাকে স্বাগতম</h3>
        <h4 style="color: #06064F;"><i class="fa fa-paper-plane" aria-hidden="true"></i> Comilla,Bangladesh</h4>
        <h4 style="color: #06064F;"><i class="fa fa-envelope" aria-hidden="true"></i>
 admin@amraibest.com</h4>
      </div>
      <div class="footer-social-networks">
        <?php if($social_media_links = get_social_media_links()): ?>
          <h3><?php echo app('translator')->getFromJson('theme.stay_connected'); ?></h3>
          <ul class="footer-social-list">
            <?php $__currentLoopData = $social_media_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_media => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a class="fa fa-<?php echo e($social_media, false); ?>" href="<?php echo e($link, false); ?>" target="_blank"></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>

    <div class=" col-sm-4 col-md-4" style="text-align: center;">
     <img src="<?php echo e(asset('images/footer/qr_amraibest.png'), false); ?>" alt="Logo" style="color: #fff;width: 40%;"><br>
     <a target="_blank" href="https://play.google.com/store/apps/details?id=com.amraibestpro.shop"><img src="<?php echo e(asset('images/footer/Google.png'), false); ?>" alt="Logo" style="color: #fff;width: 40%;"></a>
    </div>

    <div class="col-sm-4 col-md-2">
      <h3><?php echo app('translator')->getFromJson('theme.nav.make_money'); ?></h3>
      <ul class="footer-link-list">
        <li>
          <a class="navbar-item-mergin-top" href="<?php echo e(url('/selling'), false); ?>"><?php echo e(trans('theme.nav.sell_on', ['platform' => get_platform_title()]), false); ?></a>
        </li>
        <li><a href="<?php echo e(url('/selling#pricing'), false); ?>" rel="nofollow"><?php echo app('translator')->getFromJson('theme.nav.become_merchant'); ?></a></li>
        <li><a href="<?php echo e(url('/selling#howItWorks'), false); ?>" rel="nofollow"><?php echo app('translator')->getFromJson('theme.nav.how_it_works'); ?></a></li>
        <?php $__currentLoopData = $pages->where('position', 'footer_2nd_column'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(get_page_url($page->slug), false); ?>" rel="nofollow" target="_blank"><?php echo e($page->title, false); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <li><a href="<?php echo e(url('/selling#faqs'), false); ?>" rel="nofollow"><?php echo app('translator')->getFromJson('theme.nav.faq'); ?></a></li>
      </ul>
    </div>

    <div class=" col-sm-4 col-md-2">
      <h3><?php echo app('translator')->getFromJson('theme.nav.customer_service'); ?></h3>
      <ul class="footer-link-list">
        <li><a href="<?php echo e(route('account', 'disputes'), false); ?>" rel="nofollow"><?php echo app('translator')->getFromJson('theme.nav.refunds_disputes'); ?></a></li>
        <li><a href="<?php echo e(route('account', 'orders'), false); ?>" rel="nofollow"><?php echo app('translator')->getFromJson('theme.nav.contact_seller'); ?></a></li>
        <?php $__currentLoopData = $pages->where('position', 'footer_3rd_column'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(get_page_url($page->slug), false); ?>" rel="nofollow" target="_blank"><?php echo e($page->title, false); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/nav/footer.blade.php ENDPATH**/ ?>