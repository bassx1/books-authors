<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string title
 * @property string subtitle
 * @property string isbn
 */
class Book extends Model
{
    protected $hidden = ['pivot', 'created_at', 'updated_at'];
    protected $fillable = ['isbn', 'title', 'subtitle'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

}
