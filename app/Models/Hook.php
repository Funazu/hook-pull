<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hook extends Model
{
    use HasFactory;

    protected $table = 'hooks';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function log() {
        return $this->hasMany(Log::class);
    }

    public function status()
    {
        return $this->hasMany(Status::class);
    }

    public function terminalpermission()
    {
        return $this->hasMany(TerminalPermission::class);
    }
}
