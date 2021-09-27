<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $guarded = [];

     /**
     * Get the users for the client.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
