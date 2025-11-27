<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddForeignKeysToAllTables extends Migration
{
    public function up()
    {
        // Convert integer FK columns to unsigned BIGINT to match $table->id() (unsignedBigInteger) columns
        $tablesAndCols = [
            'products' => ['category_id', 'sub_category_id'],
            'sub_categories' => ['category_id'],
            'product_variants' => ['product_id'],
            'cart_items' => ['cart_id', 'product_id', 'variant_id'],
            'carts' => ['user_id'],
            'shipping_addresses' => ['user_id'],
            'orders' => ['user_id', 'shipping_address_id', 'coupon_id'],
            'order_items' => ['order_id', 'product_id', 'variant_id'],
            'payments' => ['order_id'],
            'wishlists' => ['user_id', 'product_id'],
        ];

        foreach ($tablesAndCols as $table => $cols) {
            if (! Schema::hasTable($table)) continue;
            foreach ($cols as $col) {
                if (! Schema::hasColumn($table, $col)) continue;
                // alter only if current type is not already BIGINT UNSIGNED
                // Use raw SQL to avoid requiring doctrine/dbal
                $sql = sprintf(
                    'ALTER TABLE `%s` MODIFY `%s` BIGINT UNSIGNED %s;',
                    $table,
                    $col,
                    // keep NULLability if column allows NULL
                    (DB::selectOne("SELECT IS_NULLABLE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ?", [$table, $col])->IS_NULLABLE === 'YES') ? 'NULL' : 'NOT NULL'
                );
                DB::statement($sql);
            }
        }

        // Now add foreign keys as before
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id', 'fk_products_category')->references('id')->on('categories')->onDelete('restrict');
            $table->foreign('sub_category_id', 'fk_products_sub_category')->references('id')->on('sub_categories')->onDelete('restrict');
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->foreign('product_id', 'fk_product_images_product')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->foreign('product_id', 'fk_product_variants_product')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('reviews', function (Blueprint $table) {
            if (Schema::hasColumn('reviews', 'product_id')) {
                $table->foreign('product_id', 'fk_reviews_product')->references('id')->on('products')->onDelete('cascade');
            }
            if (Schema::hasColumn('reviews', 'user_id')) {
                $table->foreign('user_id', 'fk_reviews_user')->references('id')->on('users')->onDelete('cascade');
            }
        });

        Schema::table('carts', function (Blueprint $table) {
            if (Schema::hasColumn('carts', 'user_id')) {
                $table->foreign('user_id', 'fk_carts_user')->references('id')->on('users')->onDelete('set null');
            }
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->foreign('cart_id', 'fk_cart_items_cart')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('product_id', 'fk_cart_items_product')->references('id')->on('products')->onDelete('restrict');
            if (Schema::hasColumn('cart_items', 'variant_id')) {
                $table->foreign('variant_id', 'fk_cart_items_variant')->references('id')->on('product_variants')->onDelete('set null');
            }
        });

        Schema::table('shipping_addresses', function (Blueprint $table) {
            if (Schema::hasColumn('shipping_addresses', 'user_id')) {
                $table->foreign('user_id', 'fk_shipping_addresses_user')->references('id')->on('users')->onDelete('cascade');
            }
        });

        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'user_id')) {
                $table->foreign('user_id', 'fk_orders_user')->references('id')->on('users')->onDelete('set null');
            }
            if (Schema::hasColumn('orders', 'shipping_address_id')) {
                $table->foreign('shipping_address_id', 'fk_orders_shipping')->references('id')->on('shipping_addresses')->onDelete('set null');
            }
            if (Schema::hasColumn('orders', 'coupon_id')) {
                $table->foreign('coupon_id', 'fk_orders_coupon')->references('id')->on('coupons')->onDelete('set null');
            }
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->foreign('order_id', 'fk_order_items_order')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id', 'fk_order_items_product')->references('id')->on('products')->onDelete('restrict');
            if (Schema::hasColumn('order_items', 'variant_id')) {
                $table->foreign('variant_id', 'fk_order_items_variant')->references('id')->on('product_variants')->onDelete('set null');
            }
        });

        Schema::table('payments', function (Blueprint $table) {
            if (Schema::hasColumn('payments', 'order_id')) {
                $table->foreign('order_id', 'fk_payments_order')->references('id')->on('orders')->onDelete('cascade');
            }
        });

        Schema::table('wishlists', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_wishlists_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id', 'fk_wishlists_product')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('fk_products_category');
            $table->dropForeign('fk_products_sub_category');
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->dropForeign('fk_product_images_product');
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropForeign('fk_product_variants_product');
        });

        Schema::table('reviews', function (Blueprint $table) {
            if (Schema::hasColumn('reviews', 'product_id')) $table->dropForeign('fk_reviews_product');
            if (Schema::hasColumn('reviews', 'user_id')) $table->dropForeign('fk_reviews_user');
        });

        Schema::table('carts', function (Blueprint $table) {
            if (Schema::hasColumn('carts', 'user_id')) $table->dropForeign('fk_carts_user');
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign('fk_cart_items_cart');
            $table->dropForeign('fk_cart_items_product');
            if (Schema::hasColumn('cart_items', 'variant_id')) $table->dropForeign('fk_cart_items_variant');
        });

        Schema::table('shipping_addresses', function (Blueprint $table) {
            if (Schema::hasColumn('shipping_addresses', 'user_id')) $table->dropForeign('fk_shipping_addresses_user');
        });

        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'user_id')) $table->dropForeign('fk_orders_user');
            if (Schema::hasColumn('orders', 'shipping_address_id')) $table->dropForeign('fk_orders_shipping');
            if (Schema::hasColumn('orders', 'coupon_id')) $table->dropForeign('fk_orders_coupon');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign('fk_order_items_order');
            $table->dropForeign('fk_order_items_product');
            if (Schema::hasColumn('order_items', 'variant_id')) $table->dropForeign('fk_order_items_variant');
        });

        Schema::table('payments', function (Blueprint $table) {
            if (Schema::hasColumn('payments', 'order_id')) $table->dropForeign('fk_payments_order');
        });

        Schema::table('wishlists', function (Blueprint $table) {
            $table->dropForeign('fk_wishlists_user');
            $table->dropForeign('fk_wishlists_product');
        });
    }
}
