<div class="category-filters-section">
    <h3><i class="fa fa-angle-left"></i>
        <?php if(Request::is('search')): ?>
            <a class="link-filter-opt" data-name="insubgrp" data-value="all">
        <?php else: ?>
            <a href="<?php echo e(route('categories'), false); ?>">
        <?php endif; ?>
        <?php echo app('translator')->getFromJson('theme.all_categories'); ?></a>
    </h3>
    <ul class="cateogry-filters-list">
        <?php if(Request::is('search')): ?>
            <li>
                <?php if(Request::has('ingrp')): ?>

                    <h4><?php echo e($category->name, false); ?></h4>
                    <?php
                        $t_categories = $products->pluck('product.categories')->flatten()->unique();
                        $t_categories = $t_categories->pluck('subGroup.slug')->flatten()->unique()->toArray();
                    ?>
                    <ul>
                        <?php $__currentLoopData = $category->subGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array($category->slug, $t_categories)): ?>
                                <li>
                                    <a class="link-filter-opt" data-name="insubgrp" data-value="<?php echo e($category->slug, false); ?>">
                                        <?php echo e($category->name, false); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                <?php elseif(Request::has('insubgrp') && Request::get('insubgrp') != 'all'): ?>

                    <?php
                        $t_categories = $products->pluck('product.categories')->flatten()->unique();
                        $t_categories = $t_categories->pluck('slug')->flatten()->unique()->toArray();
                    ?>

                    <h4>
                        <i class="fa fa-angle-left"></i>
                        <a class="link-filter-opt" data-name="ingrp" data-value="<?php echo e($category->group->slug, false); ?>">
                            <?php echo e($category->group->name, false); ?>

                        </a>
                    </h4>
                    <h4>
                        <i class="fa fa-angle-left"></i>
                        <a class="link-filter-opt" data-name="ingrp" data-value="<?php echo e($category->slug, false); ?>">
                            <?php echo e($category->name, false); ?>

                        </a>
                    </h4>

                    <ul>
                        <?php $__currentLoopData = $category->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array($category->slug, $t_categories)): ?>
                                <li>
                                    <a class="link-filter-opt" data-name="in" data-value="<?php echo e($category->slug, false); ?>">
                                        <?php echo e($category->name, false); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                <?php elseif(Request::has('in')): ?>

                    <h4>
                        <i class="fa fa-angle-left"></i>
                        <a class="link-filter-opt" data-name="ingrp" data-value="<?php echo e($category->subGroup->group->slug, false); ?>">
                            <?php echo e($category->subGroup->group->name, false); ?>

                        </a>
                    </h4>
                    <h4>
                        <i class="fa fa-angle-left"></i>
                        <a class="link-filter-opt" data-name="insubgrp" data-value="<?php echo e($category->subGroup->slug, false); ?>">
                            <?php echo e($category->subGroup->name, false); ?>

                        </a>
                    </h4>

                    <ul>
                        <li><?php echo e($category->name, false); ?></li>
                    </ul>

                <?php else: ?>

                    <?php
                        $t_categories = $products->pluck('product.categories')->flatten()->unique();
                        $t_categories = $t_categories->pluck('subGroup.group')->flatten()->unique();
                    ?>

                    <?php $__currentLoopData = $t_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a class="link-filter-opt" data-name="ingrp" data-value="<?php echo e($category->slug, false); ?>">
                                <?php echo e($category->name, false); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </li>
        <?php elseif(Request::is('categorygrp/*')): ?>
            <li>
                <h4><?php echo e($categoryGroup->name, false); ?></h4>
                <ul>
                    <?php $__currentLoopData = $categoryGroup->subGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($category->categories->count()): ?>
                            <li><a href="<?php echo e(route('categories.browse', $category->slug), false); ?>"><?php echo e($category->name, false); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php elseif(Request::is('categories/*')): ?>
            <li>
                <h4>
                    <i class="fa fa-angle-left"></i>
                    <a href="<?php echo e(route('categoryGrp.browse', $categorySubGroup->group->slug), false); ?>">
                        <?php echo e($categorySubGroup->group->name, false); ?>

                    </a>
                </h4>
                <h4><?php echo e($categorySubGroup->name, false); ?></h4>
                <ul>
                    <?php $__currentLoopData = $categorySubGroup->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('category.browse', $category->slug), false); ?>"><?php echo e($category->name, false); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php elseif(Request::is('category/*')): ?>
            <li>
                <h4>
                    <i class="fa fa-angle-left"></i>
                    <a href="<?php echo e(route('categoryGrp.browse', $category->subGroup->group->slug), false); ?>">
                        <?php echo e($category->subGroup->group->name, false); ?>

                    </a>
                </h4>
                <h4>
                    <i class="fa fa-angle-left"></i>
                    <a href="<?php echo e(route('categories.browse', $category->subGroup->slug), false); ?>">
                        <?php echo e($category->subGroup->name, false); ?>

                    </a>
                </h4>
                <h4><?php echo e($category->name, false); ?></h4>
            </li>
        <?php else: ?>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('category.browse', $category->slug), false); ?>"><?php echo e($category->name, false); ?>

                        
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>
</div>
<?php /**PATH /home/amraibes/public_html/public/themes/default/views/partials/_categories_filter.blade.php ENDPATH**/ ?>