<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function images() 
    {return $this->belongsToMany(Image::class)->orderBy('created_at', 'desc');}

    public function latest() 
    {return $this->orderBy('images_count', 'desc')->get();}

    // public function show($name) {
    //     $images = Tag::where('name', $name)->first()->images;
    //     return $images;
    // }

    public function tagsSearch($request)
    {
        $tag_names = explode(' ', preg_replace('/\s+/', ' ', $request->search));

        $tags = Tag::whereIn('name', $tag_names)->get();

        $images = collect();
        $all_images = Image::get();
        foreach ($all_images as $image) {
            if($tags->diff($image->tags)->isEmpty()) {
                $images->push($image);
            }
        }

        return $images;
    }
}
