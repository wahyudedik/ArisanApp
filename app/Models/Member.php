<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function memberRequests()
    {
        return $this->hasOne(MemberRequest::class, 'member_id');
    }

    protected $table = 'members';

    protected $fillable = [
        'user_id',
        'alamat',
        'no_hp',
        'gambar',
        'rekening',
        'status',
    ];
}
