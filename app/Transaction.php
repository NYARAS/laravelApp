<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable=['fee_id','transaction_date','student_id','user_id','s_fee_id','paid','remark','description'];
    protected $primaryKey='transaction_id';
    public $timestamps = true;
}
