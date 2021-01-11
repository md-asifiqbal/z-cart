<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active"><a href="#benefits" aria-controls="benefits" role="tab" data-toggle="tab"><?php echo e(trans('theme.benefits'), false); ?></a></li>
                <li role="presentation"><a href="#howItWorks" aria-controls="howItWorks" role="tab" data-toggle="tab"><?php echo e(trans('theme.how_it_works'), false); ?></a></li>
                <?php if(is_subscription_enabled()): ?>
                    <li role="presentation"><a href="#pricing" aria-controls="pricing" role="tab" data-toggle="tab"><?php echo e(trans('theme.pricing'), false); ?></a></li>
                <?php endif; ?>
                <li role="presentation"><a href="#faqs" aria-controls="faqs" role="tab" data-toggle="tab"><?php echo e(trans('theme.faq'), false); ?></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="benefits">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading"><?php echo e(trans('theme.benefits'), false); ?></h2>
                            <h3 class="section-subheading text-muted"><?php echo e(trans('messages.merchant_benefits'), false); ?></h3>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-<?php echo e(trans('theme.benefit.one.icon'), false); ?> fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="service-heading"><?php echo e(trans('theme.benefit.one.title'), false); ?></h4>
                            <p class="text-muted"><?php echo e(trans('theme.benefit.one.detail'), false); ?></p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-<?php echo e(trans('theme.benefit.two.icon'), false); ?> fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="service-heading"><?php echo e(trans('theme.benefit.two.title'), false); ?></h4>
                            <p class="text-muted"><?php echo e(trans('theme.benefit.two.detail'), false); ?></p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-<?php echo e(trans('theme.benefit.three.icon'), false); ?> fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="service-heading"><?php echo e(trans('theme.benefit.three.title'), false); ?></h4>
                            <p class="text-muted"><?php echo e(trans('theme.benefit.three.detail'), false); ?></p>
                        </div>
                    </div>
				</div>
                <!--  .tabpanel -->

                <div role="tabpanel" class="tab-pane" id="howItWorks">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading"><?php echo e(trans('theme.how_it_works'), false); ?></h2>
                            <h3 class="section-subheading text-muted"><?php echo e(trans('messages.how_the_marketplace_works'), false); ?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-image">
                                        <img class="img-circle img-responsive" src="<?php echo e(selling_theme_asset_url('img/step_1.png'), false); ?>" alt="">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4>&nbsp;</h4>
                                            <h4 class="subheading"><?php echo e(trans('theme.how_it_work_steps.step_1.title'), false); ?></h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="text-muted"><?php echo trans('theme.how_it_work_steps.step_1.detail'); ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-image">
                                        <img class="img-circle img-responsive" src="<?php echo e(selling_theme_asset_url('img/step_2.png'), false); ?>" alt="">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4>&nbsp;</h4>
                                            <h4 class="subheading"><?php echo e(trans('theme.how_it_work_steps.step_2.title'), false); ?></h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="text-muted"><?php echo trans('theme.how_it_work_steps.step_2.detail'); ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-image">
                                        <img class="img-circle img-responsive" src="<?php echo e(selling_theme_asset_url('img/step_3.png'), false); ?>" alt="">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4>&nbsp;</h4>
                                            <h4 class="subheading"><?php echo e(trans('theme.how_it_work_steps.step_3.title'), false); ?></h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="text-muted"><?php echo trans('theme.how_it_work_steps.step_3.detail'); ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-image">
                                        <img class="img-circle img-responsive" src="<?php echo e(selling_theme_asset_url('img/step_4.png'), false); ?>" alt="">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4>&nbsp;</h4>
                                            <h4 class="subheading"><?php echo e(trans('theme.how_it_work_steps.step_4.title'), false); ?></h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="text-muted"><?php echo trans('theme.how_it_work_steps.step_4.detail'); ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-image">
                                        <h4><?php echo trans('theme.how_it_work_steps.ending'); ?></h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--  .tabpanel -->

                <?php if(is_subscription_enabled()): ?>
                    <div role="tabpanel" class="tab-pane" id="pricing">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h2 class="section-heading"><?php echo e(trans('theme.pricing'), false); ?></h2>
                                <h3 class="section-subheading text-muted"><?php echo e(trans('messages.choose_subscription'), false); ?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class='pricing pricing-palden'>
                                <?php $__currentLoopData = $subscription_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class='pricing-item <?php echo e($plan->featured ? "pricing__item--featured" : "", false); ?>'>
                                      <div class='pricing-deco'>
                                        <svg class='pricing-deco-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                                          <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;   c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                          <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;  c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                          <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;  H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                          <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;   c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                                        </svg>

                                        <?php if($plan->cost == 0): ?>
                                            <div class='pricing-price'><?php echo e(__('theme.free'), false); ?></div>
                                        <?php else: ?>
                                            <div class='pricing-price'><span class='pricing-currency'>
                                                <?php echo e(config('system_settings.currency.symbol'), false); ?></span><?php echo e(get_formated_decimal($plan->cost), false); ?><span class='pricing-period'><?php echo e(__('theme.per_month'), false); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <h3 class='pricing-title'><?php echo e($plan->name, false); ?></h3>
                                      </div>

                                      <?php if($plan->best_for): ?>
                                        <p class='pricing-for'><?php echo e($plan->best_for, false); ?></p>
                                      <?php endif; ?>

                                      <ul class='pricing-feature-list'>
                                        <li class='pricing-feature'><?php echo e(__('theme.plan.team_size', ['size' => $plan->team_size]), false); ?></li>
                                        <li class='pricing-feature'><?php echo e(__('theme.plan.inventory_limit', ['limit' => $plan->inventory_limit]), false); ?></li>

                                        <?php if($plan->transaction_fee > 0 && $plan->marketplace_commission > 0): ?>

                                            <li class='pricing-feature'><?php echo e(__('theme.plan.transaction_and_commission', ['commission' => $plan->marketplace_commission, 'fee' => get_formated_currency($plan->transaction_fee)]), false); ?></li>

                                        <?php else: ?>

                                            <?php if($plan->transaction_fee > 0): ?>
                                                <li class='pricing-feature'><?php echo e(__('theme.plan.transaction_fee', ['fee' => get_formated_currency($plan->transaction_fee)]), false); ?></li>
                                            <?php else: ?>
                                                <li class='pricing-feature'><?php echo e(__('theme.plan.no_transaction_fee'), false); ?></li>
                                            <?php endif; ?>

                                            <?php if($plan->marketplace_commission > 0): ?>
                                                <li class='pricing-feature'><?php echo e(__('theme.plan.marketplace_commission', ['commission' => $plan->marketplace_commission]), false); ?></li>
                                            <?php else: ?>
                                                <li class='pricing-feature'><?php echo e(__('theme.plan.no_marketplace_commission'), false); ?></li>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                      </ul>
                                      <a href="<?php echo e(route('register', $plan), false); ?>" class='pricing-action'><?php echo e(__('theme.button.choose_plan'), false); ?></a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <!--  .tabpanel -->
                <?php endif; ?>

                <div role="tabpanel" class="tab-pane" id="faqs">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading"><?php echo e(trans('theme.faq'), false); ?></h2>
                            <h3 class="section-subheading text-muted"><?php echo e(trans('messages.faqs'), false); ?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-group" id="accordion">
                            <?php $__currentLoopData = $faqTopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="faqHeader"><?php echo e($topic->name, false); ?></div>
                                <div class="panel panel-default">
                                    <?php $__currentLoopData = $topic->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#faq-<?php echo e($faq->id, false); ?>"><?php echo $faq->question; ?></a>
                                            </h4>
                                        </div>
                                        <div id="faq-<?php echo e($faq->id, false); ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?php echo $faq->answer; ?>

                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php if (! ($loop->last)): ?>
                                    <br/>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <!--  .tabpanel -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibest.com/public_html/public/themes/_selling/default/views/index.blade.php ENDPATH**/ ?>