<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
              $table->integer("user_id");
                $table->string("full_name");
                $table->string("phone");
                $table->string("email");
                $table->text("address");
                $table->string("city");
                $table->string("state");
                $table->string("postal_code");
                $table->string("country");
                $table->boolean("is_default")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
