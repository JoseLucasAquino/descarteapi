<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Descarte extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo', 'volume', 'quantidade'
    ];
}

