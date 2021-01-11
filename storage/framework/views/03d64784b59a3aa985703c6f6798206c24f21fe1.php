<section>
  <div class="container">
    <div class="row">
      <div class="section-title space20">
        <h4><?php echo trans('theme.section_headings.select_from_categories'); ?></h4>
      </div>
      <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($categoryGroup->subGroups->count()): ?>
          <div class="col-md-3 col-sm-6 bg-light category-widget space30">
            <section class="category-banner-img-wrapper">
              <div class="banner banner-o-hid" style="background-color: #333; background-image:url( <?php echo e(get_cover_img_src($categoryGroup, 'category'), false); ?> );">
                <div class="banner-caption">
                  <span class="lead"><?php echo e($categoryGroup->name, false); ?></span>
                </div>
              </div>
            </section>
            <?php $__currentLoopData = $categoryGroup->subGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <h5 class="nav-category-inner-title">
                <a href="<?php echo e(route('categories.browse', $subGroup->slug), false); ?>"><?php echo e($subGroup->name, false); ?></a>
              </h5>
              <ul class="nav-category-inner-list">
                <?php $__currentLoopData = $subGroup->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="<?php echo e(route('category.browse', $cat->slug), false); ?>"><?php echo e($cat->name, false); ?></a>
                    <?php if($cat->description): ?>
                      <p><?php echo $cat->description; ?></p>
                    <?php endif; ?>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div><!-- /.col-md-3 -->
          <?php if($loop->iteration % 4 == 0): ?>
            <div class="clearfix"></div>
          <?php endif; ?>
          <?php if($loop->iteration % 2 == 0): ?>
            <!-- Add clearfix for only the sm viewport -->
            <div class="clearfix visible-sm-block"></div>
          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/contents/categories_page.blade.php ENDPATH**/ ?>