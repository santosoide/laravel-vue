<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Subscriber extends Model
{
    //
    // * @var bool
    // * /
    public $incrementing = false;

    // /
    // * The attributes that are mass assign      able.
    // *
    // * @var array
    //  */
    protected $table = 'subscribers_list';
    protected $fillable = [
        'id', 'email', 'id_subscribed', 'token', 'chanel_id', 'created_at', 'updated_at'
    ];
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'token' => 'null','id_subscribed' => 'null','chanel_id' => 'null'
    ];
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
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
