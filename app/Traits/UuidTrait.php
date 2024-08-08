<?php

namespace App\Traits;

use illuminate\Support\Str;

trait UuidTrait
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->incrementing = false;
            $model->keyType='String';
            $model->{$model->getKeyName()} = Str::orderedUuid()->toString();
        });
    }
}