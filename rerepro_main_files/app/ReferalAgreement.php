<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReferalAgreement extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'referal_agreements';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lead_id', 'sender_id', 'receiver_id', 'status','zipcode','sender_sing','receiver_sing','lead_type','Location','name','address','phone','email','comments','recever_date'];

       public function GetSender(){
        return $this->hasOne(User::class,'id','sender_id');
       }
       public function GetReceiver(){
        return $this->hasOne(User::class,'id','receiver_id');
       }
}
