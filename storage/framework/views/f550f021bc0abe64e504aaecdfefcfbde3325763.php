<!-- CONTENT SECTION -->
<div class="clearfix space20"></div>
<section>
	<div class="container">
        <div class="row row-col-border" data-gutter="60">
            <div class="col-md-9">
				<?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <article class="blog-post">
                        <?php if($blog->image): ?>
                            <a href="<?php echo e(route('blog.show', $blog->slug), false); ?>">
    				            <img class="full-width" src="<?php echo e(get_storage_file_url(optional($blog->image)->path, 'blog'), false); ?>" alt="<?php echo e($blog->title, false); ?>" title="<?php echo e($blog->title, false); ?>" />
                            </a>
                        <?php endif; ?>

                        <h1 class="blog-post-title"><a href="<?php echo e(route('blog.show', $blog->slug), false); ?>"><?php echo $blog->title; ?></a></h1>
                        <p class="blog-post-excerpt">
                            <?php echo \Illuminate\Support\Str::limit($blog->excerpt, 250); ?>

                            <a class="pull-right btn btn-link" href="<?php echo e(route('blog.show', $blog->slug), false); ?>"><?php echo e(trans('theme.button.read_more'), false); ?></a>
                        </p>

                        <ul class="blog-post-meta">
                            <li><?php echo e(trans('theme.published_at') . ' ' . $blog->published_at->diffForHumans(), false); ?></li>
                            <li>by <a href="<?php echo e(route('blog.author', $blog->user_id), false); ?>"><?php echo $blog->author->getName(); ?></a>
                            </li>
                        </ul>
                    </article>

                    <div class="clearfix space50"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="clearfix space50"></div>
                    <h3 class="text-center text-muted"><?php echo e(trans('theme.notify.nothing_found'), false); ?></h3>
				<?php endif; ?>

                <div class="text-center">
                    <?php echo e($blogs->links('layouts.pagination'), false); ?>

                </div>
            </div> <!-- /.col-md-9 -->

            <div class="col-md-3">
                <?php echo $__env->make('partials._blog_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div> <!-- /.col-md-3 -->
        </div>
		<div class="clearfix space50"></div>
  	</div><!-- /.container -->
</section><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/contents/blog_page.blade.php ENDPATH**/ ?>