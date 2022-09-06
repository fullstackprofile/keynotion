<?php

namespace Database\Seeders;

use App\Gateways\InvoiceGateway;
use App\Gateways\StripGateway;
use App\Models\Gateway;
use Illuminate\Database\Seeder;

class GatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gateways = [
            [
                'name' => 'Card',
                'class' => StripGateway::class,
                'type' => Gateway::TYPE_CC,
            ],
            [
                'name' => 'Invoice',
                'class' => InvoiceGateway::class,
                'type' => Gateway::TYPE_INVOICE,
            ],
        ];
        collect($gateways)->map(function ($gateway) {
            Gateway::query()->updateOrCreate([
                'type' => $gateway['type'],
                'class' => $gateway['class'],
                'status' => Gateway::STATUS_ACTIVE,
            ], $gateway);
        });
    }
}
