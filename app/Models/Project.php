<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProjectImage;


class Project extends Model
{

    use SoftDeletes;
    use HasFactory;
    protected $table = "projects";
    protected $softCascade = ['projectImage'];
    protected $fillable = ["name", "slug", "status", "content"];
    protected $casts = [
        'status' => 'boolean',
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class, 'project_id', 'id')->orderBy("id", "DESC");
    }
}
