<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comments extends Model
{
    protected $fillable = ['comtent', 'user_id','post_id'];

    public function post () : BelongsTo {
        return $this->belongsTo(Post::class);
    }
    
    public function user () : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
