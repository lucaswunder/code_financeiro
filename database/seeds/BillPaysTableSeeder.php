<?php

use Illuminate\Database\Seeder;

class BillPaysTableSeeder extends Seeder
{
    use \CodeFin\Repositories\Traits\GetClientsTrait;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = $this->getClients();

        factory(\CodeFin\Models\BillPay::class, 200)
            ->make()
            ->each(function($billpay) use ($clients){
               $client = $clients->random();
               $billpay->client_id = $client->id;
               $billpay->save();
            });
    }
}
