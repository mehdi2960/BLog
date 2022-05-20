<?php

namespace App\Models;

use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable=['user_id','text','parent_id','commentable_id','commentable_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($created_at)
    {
        $v1=new Verta($created_at);
        $v2=$v1->format('Y/n/j');
        return $v2;
    }

    public function getUpdateAtAttribute($updated_at)
    {
        $v1=new Verta($updated_at);
        $v2=$v1->format('Y/n/j');
        return $v2;
    }
}
