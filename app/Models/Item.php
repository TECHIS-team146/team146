<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function items(){
        $items = Item::all();

        return view('user.index')->with('items', $items);
    }

    use HasFactory;
    protected $table = "items";
    protected $fillable = [
        'name',
        'type',
        'detail',
        'user_id',
    ];

    // protected $guarded = [
    //     'user_id',
    // ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
