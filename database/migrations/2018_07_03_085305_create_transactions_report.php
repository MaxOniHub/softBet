<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( '
                CREATE VIEW transactions_report 
            AS 
                SELECT count(*) as transactions, sum(`transactions`.`amount`) AS `total`, currency, (cast(now() as date) - interval 1 day) as date FROM `transactions` WHERE 
                date_format(`transactions`.`date`,"%Y-%m-%d") = (cast(now() as date) - interval 1 day) GROUP BY currency
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement( 'DROP VIEW transactions_report' );
    }
}
