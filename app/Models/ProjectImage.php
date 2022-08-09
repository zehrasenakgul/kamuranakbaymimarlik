<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Project;

class ProjectImage extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ["project_id", "path"];
    protected $casts = [
        'status' => 'boolean',
    ];
    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
