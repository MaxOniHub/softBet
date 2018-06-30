<?php

namespace App;

use App\Interfaces\IEntity;
use App\Models\Transaction;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements IEntity
{
    use Notifiable;

    protected $card_number;

    protected $expiration_date;

    protected $security_code;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_name',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'card_number',
        'expiration_date',
        'security_code',
        'card_issuer',

    ];

    protected $appends = [
        'card_number',
        'expiration_date',
        'security_code',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'card_number_hash',
        'expiration_date_hash',
        'security_code_hash'
    ];


    public function setCardNumberAttribute($card_number)
    {
        $this->card_number = $card_number;
    }

    public function getCardNumberAttribute()
    {
        return $this->card_number;
    }

    public function setExpirationDateAttribute($expiration_date)
    {
        $this->expiration_date = $expiration_date;
    }

    public function getExpirationDateAttribute()
    {
        return $this->expiration_date;
    }


    public function setSecurityCodeAttribute($security_code)
    {
        $this->security_code = $security_code;
    }

    public function getSecurityCodeAttribute()
    {
        return $this->security_code;
    }

    public function setCardNumberHashAttribute($hash)
    {
        $this->attributes['card_number_hash'] = $hash;
    }

    public function setExpirationDateHashAttribute($hash)
    {
        $this->attributes['expiration_date_hash'] = $hash;
    }

    public function setSecurityCodeAttributeHash($hash)
    {
        $this->attributes['security_code_hash'] = $hash;
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = $password;
    }

    /** ============= Relations ============= **/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

}
