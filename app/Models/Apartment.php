<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * @property $id
 *
 * @property RealEstateEntity $realEstateEntity
 * @property Collection<RealEstateEntityParameter> $parameters
 */
class Apartment extends Model
{
    use SoftDeletes;

    public function realEstateEntity(): MorphOne
    {
        return $this->morphOne(RealEstateEntity::class, 'source');
    }

    public function parameters(): MorphMany
    {
        return $this->morphMany(RealEstateEntityParameter::class, 'source');
    }
}
