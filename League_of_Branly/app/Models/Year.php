<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $table = 'years';

    // Primary key if not 'id'
    protected $primaryKey = 'years_id';

    // Specify which fields can be mass assigned
    protected $fillable = ['year'];

    public function champions()
    {
        return $this->hasMany(Champion::class, 'years_id', 'years_id');
    }
}
