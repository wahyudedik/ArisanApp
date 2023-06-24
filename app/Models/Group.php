<?php

namespace App\Models;

use App\Models\User;
use App\Models\GroupMember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function groupMembers()
    {
        return $this->hasMany(GroupMember::class, 'group_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'group_id');
    }

    public function groupChat()
    {
        return $this->hasMany(GroupChat::class, 'group_id');
    }

    public function winners()
    {
        return $this->hasMany(Winner::class, 'group_id');
    }

    public function raffles()
    {
        return $this->hasMany(Raffle::class, 'group_id');
    }

    public function groupRequests()
    {
        return $this->hasMany(GroupRequest::class, 'group_id');
    }
}

