<?php
    $SEOurl = url()->current();
    $SEOtitle = $title ?? get_platform_title();
    $SEOdescription = config('seo.meta.description');
    $SEOimage = filter_var(config('seo.meta.image'), FILTER_VALIDATE_URL) ? config('seo.meta.image') : get_storage_file_url('logo.png', 'full');
    $SEOkeywords = config('seo.meta.keywords');

    // For Products
    if(isset($item)) {
        $SEOtitle = $item->meta_title ?? $item->title;
        $SEOdescription = $item->meta_description ?? substr($item->description, 0, config('seo.meta.description_character_limit', 160));
        $SEOimage = get_product_img_src($item, 'full');
        $SEOkeywords = implode(', ', $item->tags->pluck('name')->toArray());
    }
    // For Categories
    elseif(Request::is('categories/*') || Request::is('categorygrp/*') || Request::is('category/*')) {
        $category = $category ?? $categorySubGroup ?? $categoryGroup;
        $SEOtitle = $category->meta_title ?? $SEOtitle;
        $SEOdescription = $category->meta_description ?? $SEOdescription;
    }
    // For blogs
    elseif(isset($blog)) {
        $SEOtitle = $blog->title;
        $SEOdescription = substr($blog->excerpt, 0, config('seo.meta.description_character_limit', 160));
        $SEOimage = get_storage_file_url(optional($blog->image)->path, 'blog');
        $SEOkeywords = implode(', ', $blog->tags->pluck('name')->toArray());
    }
    // For pages
    elseif(isset($page)) {
        $SEOtitle = $page->title;
        $SEOdescription = substr($page->content, 0, config('seo.meta.description_character_limit', 160));
        $SEOimage = get_storage_file_url(optional($page->image)->path, 'page');
        // $SEOkeywords = implode(', ', $page->tags->pluck('name')->toArray());
    }

    $SEOtitle = strip_tags($SEOtitle);
    $SEOdescription = strip_tags($SEOdescription);
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, shrink-to-fit=no">
<meta name="author" content="Incevio | incevio.com">
<meta name="format-detection" content="telephone=no">

