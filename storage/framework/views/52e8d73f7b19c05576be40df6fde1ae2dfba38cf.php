<aside>
    <section class="blog-sidebar-section">
        <h3 class="widget-title-sm"><?php echo e(trans('theme.search'), false); ?></h3>
        <div class="row">
            <div class="col-xs-12">
                <?php echo Form::open(['route' => ['blog.search'], 'method' => 'GET', 'id' => 'form', 'class' => 'form-inline', 'role' => 'form', 'data-toggle' => 'validator']); ?>

                  <div class="input-group full-width">
                    <?php echo Form::text('q', Null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.search'), 'required']); ?>

                    <div class="input-group-btn">
                      <button class="btn btn-primary flat" type="submit">
                        <span class="fa fa-search"></span>
                      </button>
                    </div>
                  </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </section>

    <section class="blog-sidebar-section">
        <h3 class="widget-title-sm"><?php echo e(trans('theme.recent_posts'), false); ?></h3>
        <ul class="blog-sidebar-posts">
            <?php $__currentLoopData = \App\Helpers\ListHelper::recentBlogs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <h5><a href="<?php echo e(route('blog.show', $blog->slug), false); ?>"><?php echo $blog->title; ?></a></h5>
                    <small class="text-muted"><?php echo e($blog->published_at->diffForHumans(), false); ?></small>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </section>
    <section class="blog-sidebar-section">
        <h3 class="widget-title-sm"><?php echo e(trans('theme.most_popular'), false); ?></h3>
        <ul class="blog-sidebar-posts">
            <?php $__currentLoopData = \App\Helpers\ListHelper::popularBlogs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <h5><a href="<?php echo e(route('blog.show', $blog->slug), false); ?>"><?php echo $blog->title; ?></a></h5>
                    <small class="text-muted"><?php echo e($blog->published_at->diffForHumans(), false); ?></small>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </section>

    <?php if(isset($tags) && $tags): ?>
        <section class="blog-sidebar-section">
            <h3 class="widget-title-sm"><?php echo e(trans('theme.tags'), false); ?></h3>
            <ul class="blog-sidebar-tags">
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route('blog.tag', $tag['name']), false); ?>"><?php echo e($tag['name'], false); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </section>
    <?php endif; ?>
</aside><?php /**PATH /home/amraibes/public_html/public/themes/default/views/partials/_blog_sidebar.blade.php ENDPATH**/ ?>