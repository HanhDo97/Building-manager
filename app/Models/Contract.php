<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contracts';

    protected $fillable = [
        'contractPeriod', 'outOfDate'
    ];

    public function room()
    {
        return $this->hasOne(Room::class);
    }
}
