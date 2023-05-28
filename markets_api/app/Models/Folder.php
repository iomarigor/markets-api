<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Folder
 *
 * @property $id
 * @property $id_profile
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Folder extends Model
{
    
    static $rules = [
		'id_profile' => 'required',
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_profile','name'];



}
