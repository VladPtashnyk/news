<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Admin extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;

    /**
     * Встановленно, що це адмін
     *
     * @var string
     */
    protected $guard = 'admin';

    /**
     * Таблиця моделі admins
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * Первинний ключ моделі.
     *
     * @var int
     */
    protected $primaryKey = 'id';

    /**
     * Заповнювані поля даної таблиці
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Атрибути, які слід приховати для серіалізації
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Атрибути, які повинні бути приведені.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
