<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['username','message','archive'];
    
    // Table Name
    protected $table = 'messages';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamp
    public $timestamp = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
