<!-- Main Header -->
<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo e(url('/'), false); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><?php echo e(Str::limit(get_site_title(), 2, '.'), false); ?></span>

    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><?php echo e(get_site_title(), false); ?></span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages Menu-->
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <?php if($count_message = $unread_messages->count()): ?>
              <span class="label label-success"><?php echo e($count_message, false); ?></span>
            <?php endif; ?>
          </a>
          <ul class="dropdown-menu">
            <li class="header"><?php echo e(trans('messages.message_count', ['count' => $count_message]), false); ?></li>
            <li>
              <ul class="menu">
                <?php $__empty_1 = true; $__currentLoopData = $unread_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <?php if($loop->index > 5) continue; ?>
                  <li><!-- start message -->
                    <a href="<?php echo e(route('admin.support.message.show', $message), false); ?>">
                      <div class="pull-left">
                        <img src="<?php echo e(get_avatar_src($message->customer, 'tiny'), false); ?>" class="img-circle" alt="<?php echo e(trans('app.avatar'), false); ?>">
                      </div>
                      <h4>
                        <?php echo $message->subject; ?>

                        <small><i class="fa fa-clock-o"></i> <?php echo e($message->created_at->diffForHumans(), false); ?></small>
                      </h4>

                      <p>
                        <?php echo e(Str::limit($message->message, 100), false); ?>

                      </p>
                    </a>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul><!-- /.menu -->
            </li>
            <li class="footer"><a href="<?php echo e(url('admin/support/message/labelOf/'. App\Message::LABEL_INBOX), false); ?>"><?php echo e(trans('app.go_to_msg_inbox'), false); ?></a></li>
          </ul>
        </li><!-- /.messages-menu -->

        <!-- Notifications Menu -->
        <li class="dropdown notifications-menu" id="notifications-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <?php if($count_notification = Auth::user()->unreadNotifications->count()): ?>
              <span class="label label-warning"><?php echo e($count_notification, false); ?></span>
            <?php endif; ?>
          </a>
          <ul class="dropdown-menu">
            <li class="header"><?php echo e(trans('messages.notification_count', ['count' => $count_notification]), false); ?></li>
            <li>
              <ul class="menu">
                <?php $__currentLoopData = Auth::user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <?php
                      $notification_view = 'admin.partials.notifications.' . Str::snake(class_basename($notification->type));
                    ?>

                    <?php echo $__env->first([$notification_view, 'admin.partials.notifications.default'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul><!-- .menu -->
            </li>
            <li class="footer"><a href="<?php echo e(route('admin.notifications'), false); ?>"><?php echo e(trans('app.view_all_notifications'), false); ?></a></li>
          </ul>
        </li><!-- /.notifications-menu -->

        <!-- Announcement Menu -->
        <?php if($active_announcement): ?>
          <li class="dropdown tasks-menu" id="announcement-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bullhorn"></i>
              <?php if($active_announcement && $active_announcement->updated_at > Auth::user()->read_announcements_at): ?>
                <span class="label"><i class="fa fa-circle"></i></span>
              <?php endif; ?>
            </a>
            <ul class="dropdown-menu">
              <li>
                <?php echo $active_announcement->parsed_body; ?>

                <?php if($active_announcement->action_url): ?>
                  <span class="indent10">
                    <a href="<?php echo e($active_announcement->action_url, false); ?>" class="btn btn-flat btn-default btn-xs"><?php echo e($active_announcement->action_text, false); ?></a>
                  </span>
                <?php endif; ?>
              </li>
            </ul>
          </li><!-- /.notifications-menu -->
        <?php endif; ?>

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php if(Auth::user()->image): ?>
              <img src="<?php echo e(get_storage_file_url(Auth::user()->image->path, 'tiny'), false); ?>" class="user-image" alt="<?php echo e(trans('app.avatar'), false); ?>">
            <?php else: ?>
              <img src="<?php echo e(get_gravatar_url(Auth::user()->email, 'tiny'), false); ?>" class="user-image" alt="<?php echo e(trans('app.avatar'), false); ?>">
            <?php endif; ?>
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?php echo e(($Tname = Auth::user()->getName()) ? $Tname : trans('app.welcome'), false); ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <?php if(Auth::user()->image): ?>
                <img src="<?php echo e(get_storage_file_url(Auth::user()->image->path, 'small'), false); ?>" class="user-image" alt="<?php echo e(trans('app.avatar'), false); ?>">
              <?php else: ?>
                <img src="<?php echo e(get_gravatar_url(Auth::user()->email, 'small'), false); ?>" class="user-image" alt="<?php echo e(trans('app.avatar'), false); ?>">
              <?php endif; ?>

              <h4><?php echo e(Auth::user()->name, false); ?></h4>
              <p>
                <?php if(Auth::user()->isSuperAdmin()): ?>
                  <?php echo e(trans('app.super_admin'), false); ?>

                <?php else: ?>
                  <?php if(Auth::user()->isFromPlatform()): ?>
                    <?php echo e(Auth::user()->role->name, false); ?>

                  <?php elseif(Auth::user()->isMerchant()): ?>
                    <?php echo e(Auth::user()->owns ? Auth::user()->owns->name : Auth::user()->role->name, false); ?>

                  <?php else: ?>
                    <?php echo e(Auth::user()->role->name . ' | ' . Auth::user()->shop->name, false); ?>

                  <?php endif; ?>
                <?php endif; ?>

                <small><?php echo e(trans('app.member_since') . ' ' . Auth::user()->created_at->diffForHumans(), false); ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo e(route('admin.account.profile'), false); ?>" class="btn btn-default btn-flat"><i class="fa fa-user"></i> <?php echo e(trans('app.account'), false); ?></a>
              </div>
              <div class="pull-right">
                <a href="<?php echo e(Request::session()->has('impersonated') ? route('admin.secretLogout') : route('logout'), false); ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> <?php echo e(trans('app.log_out'), false); ?></a>
              </div>
            </li>
          </ul>
        </li><!-- /.user-menu -->

        <!-- Control Sidebar Toggle Button -->
        <li>
          
        </li>
      </ul>
    </div>
  </nav>
</header><?php /**PATH /home/amraibes/public_html/resources/views/admin/header.blade.php ENDPATH**/ ?>