<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Tag extends Model
{
    use ModelTrait;
    protected $table = 'tags';
    protected $fillable = ['name'];

    public function issues() 
    {
        return $this->belongsToMany(Issue::class, 'issue_tag', 'tag_id', 'issue_id');
    }
    
    public function getRules()
    {
        return [
            'name' => 'required|unique:tags,name'
        ];
    }
}
