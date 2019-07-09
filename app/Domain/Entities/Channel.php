<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Domain\Entities\Entities;

class Channel extends Entities
{
    use Notifiable;

    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     * 
     */
    protected $table = 'channels';
    protected $fillable = [
        'code', 'name', 'description', 'timezone', 'theme', 'hostname', 'logo', 'favicon', 'home_page_content', 'footer_content', 'default_locale_id', 'base_currency_id', 'root_category_id'
    ];

    protected $attributes = [
        'default_locale_id' => '21',
        'base_currency_id' => '21',
        'root_category_id' => '21',
    ];
}
