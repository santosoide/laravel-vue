<?php
namespace App\Domain\Entities;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

/**
 * Class Entities
 * @package App\Domain\Entities
 */
class Entities extends Model
{
    /**
     * @var bool
     */
    public $incrementing = false;

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
            // generate id
            $model->{$model->getKeyName()} = (string)$model->generateNewId();

            // created_at
            $model->created_at = $model->dateNow();

        });

        static::updating(function ($model) {
            // updated_at
            $model->updated_at = $model->dateNow();
        });
    }

    /**
     * Generate new Uuid
     *
     * @return Uuid
     * @throws Exception
     */
    public function generateNewId()
    {
        return Uuid::generate(4);
    }

    /**
     * Get Date now by Carbon
     *
     * @return Carbon|CarbonInterface
     */
    public function dateNow()
    {
        return Carbon::now();
    }

}
