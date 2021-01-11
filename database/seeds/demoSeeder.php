<?php

use Carbon\Carbon;

class demoSeeder extends BaseSeeder
{
    private $tinycount = 5;
    private $count = 15;
    private $longCount = 30;
    private $longLongCount = 50;
    private $veryLongCount = 150;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Role::class, $this->tinycount)->create();

        factory(App\User::class, 1)
            ->create([
                'id' => 2,
                'shop_id' => Null,
                'role_id' => \App\Role::ADMIN,
                'nice_name' => 'Admin',
                'name' => 'Admin User',
                'email' => 'admin@demo.com',
                'password' => bcrypt('123456'),
                'active' => 1,
            ])
            ->each(function($user){
                $user->dashboard()->save(factory(App\Dashboard::class)->make());

                $user->addresses()->save(
                    factory(App\Address::class)->make(['address_title' => $user->name, 'address_type' => 'Primary'])
                );
            });

        $this->call('VendorsSeeder');

        // Demo customers with real text
        // DB::table('customers')->insert([
        //     [
        //         'id' => 1,
        //         'nice_name' => 'CustomerOne',
        //         'name' => 'Customer One',
        //         'email' => 'customer1@demo.com',
        //         'sex' => 'app.male',
        //         'password' => bcrypt('123456'),
        //         'active' => 1,
        //         'created_at' => Carbon::Now(),
        //         'updated_at' => Carbon::Now(),
        //     ]
        // ]);
        // DB::table('addresses')->insert([
        //     [
        //         'address_type' => 'Primary',
        //         'addressable_type' => 'App\Customer',
        //         'addressable_id' => 1,
        //         'address_title' => 'Customer One',
        //         'state_id' => 1221,
        //         'country_id' => 840,
        //         'created_at' => Carbon::Now(),
        //         'updated_at' => Carbon::Now(),
        //     ],[
        //         'address_type' => 'Shipping',
        //         'addressable_type' => 'App\Customer',
        //         'addressable_id' => 1,
        //         'address_title' => 'Customer One',
        //         'state_id' => 1221,
        //         'country_id' => 840,
        //         'created_at' => Carbon::Now(),
        //         'updated_at' => Carbon::Now(),
        //     ],[
        //         'address_type' => 'Billing',
        //         'addressable_type' => 'App\Customer',
        //         'addressable_id' => 1,
        //         'address_title' => 'Billing Address',
        //         'state_id' => 1221,
        //         'country_id' => 840,
        //         'created_at' => Carbon::Now(),
        //         'updated_at' => Carbon::Now(),
        //     ]
        // ]);

        factory(App\Customer::class, 1)
            ->create([
                'id' => 1,
                'nice_name' => 'Customer',
                'name' => 'Customer Name',
                'email' => 'customer@demo.com',
                'password' => bcrypt('123456'),
                'sex' => 'app.male',
                'active' => 1,
            ])
            ->each(function($customer){
                $customer->addresses()->save(factory(App\Address::class)->make(['address_title' => $customer->name, 'address_type' => 'Primary']));
                $customer->addresses()->save(factory(App\Address::class)->make(['address_type' => 'Billing']));
                $customer->addresses()->save(factory(App\Address::class)->make(['address_type' => 'Shipping']));
            });

        // Demo Categories with real text
        $this->call('CategoryGroupsSeeder');

        $this->call('CategorySubGroupsSeeder');

        // factory(App\CategoryGroup::class, $this->count)->create();

        factory(App\CategorySubGroup::class, $this->count)->create();

        $this->call('CategoriesSeeder');

        factory(App\Category::class, $this->longCount)->create();

        factory(App\Manufacturer::class, $this->tinycount)->create();

        factory(App\Supplier::class, $this->tinycount)
            ->create()
            ->each(function($supplier){
                $supplier->addresses()->save(factory(App\Address::class)->make(['address_title' => $supplier->name, 'address_type' => 'Primary']));
            });

        $this->call('ProductsSeeder');

        // factory(App\Shop::class, $this->count)
        //     ->create()
        //     ->each(function($shop){
        //         $shop->addresses()->save(factory(App\Address::class)->make(['address_title' => $shop->name, 'address_type' => 'Primary']));
        //         $shop->config()->save(factory(App\Config::class)->make());
        //         $shop->shippingZones()->save(factory(App\ShippingZone::class)->make());
        //         $shop->shippingZones()->create(
        //             [
        //                 'name' => 'Worldwide',
        //                 'tax_id' => rand(1, 31),
        //                 'country_ids' => [],
        //                 'state_ids' => [],
        //                 'rest_of_the_world' => true,
        //                 'created_at' => Carbon::Now(),
        //                 'updated_at' => Carbon::Now(),
        //             ]
        //         );
        //     });

        factory(App\AttributeValue::class, $this->longCount)->create();

        factory(App\Warehouse::class, 1)->create()
            ->each(function($warehouse){
                $warehouse->addresses()->save(factory(App\Address::class)->make(['address_title' => $warehouse->name, 'address_type' => 'Primary']));
            });

        $shipping_zones   = \DB::table('shipping_zones')->pluck('id')->toArray();

        foreach ($shipping_zones as $zone) {
            factory(App\ShippingRate::class, $this->tinycount)->create([
                'shipping_zone_id' => $zone,
            ]);
        }

        factory(App\Tax::class, $this->tinycount)->create();

        factory(App\Carrier::class, $this->tinycount)->create();

        factory(App\Packaging::class, $this->tinycount)->create();

        $this->call('InventoriesSeeder');

        factory(App\Order::class, 7)->create();

        factory(App\Dispute::class, 2)->create();

        $this->call('BlogSeeder');

        factory(App\BlogComment::class, $this->longCount)->create();

        factory(App\Tag::class, $this->longCount)->create();

        // factory(App\GiftCard::class, $this->count)->create();

        factory(App\Coupon::class, $this->count)->create();

        factory(App\Message::class, $this->count)->create();

        factory(App\Ticket::class, $this->tinycount)->create();

        factory(App\Reply::class, $this->longCount)->create();

        //PIVOT TABLE SEEDERS
        $customers  = \DB::table('customers')->pluck('id')->toArray();
        $users      = \DB::table('users')->pluck('id')->toArray();
        $products   = \DB::table('products')->pluck('id')->toArray();
        $shops      = \DB::table('shops')->pluck('id')->toArray();
        $warehouses = \DB::table('warehouses')->pluck('id')->toArray();
        $categories = \DB::table('categories')->pluck('id')->toArray();
        $category_sub_groups = \DB::table('category_sub_groups')->pluck('id')->toArray();
        $attributes   = \DB::table('attributes')->pluck('id')->toArray();
        $coupons   = \DB::table('coupons')->pluck('id')->toArray();
        $inventories = \DB::table('inventories')->pluck('id')->toArray();

        $wire = \DB::table('payment_methods')->where('code', 'wire')->first()->id;
        $cod = \DB::table('payment_methods')->where('code', 'cod')->first()->id;
        // shop_payment_methods
        foreach ($shops as $shop) {
            DB::table('shop_payment_methods')->insert([
                [
                    'shop_id' => $shop,
                    'payment_method_id' => $cod,
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ], [
                    'shop_id' => $shop,
                    'payment_method_id' => $wire,
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            ]);

            DB::table('config_manual_payments')->insert([
                [
                    'shop_id' => $shop,
                    'payment_method_id' => $wire,
                    'additional_details' => 'Send the payment via Bank Wire Transfer.',
                    'payment_instructions' => 'Payment instructions for Bank Wire Transfer',
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ], [
                    'shop_id' => $shop,
                    'payment_method_id' => $cod,
                    'additional_details' => 'Our man will collect the payment when deliver the item to your doorstep.',
                    'payment_instructions' => 'Payment instructions for COD',
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            ]);
        }

        // attribute_inventory
        foreach ((range(1, $this->longCount)) as $index) {
            $attribute_id = $attributes[array_rand($attributes)];
            $attribute_values = \DB::table('attribute_values')->where('attribute_id', $attribute_id)->pluck('id')->toArray();
            if (empty($attribute_values)) continue;

            DB::table('attribute_inventory')->insert(
                [
                    'attribute_id' => $attribute_id,
                    'inventory_id' => $inventories[array_rand($inventories)],
                    'attribute_value_id' => $attribute_values[array_rand($attribute_values)],
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            );
        }

        // order_items
        $orders = DB::table('orders')->get();

        foreach ($orders as $order) {
            $inventories = \DB::table('inventories')->where('shop_id', $order->shop_id)->get()->toArray();
            $shipping_weight = 0;
            $item_count = 0;
            $shipping_qtt = 0;
            $total = 0;

            $temps = array_rand($inventories, rand(2,4));

            foreach ($temps as $temp) {
                $qtt = rand(1,3);
                DB::table('order_items')->insert([
                        'order_id' => $order->id,
                        'inventory_id' => $inventories[$temp]->id,
                        'item_description' => $inventories[$temp]->title . ' - ' .$inventories[$temp]->condition,
                        'quantity' => $qtt,
                        'unit_price' => $inventories[$temp]->sale_price,
                        'created_at' => Carbon::Now(),
                        'updated_at' => Carbon::Now(),
                    ]);

                $item_count++;
                $shipping_qtt += $qtt;
                $shipping_weight += $inventories[$temp]->shipping_weight * $qtt;
                $total += $inventories[$temp]->sale_price * $qtt;
            }

            $shipping = rand(1,9);
            // Update order with correct qtt and total
            DB::table('orders')->where('id', $order->id)->update([
                'item_count' => $item_count,
                'quantity' => $shipping_qtt,
                'shipping_weight' => $shipping_weight,
                'shipping' => $shipping,
                'total' => $total,
                'grand_total' => $shipping + $total,
            ]);
        }

        // Blog tags
        $blogs  = \DB::table('blogs')->pluck('id')->toArray();
        $tags   = \DB::table('tags')->pluck('id')->toArray();
        foreach ($blogs as $blog) {
            $z = rand(1,7);
            for ($i = 1; $i <= $z; $i++) {
                DB::table('taggables')->insert([
                        'tag_id' => $tags[array_rand($tags)],
                        'taggable_id' => $blog,
                        'taggable_type' => 'App\Blog',
                    ]);
            }
        }
        // category_category_sub_group
        // foreach ((range(1, $this->longLongCount)) as $index) {
        //     DB::table('category_category_sub_group')->insert(
        //         [
        //             'category_id' => $categories[array_rand($categories)],
        //             'category_sub_group_id' => $category_sub_groups[array_rand($category_sub_groups)],
        //             'created_at' => Carbon::Now(),
        //             'updated_at' => Carbon::Now(),
        //         ]
        //     );
        // }

        // category_product
        foreach ($products as $product) {
            foreach ((range(1, 2)) as $index) {
                DB::table('category_product')->insert(
                    [
                        'category_id' => $categories[array_rand($categories)],
                        'product_id' => $product,
                        'created_at' => Carbon::Now(),
                        'updated_at' => Carbon::Now(),
                    ]
                );
            }
        }

        // user_warehouse
        // foreach ((range(1, $this->longCount)) as $index) {
        //     DB::table('user_warehouse')->insert(
        //         [
        //             'warehouse_id' => $warehouses[array_rand($warehouses)],
        //             'user_id' => $users[array_rand($users)],
        //             'created_at' => Carbon::Now(),
        //             'updated_at' => Carbon::Now(),
        //         ]
        //     );
        // }

        // foreach ((range(1, 30)) as $index) {
        //     DB::table('taggables')->insert(
        //         [
        //             'tag_id' => rand(1, 20),
        //             'taggable_id' => rand(1, 20),
        //             'taggable_type' => rand(0, 1) == 1 ? 'App\Post' : 'App\Video'
        //         ]
        //     );
        // }

        // coupon_customers
        foreach ((range(1, $this->count)) as $index) {
            DB::table('coupon_customer')->insert(
                [
                    'coupon_id' => $coupons[array_rand($coupons)],
                    'customer_id' => $customers[array_rand($customers)],
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            );
        }

        // Frontend Seeder

        $this->call('SlidersSeeder');

        $this->call('BannersSeeder');

        factory(App\Wishlist::class, $this->count)->create();
        factory(App\Feedback::class, $this->longCount)->create();

        $this->call('EmailTemplateSeeder');

        // announcement seeder
        $deals = ['**Deal** of the day', 'Fashion accessories **deals**', 'Kids item **deals**', 'Black Friday **Deals**!', 'ONLY FOR TODAY:: **80% Off!**', 'Everyday essentials **deals**', '**Save** up to 40%', '**FLASH SALE ::** 20% **Discount** only for TODAY!!!'];
        DB::table('announcements')->insert(
            [
                'id' => '9e274a6b-1340-4862-8ca2-525331830725',
                'user_id' => 1,
                'body' => $deals[array_rand($deals)],
                'action_text' => 'Shop Now',
                'action_url' => '/',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        );

        // factory(App\Visitor::class, $this->longLongCount)->create();
    }
}
