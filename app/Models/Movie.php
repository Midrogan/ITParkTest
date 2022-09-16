<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'poster', 
        'status',
    ];

    protected $appends = 'poster_filename';

    /**
     * Get all of the genres for the Movie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function getPosterFilenameAttribute()
    {
        return $this->attributes['poster'];
    }

    public function getPosterAttribute()
    {
        $url = request()->schemeAndHttpHost();
        if ($this->attributes['poster'] == NULL) {
            return $url . '/storage/defaultImg.png';
        }

        return $url . Storage::url($this->attributes['poster']);
    }
}
