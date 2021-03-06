<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class UserCurrencyTransferOrder extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'uuid';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }

    public function currency()
    {
        return $this->hasOne('App\Models\Currency\Currency','id','currency_id')->select('name','address_url','tx_url');
    }
}
