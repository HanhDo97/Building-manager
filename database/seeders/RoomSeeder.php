<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contract_id = 1;
        for ($floor = 3; $floor <= 9; $floor++) {
            for ($room = 1; $room <= 6; $room++) {
                Room::create([
                    'contract_id' => $contract_id++,
                    'roomNumber' => $floor . '0' . $room,
                ]);
            }
        }
    }
}
