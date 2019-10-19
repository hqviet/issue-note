<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;
class Category extends Model
{
    use ModelTrait;
    protected $fillable = ['name'];
    
    public function issues()
    {
        return $this->belongsToMany(Issue::class, 'issue_category', 'category_id', 'issue_id');
    }

    public function getRules()
    {
        return [
            'name' => 'required|unique:categories,name'
        ];
    }
}   
