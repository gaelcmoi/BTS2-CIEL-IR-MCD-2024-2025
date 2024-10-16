<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $primaryKey = 'position_id';

    protected $fillable = ['name'];

    /**
     * One-to-Many: A position can have many champions.
     */
    public function champions()
    {
        return $this->belongsToMany(Champion::class, 'champion_position', 'position_id', 'champion_id');
    }
}
