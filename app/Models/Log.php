<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'logs';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $casts = [
        'meta' => 'array',
    ];

    public function hook() {
        return $this->belongsTo(Hook::class);
    }
}
