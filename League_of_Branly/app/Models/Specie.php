<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;

    protected $table = 'species';

    // Primary key if not 'id'
    protected $primaryKey = 'specie_id';

    // Specify which fields can be mass assigned
    protected $fillable = ['name'];

    /**
     * One-to-Many: A specie can have many champions.
     */
    public function champions()
    {
        return $this->belongsToMany(Champion::class, 'champion_specie', 'specie_id', 'champion_id');
    }
}