<?php if(config('seo.enabled')): ?>
    <!-- Standard SEO -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="referrer" content="<?php echo e($referrer ?? config('seo.meta.referrer'), false); ?>">
    <meta name="robots" content="<?php echo e($robots ?? config('seo.meta.robots'), false); ?>">
    <meta name="revisit-after" content="<?php echo e(config('seo.meta.revisit_after', '7 days'), false); ?>" />
    <meta name="description" content="<?php echo $SEOdescription; ?>">
    <meta name="image" content="<?php echo e($SEOimage, false); ?>">
    <meta name="keywords" content="<?php echo $SEOkeywords; ?>">

    <!-- Geo loacation -->
    <?php if(config('seo.meta.geo_region') !== ''): ?>
        <meta name="geo.region" content="<?php echo e(config('seo.meta.geo_region'), false); ?>">
        <meta name="geo.placename" content="<?php echo e(config('seo.meta.geo_region'), false); ?>">
    <?php endif; ?>
    <?php if(config('seo.meta.geo_position') !== ''): ?>
        <meta name="geo.position" content="<?php echo e(config('seo.meta.geo_position'), false); ?>">
        <meta name="ICBM" content="<?php echo e(config('seo.meta.geo_position'), false); ?>">
    <?php endif; ?>

    <!-- Dublin Core basic info -->
    <meta name="dcterms.Format" content="text/html">
    <meta name="dcterms.Type" content="text/html">
    <meta name="dcterms.Language" content="<?php echo e(config('app.locale'), false); ?>">
    <meta name="dcterms.Identifier" content="<?php echo e($SEOurl, false); ?>">
    <meta name="dcterms.Relation" content="<?php echo e(get_platform_title(), false); ?>">
    <meta name="dcterms.Publisher" content="<?php echo e(get_platform_title(), false); ?>">
    <meta name="dcterms.Coverage" content="<?php echo e($SEOurl, false); ?>">
    <meta name="dcterms.Contributor" content="<?php echo e($author ?? get_platform_title(), false); ?>">
    <meta name="dcterms.Title" content="<?php echo $SEOtitle; ?>">
    <meta name="dcterms.Subject" content="<?php echo $SEOkeywords; ?>">
    <meta name="dcterms.Description" content="<?php echo $SEOdescription; ?>">

    <!-- Facebook OpenGraph -->
    <meta property="og:locale" content="<?php echo e(config('app.locale'), false); ?>">
    <meta property="og:url" content="<?php echo e($SEOurl, false); ?>">
    <meta property="og:site_name" content="<?php echo e(get_platform_title(), false); ?>">
    <meta property="og:title" content="<?php echo $SEOtitle; ?>">
    <meta property="og:description" content="<?php echo $SEOdescription; ?>">

    <?php if(isset($item)): ?>

        <meta property="og:type" content="product">
        <meta name="product:availability" content="<?php echo e($item->stock_quantity > 0 ? trans('theme.in_stock') : trans('theme.out_of_stock'), false); ?>">
        <meta name="product:price:currency" content="<?php echo e(get_system_currency(), false); ?>">
        <meta name="product:price:amount" content="<?php echo get_formated_currency($item->currnt_sale_price(), config('system_settings.decimals', 2)); ?>">
        <meta name="product:brand" content="<?php echo $item->product->manufacturer->name; ?>">

        <?php
            $item_images = $item->images->count() ? $item->images : $item->product->images;

            if(isset($variants)){
                // Remove images of current items from the variants imgs
                $other_images = $variants->pluck('images')->flatten(1)->filter(
                    function ($value, $key) use ($item) {
                        return $value->imageable_id != $item->id;
                    });
                $item_images = $item_images->concat($other_images);
            }
        ?>

        <?php $__currentLoopData = $item_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!$img->path) continue; ?>

            <meta property="og:image" content="<?php echo e(get_storage_file_url($img->path, 'full'), false); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php else: ?>

        <meta property="og:type" content="<?php echo e('website', false); ?>">
        <meta property="og:image" content="<?php echo e($SEOimage, false); ?>">

    <?php endif; ?>

    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    <?php if(config('seo.meta.video') !== ''): ?>
        <meta name="og:video" content="<?php echo e($video ?? config('seo.meta.video'), false); ?>">
    <?php endif; ?>

    <?php if(config('seo.meta.fb_app_id') !== ''): ?>
        <meta property="fb:app_id" content="<?php echo e(config('seo.meta.fb_app_id'), false); ?>"/>
    <?php endif; ?>

    <!-- Twitter Card -->
    <meta name="twitter:title" content="<?php echo $SEOtitle; ?>">
    <meta name="twitter:description" content="<?php echo $SEOdescription; ?>">
    <meta name="twitter:image" content="<?php echo e($SEOimage, false); ?>">
    <meta name="twitter:image:alt" content="<?php echo $SEOtitle; ?>">

    <?php if(isset($item)): ?>
        <meta name="twitter:card" content="product">
        <meta name="twitter:label1" content="price">
        <meta name="twitter:data1" content="<?php echo get_formated_currency($item->currnt_sale_price(), config('system_settings.decimals', 2)); ?>">
        <meta name="twitter:label2" content="availability">
        <meta name="twitter:data2" content="<?php echo e($item->stock_quantity > 0 ? trans('theme.in_stock') : trans('theme.out_of_stock'), false); ?>">
        <meta name="twitter:label3" content="currency">
        <meta name="twitter:data3" content="<?php echo e(get_system_currency(), false); ?>">
        <meta name="twitter:label4" content="brand">
        <meta name="twitter:data4" content="<?php echo $item->product->manufacturer->name; ?>">
        <meta name="twitter:label4" content="seller">
        <meta name="twitter:data4" content="<?php echo $item->shop->name; ?>">

    <?php elseif(config('seo.meta.twitter_card') !== ''): ?>
        <meta name="twitter:card" content="<?php echo e(config('seo.meta.twitter_card'), false); ?>">
    <?php endif; ?>

    <?php if(config('seo.meta.twitter_site') !== ''): ?>
        <meta name="twitter:site" content="<?php echo e(config('seo.meta.twitter_site'), false); ?>">
    <?php endif; ?>

    <?php if(isset($item)): ?>
        <!-- Microdata Product Page-->
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "Product",
                "name": "<?php echo $SEOtitle; ?>",
                "description": "<?php echo $SEOdescription; ?>",
                "image": "<?php echo $SEOimage; ?>",
                "brand": {
                    "@type": "Brand",
                    "name": "<?php echo $item->product->manufacturer->name; ?>"
                },
                "sku" : "<?php echo e($item->sku, false); ?>",
                <?php if($item->product->gtin_type && $item->product->gtin ): ?>
                    "<?php echo e($item->product->gtin_type, false); ?>": "<?php echo e($item->product->gtin, false); ?>",
                <?php endif; ?>
                "offers": {
                    "@type": "Offer",
                    "url": "<?php echo e($SEOurl, false); ?>",
                    "availability": "http://schema.org/InStock",
                    "priceCurrency": "<?php echo e(get_system_currency(), false); ?>",
                    "price": "<?php echo get_formated_decimal($item->currnt_sale_price(), true, config('system_settings.decimals', 2)); ?>"
                },
                <?php if($item->feedbacks_count > 0): ?>
                "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": "<?php echo e(get_formated_decimal($item->feedbacks->avg('rating'), true , 1), false); ?>",
                    "bestRating": "5",
                    "worstRating": "1",
                    "reviewCount": "<?php echo e($item->feedbacks_count, false); ?>"
                }
                <?php endif; ?>
            }
        </script>
    <?php endif; ?>

<?php endif; ?>

<title><?php echo $SEOtitle; ?></title>
<link rel="icon" href="<?php echo e(get_storage_file_url('icon.png', 'full'), false); ?>" type="image/x-icon" />
<link rel="manifest" href="<?php echo e(asset('site.webmanifest'), false); ?>">
<link rel="apple-touch-icon" href="<?php echo e(get_storage_file_url('icon.png', 'full'), false); ?>">
<?php /**PATH /home/amraibes/public_html/resources/views/meta.blade.php ENDPATH**/ ?>