<?php

namespace App\Http\Controllers\Storefront;

use Carbon\Carbon;
use App\Category;
use App\Inventory;
use App\CategoryGroup;
use App\CategorySubGroup;
use App\Helpers\ListHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $term = $request->input('q');

        $products = Inventory::search($term)->where('active', 1)->get();

        $products = $products->unique(function ($item) {
            return $item['product_id'].$item['shop_id'];
        });

        $products->load([
                        'shop:id,slug,name,current_billing_plan,trial_ends_at,active',
                        'shop.config:shop_id,maintenance_mode',
                        'shop.activeSubscription',
                        'product:id,name,gtin,model_number'
                    ]);

        // Keep results only from active shops
        $products = $products->filter(function ($product) {
            $tShop = $product->shop;

            $result = $tShop && ($tShop->active == 1) && $tShop->hasAddress() &&
                    $tShop->hasPaymentMethods() && ! $tShop->isDown();

            if (! is_subscription_enabled()) {
                return $result;
            }

            return  $result &&
                    ($tShop->current_billing_plan !== Null) &&
                    (
                        (
                            ! $tShop->activeSubscription &&
                            $tShop->trial_ends_at == Null ||
                            $tShop->trial_ends_at > Carbon::now()
                        ) ||
                        (
                            $tShop->activeSubscription &&
                            (
                                $tShop->activeSubscription->ends_at === Null ||
                                $tShop->activeSubscription->ends_at > Carbon::now() ||
                                $tShop->activeSubscription->trial_ends_at !== Null &&
                                $tShop->activeSubscription->trial_ends_at > Carbon::now()
                            )
                        )
                    );
        });

        // Filter variants from same vendor
        $products = $products->unique(function ($item) {
            return $item['product_id'].$item['shop_id'];
        });

        $category = Null;

        if( $request->has('in')) {
            $category = Category::where('slug', $request->input('in'))->active()->firstOrFail();
            $listings = $category->listings()->available()->get();
            $products = $products->intersect($listings);
        }
        else if($request->has('insubgrp') && ($request->input('insubgrp') != 'all')){
            $category = CategorySubGroup::where('slug', $request->input('insubgrp'))->active()->firstOrFail();
            $listings = prepareFilteredListings($request, $category);
            $products = $products->intersect($listings);
        }
        else if($request->has('ingrp')){
            $category = CategoryGroup::where('slug', $request->input('ingrp'))->active()->firstOrFail();
            $listings = prepareFilteredListings($request, $category);
            $products = $products->intersect($listings);
        }

        $products = $products->where('stock_quantity', '>', 0)->where('available_from', '<=', Carbon::now());

        // Attributes for filters
        $brands = ListHelper::get_unique_brand_names_from_linstings($products);
        $priceRange = ListHelper::get_price_ranges_from_linstings($products);

        if($request->has('free_shipping')) {
            $products = $products->where('free_shipping', 1);
        }
        if($request->has('new_arrivals')) {
            $products = $products->where('created_at', '>', Carbon::now()->subDays(config('system.filter.new_arrival', 7)));
        }
        if($request->has('has_offers')) {
            $products = $products->where('offer_price', '>', 0)
            ->where('offer_start', '<', Carbon::now())
            ->where('offer_end', '>', Carbon::now());
        }

        if($request->has('sort_by')) {
            switch ($request->get('sort_by')) {
                case 'newest':
                    $products = $products->sortByDesc('created_at');
                    break;

                case 'oldest':
                    $products = $products->sortBy('created_at');
                    break;

                case 'price_acs':
                    $products = $products->sortBy('sale_price');
                    break;

                case 'price_desc':
                    $products = $products->sortByDesc('sale_price');
                    break;

                case 'best_match':
                default:
                    break;
            }
        }

        if($request->has('condition')) {
            $products = $products->whereIn('condition', array_keys($request->input('condition')));
        }

        if($request->has('price')) {
            $price = explode('-', $request->input('price'));
            $products = $products->where('sale_price', '>=', $price[0])->where('sale_price', '<=', $price[1]);
        }

        if($request->has('brand')) {
            $products = $products->whereIn('brand', array_keys($request->input('brand')));
        }

        $products = $products->paginate(config('system.view_listing_per_page', 16));

        $products->load(['product' => function($q) {
            $q->select('id')->with([
                'categories:id,name,slug,category_sub_group_id',
                'categories.subGroup:id,name,slug,category_group_id',
                'categories.subGroup.group:id,name,slug'
            ]);
        }, 'feedbacks:rating,feedbackable_id,feedbackable_type', 'images:path,imageable_id,imageable_type']);

        return view('search_results', compact('products', 'category', 'brands', 'priceRange'));
    }
}
