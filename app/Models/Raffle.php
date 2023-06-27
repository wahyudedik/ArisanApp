<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Raffle extends Model
{
    use HasFactory;

    protected $table = 'raffles';

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }
}
