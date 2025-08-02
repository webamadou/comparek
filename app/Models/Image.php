<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    protected $guarded = [];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    public function defaultUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => asset('frontv1/img/illustration/default-img.png')
        );
    }
}
