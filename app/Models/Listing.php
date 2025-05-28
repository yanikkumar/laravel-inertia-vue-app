<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'titile',
        'desc',
        'tags',
        'email',
        'link',
        'image',
        'approved'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

}
