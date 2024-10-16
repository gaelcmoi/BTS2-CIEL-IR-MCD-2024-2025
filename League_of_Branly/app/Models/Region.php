<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    // Table name if different from default (optional)
    protected $table = 'regions';

    // Primary key if not 'id'
    protected $primaryKey = 'region_id';

    // Specify which fields can be mass assigned
    protected $fillable = ['name', 'description'];

    /**
     * One-to-Many: A region can have many champions.
     */
    public function champions()
    {
        return $this->belongsToMany(Champion::class, 'champion_region', 'champion_id', 'region_id');
    }
}
