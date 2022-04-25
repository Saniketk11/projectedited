<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    /**
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'surface',
        'construction_year',
        'is_leasehold',
        'room',
        'floors',
        'apartment_count',
        'is_declaration_of_division',
        'is_development_possible',
        'state',
        'comment',
        'postal_code',
        'address',
        'email',
        'phone_number',
        'price'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_leasehold' => 'boolean',
        'is_declaration_of_division' => 'boolean',
        'is_development_possible' => 'boolean',
    ];

    protected $with = [
        'floor_plans',
        'photos',
        'attachments'
    ];

    /**
     * @return HasMany
     */
    public function floor_plans(): HasMany
    {
        return $this->hasMany(FloorPlan::class);
    }

    /**
     * @return HasMany
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    /**
     * @return HasMany
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }
}
