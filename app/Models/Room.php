<?php

namespace App\Models;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
