<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contributor extends Model
{
    use HasFactory;

    protected $fillable = [
        'idea_id',
        'user_id'
    ];

    public function idea()
    {
        return $this->belongsTo(Idea::class, 'idea_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
