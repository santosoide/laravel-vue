<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Channel extends Model
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

    protected static function boot()
    {
        parent::boot();

        /**
         * Attach to the 'creating' Model Event to provide a UUID
         * for the `id` field (provided by $model->getKeyName())
         */
        static::creating(function ($model) {

            $model->{$model->getKeyName()} = (string) $model->generateNewId();
        });
    }

    /**
     * Generate new Uuid
     *
     * @return \Webpatser\Uuid\Uuid
     * @throws \Exception
     */
    public function generateNewId()
    {
        return Uuid::generate(4);
    }
}
