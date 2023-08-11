<?php

namespace App\Models;

use Samoylenko\Teams\Events\TeamCreated;
use Samoylenko\Teams\Events\TeamDeleted;
use Samoylenko\Teams\Events\TeamUpdated;
use Samoylenko\Teams\Models\Team as TeamModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends TeamModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => TeamCreated::class,
        'updated' => TeamUpdated::class,
        'deleted' => TeamDeleted::class,
    ];
}
