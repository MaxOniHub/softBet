<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBillingInfoToUsers extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('company_name')->nullable();
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('postal_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('company_name');
            $table->dropColumn('address_line1');
            $table->dropColumn('address_line2');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('role_id');
            $table->dropColumn('postal_code');
        });
    }
}
