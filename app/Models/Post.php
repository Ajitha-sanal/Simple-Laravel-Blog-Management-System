<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='posts';
    protected $fillable=[
        'category_id' ,
        'name' ,
        'description' ,
        'image' ,
        'status' ,
        'created_by' ,
    ];


    public function category(){

return $this->belongsTo(Category::class,'category_id','id');

    }
    public function user(){

        return $this->belongsTo(User::class,'created_by','id',);
        
            }
           
}
