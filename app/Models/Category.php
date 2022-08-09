<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $softCascade = ['blogs'];
    protected $fillable = ["name", "slug", "status"];
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }
}
