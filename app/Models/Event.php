<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    static $rules=[
        'title'=>'required',
        'description'=>'required',
        'start'=>'required',
        'end'=>'required',
        'starthour'=>'fillable',
        'endhour'=>'fillable'

    ];
    protected $fillable=['title','description','start','end','starthour','endhour'];
}
