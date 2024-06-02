<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Image extends Model
{
    use HasFactory;
    
    protected $fillable = ['description', 'textnews','image_path', 'name', 'user_id'];
    public function tags() {return $this->belongsToMany(Tag::class);}
    public function user() {return $this->belongsTo(User::class);}
    public function latest() {return $this->orderBy('created_at', 'desc')->get();}
    public function saveImage($request) {
        $image_name =  $request->file('image')->hashName();
        $image = Image::create([
            'user_id' => Auth::id(),
            'description' => $request->description,
            'textnews' => $request->textnews,
            'image_path' => $request->image->move(public_path('images'), $image_name),
            'name' => $image_name
        ]);
        $tag_names = explode(' ', preg_replace('/\s+/', ' ', $request->tags));
        foreach($tag_names as $tag_name) {
            $tag_name = $tag_name;
            $tag = Tag::where('name', '=', $tag_name)->first();
            if($tag === null) {
                $tag = Tag::create([
                    'name' => $tag_name
                ]);
            } else {
                $tag->images_count += 1;
                $tag->save();
            }
            $image->tags()->attach($tag->id);
        }
    }
    public function destroyImageTags($image) {
        foreach ($image->tags as $tag) {
            $tag->images_count--;
            if($tag->images_count == 0) {
                Tag::destroy($tag->id);
            } else {
                $tag->save();
            }
        }
        File::delete($image->image_path);
        Image::destroy($image->id);
    }
    public function updateImage($request) {
        $image = Image::find($request->image_id);
        $old_image_tags = array_map(function ($v) {
            return $v['name'];
        }, $image->tags->toArray());
        $new_image_tags = explode(' ', preg_replace('/\s+/', ' ', $request->tags));
        $added_tags = array_diff($new_image_tags, $old_image_tags);
        $deleted_tags = array_diff($old_image_tags, $new_image_tags);
        if (count($added_tags) | count($deleted_tags)) {
            foreach($added_tags as $new_tag_name) {
                $new_tag_name = $new_tag_name;
                $tag = Tag::where('name', '=', $new_tag_name)->first();
                if($tag === null) {
                    $tag = Tag::create([
                        'name' => $new_tag_name
                    ]);
                } else {
                    $tag->images_count += 1;
                    $tag->save();
                }
                $image->tags()->attach($tag->id);
            }
            foreach($deleted_tags as $deleted_tag_name) {
                $tag = Tag::where('name', '=', $deleted_tag_name)->first();
                $image->tags()->detach($tag->id);
                $tag->images_count--;
                $tag->save();
                if($tag->images_count == 0) {
                    Tag::destroy($tag->id);
                }
            }
        }
        $image->update([
            'description' => $request->description,
            'textnews' => $request->textnews,
        ]);        
    }

}
