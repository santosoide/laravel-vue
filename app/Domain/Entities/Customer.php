<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Webpatser\Uuid\Uuid;

class Customer extends Model
{
    use Notifiable;
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'first_name', 'last_name', 'password', 'email', 'status', 'notes'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'email_verified_at' => 'datetime',
    ];
    protected $attributes = [
        'channel_id'                => 0,
        'status'                    => 0,
        'subscribed_to_news_letter' => 0,
        'is_verified'               => 0,
        'gender'                    => 'man',
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

            $model->{$model->getKeyName()} = (string)$model->generateNewId();

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
