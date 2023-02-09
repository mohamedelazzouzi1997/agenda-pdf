<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
        'status',
        'user_id',
    ];
    // public static function search($search)
    // {
    //     return empty($search) ? static::query()
    //         : static::where('title', 'like', '%'.$search.'%')
    //             ->orWhere('description', 'like', '%'.$search.'%')
    //             ->orWhere('date', 'like', '%'.$search.'%')
    //             ->orWhere('status', 'like', '%'.$search.'%');
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
