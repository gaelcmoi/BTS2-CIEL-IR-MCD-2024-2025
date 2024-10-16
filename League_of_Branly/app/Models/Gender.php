<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $table = 'genders';

    protected $primaryKey = 'gender_id';

    // Specify which fields can be mass assigned
    protected $fillable = ['name'];

    public function champions()
    {
        return $this->hasMany(Champion::class);
    }
}
