<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{

    protected $table = 'categories';
    protected $fillable = [
        'position', 'image', 'status', '_lft', '_rgt', 'parent_id', 'display_mode',
    ];
}
