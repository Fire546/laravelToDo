<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Todo extends Model
{

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'text',
        'user_id'
        ];
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function booted() {
        static::creating(function ($m) {
            if (!$m->getKey()) {
                $m->{$m->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
