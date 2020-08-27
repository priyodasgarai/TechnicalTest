<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function subcategories(){
        return $this->hasMany('App\Model\Category', 'parent_id')->where('status',1);
    }
    public function section(){
        return $this->belongsTo('App\Model\Section','section_id')->select('id','name');
    }
    public function parentcategory(){
        return $this->belongsTo('App\Model\Category', 'parent_id')->select('id','category_name');
    }
}
