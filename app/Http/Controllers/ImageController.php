<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    protected $_tag;
    protected $_image;

    public function __construct(){
        $this->_tag = new Tag();
        $this->_image = new Image();
    }
    
    public function show($id) {
        $image = Image::with('user')->findOrFail($id); // Завантаження зв'язаного користувача
        return view('image.show', [
            'image' => $image,
            'all_tags' => $this->_tag->latest()
        ]);
    }
    public function create() {
        return view('image.create', [
            'all_tags' => $this->_tag->latest()
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'new_image' => ['mimes:jpg,jpeg,png,mp4,avi,wmv,mov,mkv'],
            'tags' => 'required'
        ]);

        $this->_image->saveImage($request);

        return redirect(route('index'));
    }

    public function edit($id) {
        $image = Image::find($id);
        if (Auth::id() != $image->user_id) {
            return redirect(route('show_image', $id));
        }

        return view('image.edit', [
            'all_tags' => $this->_tag->latest(),
            'image' => $image
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'tags' => 'required'
        ]);
    
        $image = Image::find($id);
        if ($image) {

            if ($request->hasFile('new_image')) {
                $request->validate([
                    'new_image' => ['mimes:jpg,jpeg,png,mp4,avi,wmv,mov,mkv'],
                ]);
    
                $old_image_path = $image->image_path;
                $new_image_name = $request->file('new_image')->hashName();
                $new_image_path = $request->file('new_image')->move(public_path('images'), $new_image_name);

                $image->update([
                    'image_path' => $new_image_path,
                    'name' => $new_image_name,
                    'description' => $request->description,
                    'textnews' => nl2br($request->textnews),
                ]);
                File::delete($old_image_path);
            } else {
                $image->update([
                    'description' => $request->description,
                    'textnews' => nl2br($request->textnews),
                ]);
            }
        }
        $this->_image->updateImage($request);
        return redirect(route('show_image', $id));
    }

    public function destroyConfirm($id) {
        return redirect(route('show_image', $id))->with('confirm', true);
    }

    public function destroy($id) {
        $image = Image::find($id);
        if (Auth::id() != $image->user_id) {
            return redirect(route('show_image', $id));
        }

        $this->_image->destroyImageTags($image);

        return redirect(route('index'));
    }
}