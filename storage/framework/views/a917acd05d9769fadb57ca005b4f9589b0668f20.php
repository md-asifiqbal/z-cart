<!-- CONTENT SECTION -->
<div class="clearfix space20"></div>
<section>
	<div class="container">
        <div class="row row-col-border" data-gutter="60">
            <div class="col-md-9">
                <article class="blog-post">
                    <?php if($blog->image): ?>
			            <img class="full-width" src="<?php echo e(get_storage_file_url(optional($blog->image)->path, 'full'), false); ?>" alt="<?php echo e($blog->title, false); ?>" title="<?php echo $blog->title; ?>" />
                    <?php endif; ?>

                    <h1 class="blog-post-title"><?php echo $blog->title; ?></h1>

                    <ul class="blog-post-meta">
                        <li><?php echo e(trans('theme.published_at') . ' ' . $blog->published_at->diffForHumans(), false); ?></li>
                        <li><?php echo e(trans('theme.by'), false); ?> <a href="<?php echo e(route('blog.author', $blog->user_id), false); ?>"><?php echo $blog->author->getName(); ?></a>
                        </li>
                    </ul>

                    <p class="blog-post-body">
                        <?php echo $blog->content; ?>

                    </p>
                </article>

                <!--
                <hr class="style3"/>
                <h3 class="widget-title">Leave a Comment</h3>
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name *</label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>E-mail *</label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Website</label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Comment</label>
                        <textarea class="form-control"></textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Leave a Comment" />
                </form>
                <div class="gap gap-small"></div>
                <hr />

                <h3 class="widget-title">8 Comments</h3>

                <ul class="comments-list">
                    <?php $__currentLoopData = $blog->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <article class="comment">
                                <div class="comment-author">
                                    <img src="img/70x70.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <div class="comment-inner"><span class="comment-author-name"><?php echo e($comment->author->getName(), false); ?></span>
                                    <p class="comment-content">
                                        <span><?php echo $comment->content; ?></span>
                                        <span class="comment-time"><?php echo e($comment->created_at->diffForHumans(), false); ?></span>
                                    </p>
                                </div>
                            </article>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                 END COMMENTS -->

                <div class="clearfix space50"></div>
            </div> <!-- /.col-md-9 -->

            <div class="col-md-3">
                <?php echo $__env->make('partials._blog_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div> <!-- /.col-md-3 -->
        </div>
		<div class="clearfix space50"></div>
  	</div><!-- /.container -->
</section><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/contents/blog_single.blade.php ENDPATH**/ ?>