<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string name
 */
class Author extends Model
{
    protected $hidden = ['pivot', 'created_at', 'updated_at'];
    protected $fillable = ['name'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

}
