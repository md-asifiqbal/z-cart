<script type="text/javascript">
"use strict";

;(function($, window, document) {
    $("[data-link]").hide(); // hide the ajax functional button untill the page load completely

    $(document).ready(function(){
        $.ajaxSetup ({
            cache: false,
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token(), false); ?>"
            }
        });

        $("[data-link]").show(); // hide the ajax functional button untill the page load completely

        $('img').on('error', function(){
            $(this).hide();
        });

        // Adjust the category manu height with contents
        $('.menu-category-dropdown').mouseover(function() {
            var height = $(this).height();

            if(height > 491) {
                $('.category-section').css('min-height', height);
            }
        });

        initAppPlugins();

        // Activate the tab if the url has any #hash
        $('.nav a').on('show.bs.tab', function (e) {
            window.location = $(this).attr('href');
        });
        $(function () {
            var hash = window.location.hash;
            hash && $('ul.nav a[href="' + hash + '"]').tab('show');
        });

        // Confirmation for actions
        $('body').on('click', '.confirm', function(e) {
            e.preventDefault();

            var form = this.closest("form");
            var url = $(this).attr("href");

            var msg = $(this).data('confirm');
            if(!msg)
                msg = "<?php echo e(trans('theme.notify.are_you_sure'), false); ?>";

            $.confirm({
                title: "<?php echo e(trans('theme.confirmation'), false); ?>",
                content: msg,
                type: 'red',
                icon: 'fa fa-question-circle',
                class: 'flat',
                animation: 'scale',
                closeAnimation: 'scale',
                opacity: 0.5,
                buttons: {
                  'confirm': {
                      text: '<?php echo e(trans('theme.button.proceed'), false); ?>',
                      keys: ['enter'],
                      btnClass: 'btn-primary flat',
                      action: function () {
                        //Disable mouse pointer events and set wait cursor
                        // $('body').css("pointer-events", "none");
                        $('body').css("cursor", "wait");

                        if (typeof url != 'undefined') {
                            location.href = url;
                        }else if(form != null){
                            form.submit();
                            <?php echo $__env->make('layouts.notification', ['message' => trans('theme.notify.confirmed'), 'type' => 'success', 'icon' => 'check-circle'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        }
                        return true;
                      }
                  },
                  'cancel': {
                      text: '<?php echo e(trans('theme.button.cancel'), false); ?>',
                      btnClass: 'btn-default flat',
                      action: function () {
                        <?php echo $__env->make('layouts.notification', ['message' => trans('theme.notify.canceled'), 'type' => 'warning', 'icon' => 'times-circle'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      }
                  },
                }
            });
        });

        // Prevent the option if disabled
        $("#buy-now-btn").on("click", function(e) {
            if( $(this).attr('disabled') ) {
                e.preventDefault();
            }
            else {
                apply_busy_filter('body');
            }
        });

        // Item Quick View Modal
        $(".itemQuickView").on("click", function(e) {
            e.preventDefault();
            var url = $(this).attr('href');

            // Disable the modal on small screen
            var width = $(window).width();
            if(width < 830){
                window.location.href = url.replace("/quickView", "");
                return false;
            }

            apply_busy_filter('body');

            $.get(url, function(data) {
                remove_busy_filter('body');

                $('#quickViewModal').html(data).modal();

                //Initialize application plugins after ajax load the content
                if (typeof initAppPlugins == 'function') {
                    initAppPlugins();
                }
            });
        });

        // Main slider
        $('#ei-slider').eislideshow({
            animation           : 'center',
            autoplay            : true,
            slideshow_interval  : 5000,
        });

        // On checkout page
        // $('#shipping-address-checkbox').on('ifChecked', function() {
        //     $('#shipping-address').removeClass('hide');
        // });
        // $('#shipping-address-checkbox').on('ifUnchecked', function() {
        //     $('#shipping-address').addClass('hide');
        // });

        // View Switcher
        $("a.viewSwitcher").bind("click", function(e){
            e.preventDefault();
            if($(this).hasClass('btn-default')){
                //Aulter the active button
                $('.viewSwitcher').toggleClass('btn-primary btn-default');

                // Aulter the product widget view
                var product_list = $('.product-list .product');
                product_list.parent().toggleClass('col-md-12 col-md-3');
                product_list.toggleClass('product-list-view product-grid-view');

                // Change the action buttons
                $('.product-actions').toggleClass('btn-group');
                $('.product-actions a.btn-default, .product-actions a.btn-link').toggleClass('btn-sm');
                $('.product-actions a:first-child').toggleClass('btn-link btn-default');
            }
            return false;
        });
        // End View Switcher

        // FEEDBACK SYSTEM
        $('.feedback-stars span.star').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
            $(this).parent().children('span.star').each(function(e){
              if (e < onStar)
                $(this).addClass('rated');
              else
                $(this).removeClass('rated');
            });
        });

        $('.feedback-stars span.star').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var wrapper = $(this).parent();

            // Update the rating value
            wrapper.children('input.rating-value').val(onStar);

            wrapper.children('span.star').each(function(e){
                if (e < onStar){
                    $(this).addClass('rated');
                    $(this).children('i').removeClass('fa-star-o').addClass('fa-star');
                }
                else{
                    $(this).removeClass('rated');
                    $(this).children('i').removeClass('fa-star').addClass('fa-star-o');
                }
            });
            $(this).siblings('span.response').text($(this).data('title'));
        });
        //END FEEDBACK SYSTEM

        // DISPUTE FORM
        $('#disputeOpenModal input[name="order_received"]').on('ifChecked', function () {
            if ($(this).val() == 1) {
                $('#select_disputed_item, #return_goods_checkbox').removeClass('hidden').addClass('show');
                $('#select_disputed_item select#product_id').attr('required', 'required');
            }
            else{
                $('#select_disputed_item, #return_goods_checkbox').removeClass('show').addClass('hidden');
                $('#select_disputed_item select#product_id').removeAttr('required');
            }
        });
        $('#disputeOpenModal input#return_goods').on('ifChecked', function () {
            $('#return_goods_help_txt').removeClass('hidden').addClass('show');
        });
        $('#disputeOpenModal input#return_goods').on('ifUnchecked', function () {
            $('#return_goods_help_txt').removeClass('show').addClass('hidden');
        });
        //END DISPUTE FORM

        // Make recaptcha field required if exist
        var $recaptcha = document.querySelector('#g-recaptcha-response');
        if($recaptcha) {
            $recaptcha.setAttribute("required", "required");
        }

        // ADDRESS FORM MODAL
        $(".addressForm").on("click", function(e) {
            e.preventDefault();
            apply_busy_filter('body');

            var url = $(this).attr('href');
            $.get(url, function(data) {
                remove_busy_filter('body');
                $('#addressFormModal').html(data).modal();

                //Initialize application plugins after ajax load the content
                if (typeof initAppPlugins == 'function') {
                    initAppPlugins();
                }
            });
        });

        // Shop feedback
        $('.shop-rating-count').on('click', function(e) {
            $('ul.nav a[href="' + $(this).data('tab') + '"]').tab('show');
        });

    });

    //App plugins
    function initAppPlugins()
    {
        //Initialize validator
        $('#form, form[data-toggle="validator"]').validator({
            disable: false,
        });

        // $('.sc-add-to-cart').removeAttr('href').css('cursor', 'pointer').show();

        // Add-to-cart
        $(".sc-add-to-cart").on("click", function(e) {
            e.preventDefault();
            var item = $(this).closest('.sc-product-item');
            var qtt = item.find('input.product-info-qty-input').val();
            var shipTo = item.find('#shipTo').data('country');
            var shippingZoneId = item.find('input#shipping-zone-id').val();
            var shippingRateId = item.find('input#shipping-rate-id').val();
            var shipToCountryId = item.find('input#shipto-country-id').val();
            var shipToStateId = item.find('input#shipto-state-id').val();

            $.ajax({
                url: $(this).data('link'),
                type: 'POST',
                data: {
                    'shipTo' : shipTo,
                    'shippingZoneId' : shippingZoneId,
                    'shippingRateId' : shippingRateId,
                    'shipToCountryId' : shipToCountryId,
                    'shipToStateId' : shipToStateId,
                    'quantity': qtt ? qtt : 1
                },
                complete: function (xhr, textStatus) {
                    if(200 == xhr.status){
                        <?php echo $__env->make('layouts.notification', ['message' => trans('theme.notify.item_added_to_cart'), 'type' => 'success', 'icon' => 'check-circle'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        // Increase global cart item count by 1
                        increaseCartItem(1);
                    }
                    else if(404 == xhr.status){
                        <?php echo $__env->make('layouts.notification', ['message' => trans('theme.item_not_available'), 'type' => 'warning', 'icon' => 'info-circle'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    }
                    else if(444 == xhr.status){
                        <?php echo $__env->make('layouts.notification', ['message' => trans('theme.notify.item_added_already_in_cart'), 'type' => 'info', 'icon' => 'info-circle'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    }
                    else{
                        <?php echo $__env->make('layouts.notification', ['message' => trans('theme.notify.failed'), 'type' => 'warning', 'icon' => 'times-circle'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    }
                },
            });
        });

        // Bootstrap fixes
        $('[data-toggle="tooltip"]').tooltip();

              // Owl Carousel
        $('.product-carousel').owlCarousel({
            margin:5,
            nav:true,
            responsive:{
                0:{items:3},
                600:{items:4},
                1000:{items:6}
            }
        });
        $('.big-carousel').owlCarousel({
            margin:5,
            nav:true,
            responsive:{
                0:{items:2},
                600:{items:3},
                1000:{items:4}
            }
        });
        $('.small-carousel').owlCarousel({
            margin:5,
            nav:true,
            responsive:{
                0:{items:3},
                600:{items:7},
                1000:{items:11}
            }
        });
        // End Owl Carousel

        // i-Check plugin
        $('.i-check, .i-radio').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal',
        });
        $('.i-check-blue, .i-radio-blue').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue',
        });

        // SelectBoxIt
        $(".selectBoxIt").selectBoxIt();

        // jqzoom
        $('#jqzoom, #quickViewZoom').jqzoom({
            zoomType: 'standard',
            lens: true,
            preloadImages: false,
            alwaysOn: false,
            zoomWidth: 530,
            zoomHeight: 530,
            xOffset:0,
            yOffset: 0,
            position: 'left'
        });

        // summernote
        $('.summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
            ],
            focus: true,
            height: 90
        });

        //Datepicker
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd'
        });

        // Product qty field
        $(".product-info-qty-input").on('keyup', function() {
            var currentVal = parseInt($(this).val(), 10);
            var maxVal = parseInt($(this).data('max'), 10);
            if (!currentVal || currentVal == "" || currentVal == "NaN") currentVal = 1;
            else if(maxVal < currentVal) currentVal = maxVal;
            $(this).val(currentVal);
        });
        $(".product-info-qty-plus").on('click', function(e) {
            e.preventDefault();
            var node = $(this).prev(".product-info-qty-input");
            var currentVal = parseInt(node.val(), 10);

            if (!currentVal || currentVal == "" || currentVal == "NaN") currentVal = 0;
            if(node.data('max') > currentVal){
                node.val(currentVal + 1).change();
            }
            else{
                <?php echo $__env->make('layouts.notification', ['message' => trans('theme.notify.max_item_stock'), 'type' => 'warning', 'icon' => 'times-circle'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            }
        });
        $(".product-info-qty-minus").on('click', function(e) {
            e.preventDefault();
            var node = $(this).next(".product-info-qty-input");
            var currentVal = parseInt(node.val(), 10);
            if (currentVal == "NaN") currentVal = node.data('min');
            if (currentVal > node.data('min')){
                $(this).next(".product-info-qty-input").val(currentVal - 1).change();
            }
            else{
                <?php echo $__env->make('layouts.notification', ['message' => trans('theme.notify.minimum_order_qtt_reached'), 'type' => 'warning', 'icon' => 'times-circle'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            }
        });
        // END Product qty field

        // Address form
        $("#address_country_id").on('change', function() {
            var country = $(this).val();
            var state_node = $('#address_state_id');

            $.ajax({
              delay: 250,
              data: "id="+country,
              url: "<?php echo e(route('ajax.getCountryStates'), false); ?>",
              success: function(result){
                var data = '<option value=""><?php echo e(trans('theme.placeholder.state'), false); ?></option>';
                if(result.length !== 0){
                    data += $.map(result, function(val, id) {
                        return '<option value="'+id+'">'+val+'</option>';
                    })

                    state_node.attr('required', 'required');
                }
                else{
                    state_node.removeAttr('required');
                }

                state_node.html(data);

                state_node.trigger('change'); // Trigger the onchange event on state id
              }
            });
        });
        // END Address form
    }

    // Filters
    $("#price-slider").ionRangeSlider({
        hide_min_max: true,
        keyboard: true,
        min: <?php echo e($priceRange['min'] ?? 0, false); ?>,
        max: <?php echo e($priceRange['max'] ?? 5000, false); ?>,
        from: <?php echo e(Request::get('price') ? explode('-', Request::get('price'))[0] : $priceRange['min'] ?? 0, false); ?>,
        to: <?php echo e(Request::get('price') ? explode('-', Request::get('price'))[1] : $priceRange['max'] ?? 5000, false); ?>,
        step: 10,
        type: 'double',
        prefix: "<?php echo e(get_formated_currency_symbol() ?? '$', false); ?>",
        grid: true,
        onFinish: function (data) {
            var href = removeQueryStringParameter(window.location.href, 'price'); //Remove currect price
            window.location.href = getFormatedUrlStr(href, 'price='+ data.from + '-' + data.to);
        },
    });

    $('#filter_opt_sort').on('change', function(){
        var opt = $(this).attr('name');
        var href = removeQueryStringParameter(window.location.href, opt); //Remove currect sorting
        opt = opt + '=' + $(this).val();
        window.location.href = getFormatedUrlStr(href, opt);
    });
    $('.filter_opt_checkbox').on('ifChecked', function() {
        var opt = $(this).attr('name') + '=true';
        window.location.href = getFormatedUrlStr(window.location.href, opt);
    });
    $('.filter_opt_checkbox').on('ifUnchecked', function() {
        var opt = $(this).attr('name');
        var href = removeQueryStringParameter(window.location.href, 'page'); //Reset the pagination
        window.location.href = removeQueryStringParameter(href, opt);
    });

    $('.link-filter-opt').on('click', function(e){
        e.preventDefault();
        var href = window.location.href;
        var opt = $(this).data('name');

        // Removing all category, category grp and category sub-grp
        var cat = ["in", "insubgrp", "ingrp"];
        var a = cat.indexOf(opt);
        if(a !== -1){
            cat.forEach(function(s) {
                href = removeQueryStringParameter(href, s); //Remove currect filter
            });
        }
        else{
            href = removeQueryStringParameter(window.location.href, opt); //Remove currect filter
        }

        window.location.href = getFormatedUrlStr(href, opt+'='+ $(this).data('value'));
    });

    $('.clear-filter').on('click', function(e){
        e.preventDefault();
        window.location.href = removeQueryStringParameter(window.location.href, $(this).data('name')); //Remove the filter
    });

    $("#filterBtn").click(function(e){
        e.preventDefault();
        $(".category-filters").slideToggle();
    });

    // Helper functions
    function getFormatedUrlStr(sourceURL, opt) {
        var url = removeQueryStringParameter(sourceURL, 'page'); //Reset the pagination;
        if(url.indexOf('?') !== -1)
            return url + '&' + opt;

        return url + '?' + opt;
    }

    function removeQueryStringParameter(sourceURL, key) {
        var rtn = sourceURL.split("?")[0],
            param,
            params_arr = [],
            queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
        if (queryString !== "") {
            params_arr = queryString.split("&");
            for (var i = params_arr.length - 1; i >= 0; i -= 1) {
                param = params_arr[i].split("=")[0];
                if (param === key) {
                    params_arr.splice(i, 1);
                }
            }
            rtn = rtn + "?" + params_arr.join("&");
        }
        return rtn;
    }
}(window.jQuery, window, document));

// Helpers
function getFormatedValue(value = 0, dec = <?php echo e(config('system_settings.decimals', 2), false); ?>)
{
    value = value ? value : 0;
    return parseFloat(value).toFixed(dec);
}

function getFormatedPrice(value = 0, trim = true)
{
    var value = getFormatedValue(value);
    var arr = value.split(".");

    if(arr[1]) {
        value = arr[1] > 0 ? arr[0] + '<sup class="price-fractional">' + arr[1] + '</sup>' : arr[0];
    }

    return "<?php echo e(get_currency_prefix(), false); ?>" + value + "<?php echo e(get_currency_suffix(), false); ?>";
}

// Update global cart item count
function increaseCartItem(value = 1)
{
    return setCartItemCount(getCartItemCount() + value);
}
function decreaseCartItem(value = 1)
{
    return setCartItemCount(getCartItemCount() - value);
}
function getCartItemCount()
{
    return Number(jQuery("#globalCartItemCount").text());
}
function setCartItemCount(value = 0)
{
    jQuery('#globalCartItemCount').text(value);
    return;
}

function apply_busy_filter(dom = 'body') {
    jQuery(dom).addClass('busy');
    jQuery('#loading').show();
}
function remove_busy_filter(dom = 'body') {
    jQuery(dom).removeClass('busy');
    jQuery('#loading').hide();
}

 /*
 * Get result from PHP helper functions
 *
 * @param    {str} funcName The PHP function name will be called
 * @param    {mix} args arguments need to pass into the PHP function
 *
 * @return  {mix}
 */
function getFromPHPHelper(funcName, args = null)
{
    var url = "<?php echo e(route('helper.getFromPHPHelper'), false); ?>";
    var result = 0;
    jQuery.ajax({
        url: url,
        data: "funcName="+ funcName + "&args=" + args,
        async: false,
        success: function(v){
          result = v;
        }
    });
    return result;
}
</script><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/scripts/appjs.blade.php ENDPATH**/ ?>