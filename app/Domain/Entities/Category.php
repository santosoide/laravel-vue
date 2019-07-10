<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Category extends Model
{
/**
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position', 'image', 'status', '_lft', '_rgt', 'parent_id', 'display_mode',
    ];

    protected $attributes = [
        'position' => 'position',
        'image' => 'image',
        'status' => 12345,
        '_lft' => '_lft',
        '_rgt' => '_rgt',
        'parent_id' => 'parent_id',
        'display_mode' => 'display_mode'
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
