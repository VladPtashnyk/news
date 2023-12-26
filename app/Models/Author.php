<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /**
     * Таблиця моделі authors
     *
     * @var string
     */
    protected $table = 'authors';

    /**
     * Первинний ключ моделі.
     *
     * @var int
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'name',
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'author_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
