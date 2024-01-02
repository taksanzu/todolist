<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;
    protected $table = 'priority';
    protected $fillable = [
        'name'
    ];

    public function todoLists()
    {
        return $this->hasMany(TodoList::class);
    }
}
