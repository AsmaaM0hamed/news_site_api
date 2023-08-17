<?php

namespace App\Models;

use App\Models\categorie;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = [ 'title', 'description', 'bady'];
    protected $fillable = ['image','categorie_id', 'title', 'description', 'bady'];

    public function category()
    {
        return $this->belongsTo(categorie::class);
    }
}



