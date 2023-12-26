<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'author_id',
        'title',
        'short_description',
        'description',
        'quote',
        'publication_date',
    ];

    public $timestamps = true;

    public function images()
    {
        return $this->hasMany(NewsImage::class);
    }

    public function getFirstImage()
    {
        return $this->images->first();
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
