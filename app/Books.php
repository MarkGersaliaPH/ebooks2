<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{ 
    use SoftDeletes;
    
    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }
 

    protected $fillable = [
        'title', 'category', 'description','author','cover','price','file'
    ];

    public function orders(){
        return $this->hasOne('App\Order','book_id');
    }
    
}
