<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    // Table name if different from default (optional)
    protected $table = 'resources';

    // Primary key if not 'id'
    protected $primaryKey = 'resource_id';

    // Specify which fields can be mass assigned
    protected $fillable = ['name'];

    public function champions()
    {
        return $this->hasMany(Champion::class);
    }
}
