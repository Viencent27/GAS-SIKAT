<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Innovation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'inovations';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
