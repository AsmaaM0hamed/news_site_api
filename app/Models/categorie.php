<?php

namespace App\Models;

use App\Models\post;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categorie extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['image','name','description'];

    public function posts()
    {
        return $this->hasMany(post::class);
    }
}
