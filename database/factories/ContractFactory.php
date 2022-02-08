<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_id' => random_int(1,42),
            'contractPeriod' => random_int(1,5),
            'outOfDate' => $this->faker->dateTimeBetween('-30 days', '+30 days'),
        ];
    
    }
}
