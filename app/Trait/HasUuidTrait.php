<?php

namespace App\Trait;

use Faker\Provider\Uuid;

/**
 * Trait to extend functionality auto creating the UUID for database
 *
 * @see https://medium.com/@laravelprotips/uuid-in-laravel-a-simple-guide-55cdc4642d43
 * @package pkl-hummatech
 */
trait HasUuidTrait
{
    protected static function boot()
    {
        parent::boot();
        static::creating(fn($model) => $model->id = (string) Uuid::uuid());
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }
}
