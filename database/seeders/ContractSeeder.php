<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contract;
use Faker\Factory as Faker;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 42; $i++) {
            Contract::create([
                //'room_id' => $i,
                'contractPeriod' => random_int(1, 5),
                'outOfDate' => $faker->dateTimeBetween('-30 days', '+30 days'),
            ]);
        }
    }
}
