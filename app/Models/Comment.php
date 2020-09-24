<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Comment extends Model
{
    protected $fillable = ['visitor_id', 'blog_id', 'comment', 'publication_status'];

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y');
    }
}
