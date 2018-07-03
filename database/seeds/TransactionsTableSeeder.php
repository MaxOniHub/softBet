<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 20;
        $res = [];
        $currency = ["usd", "eur"];

        $prev =  Carbon\Carbon::now()->subDays(1)->toDateTimeString();


        while ($i--)
        {
            $res[] = [
                'user_id' => "1",
                'date' => $prev,
                'amount' => rand(1, 200),
                'currency' => $currency[rand(0, 1)],
                'created_at' => $prev,
                'updated_at' => $prev,
                'is_deleted' => 0
            ];
        }

        DB::table('transactions')->insert($res);
    }
}
