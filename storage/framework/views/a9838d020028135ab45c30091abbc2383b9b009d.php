<div class="section-title">
    <h4><?php echo app('translator')->getFromJson('theme.manage_your_account'); ?></h4>
</div>
<ul class="account-sidebar-nav">
    <li class="<?php echo e($tab == 'dashboard' ? 'active' : '', false); ?>">
    	<a href="<?php echo e(route('account', 'dashboard'), false); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->getFromJson('theme.nav.dashboard'); ?></a>
    </li>
    <li class="<?php echo e($tab == 'messages' || $tab == 'message' ? 'active' : '', false); ?>">
        <a href="<?php echo e(route('account', 'messages'), false); ?>"><i class="fa fa-envelope-o"></i> <?php echo app('translator')->getFromJson('theme.my_messages'); ?></a>
    </li>
    <li class="<?php echo e($tab == 'orders' ? 'active' : '', false); ?>">
        <a href="<?php echo e(route('account', 'orders'), false); ?>"><i class="fa fa-shopping-cart"></i> <?php echo app('translator')->getFromJson('theme.nav.my_orders'); ?></a>
    </li>
    <li class="<?php echo e($tab == 'wishlist' ? 'active' : '', false); ?>">
    	<a href="<?php echo e(route('account', 'wishlist'), false); ?>"><i class="fa fa-heart-o"></i> <?php echo app('translator')->getFromJson('theme.nav.my_wishlist'); ?></a>
    </li>
    <li class="<?php echo e($tab == 'disputes' ? 'active' : '', false); ?>">
    	<a href="<?php echo e(route('account', 'disputes'), false); ?>"><i class="fa fa-rocket"></i> <?php echo app('translator')->getFromJson('theme.nav.refunds_disputes'); ?></a>
    </li>
    <li class="<?php echo e($tab == 'coupons' ? 'active' : '', false); ?>">
    	<a href="<?php echo e(route('account', 'coupons'), false); ?>"><i class="fa fa-tags"></i> <?php echo app('translator')->getFromJson('theme.nav.my_coupons'); ?></a>
    </li>
    
    <li class="<?php echo e($tab == 'account' ? 'active' : '', false); ?>">
    	<a href="<?php echo e(route('account', 'account'), false); ?>"><i class="fa fa-user"></i> <?php echo app('translator')->getFromJson('theme.nav.my_account'); ?></a>
    </li>
    <li class="<?php echo e($tab == 'livechat' ? 'active' : '', false); ?>">
         <a target="_blank" href="https://tawk.to/chat/5f9f07137f0a8e57c2d8da76/default"><i class="fa fa-user"></i> Live Chat</a>
    </li>
</ul><?php /**PATH /home/amraibes/public_html/public/themes/default/views/nav/account_page_sidebar.blade.php ENDPATH**/ ?>