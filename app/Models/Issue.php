<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ModelTrait;

class Issue extends Model
{
    use SoftDeletes, ModelTrait;

    protected $fillable = [
        'title', 'os', 'description'
    ];
    
    public function tags() 
    {
        return $this->belongsToMany(Tag::class, 'issue_tag', 'issue_id', 'tag_id');
    }

    public function categories() 
    {
        return $this->belongsToMany(Category::class, 'issue_category', 'issue_id', 'category_id');
    }
}
