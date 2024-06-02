<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class ImageboardController extends Controller
{
    protected $_tag;
    protected $_image;

    public function __construct(){
        $this->_tag = new Tag();
        $this->_image = new Image();
    }
    
    public function index() {
        $images = Image::orderBy('created_at', 'desc')->paginate(16);
        return view('imageboard.index', [
            'images' => $images,

            'all_tags' => $this->_tag->latest()
        ]);
    }
    public function tag($name) {
        $images = Image::whereHas('tags', function ($query) use ($name) {
            $query->where('name', $name);
        })->orderBy('created_at', 'desc')->paginate(16);

        return view('imageboard.index', [
            'images' => $images,
            'all_tags' => $this->_tag->latest()
        ]);
    }
    public function tagSearch(Request $request) {
        $searchTerm = $request->input('search');

        $images = Image::where('name', 'like', "%{$searchTerm}%")
        ->orWhere('description', 'like', "%{$searchTerm}%")
        ->orWhere('textnews', 'like', "%{$searchTerm}%")
        ->orWhereHas('user', function ($query) use ($searchTerm) {
            $query->where('name', 'like', "%{$searchTerm}%");
        })
        ->orWhereHas('tags', function ($query) use ($searchTerm) {
            $query->where('name', 'like', "%{$searchTerm}%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(16);

        return view('imageboard.index', [
        'images' => $images,
        'all_tags' => $this->_tag->latest()
    ]);
    }

}
