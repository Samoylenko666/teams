<?php

namespace App\Models;

use Samoylenko\Teams\Models\Membership as MembershipModel;

class Membership extends MembershipModel
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}
