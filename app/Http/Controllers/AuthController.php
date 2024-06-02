<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function profile($id)
    {
        $user = User::find($id);
        $images = Image::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(30);
    
        // Підрахунок кількості постів
        $postCount = Image::where('user_id', $id)->count();
    
        // Підрахунок кількості унікальних тегів
        $tagCount = Image::where('user_id', $id)
            ->join('image_tag', 'images.id', '=', 'image_tag.image_id')
            ->distinct('image_tag.tag_id')
            ->count('image_tag.tag_id');
        
        $avatarPath = public_path('avatars/' . $user->avatar);
        if (!file_exists($avatarPath) || !$user->avatar) {
            $user->avatar = 'default-avatar.png';
        }
        // Сохранение изменения в базе данных (если нужно)
        if ($user->isDirty('avatar')) {
            $user->save();
        }
    
        return view('auth.profile', [
            'user' => $user,
            'images' => $images,
            'postCount' => $postCount,
            'tagCount' => $tagCount
        ]);
        
    }
    public function search($id, Request $request)
    {
        $user = User::find($id);
        $searchTerm = $request->input('search');
        $images = Image::where('user_id', $id)
            ->where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', "%{$searchTerm}%")
                ->orWhere('description', 'like', "%{$searchTerm}%")
                ->orWhere('textnews', 'like', "%{$searchTerm}%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(16);

        return view('auth.profile', [
            'user' => $user,
            'images' => $images,
            'searchTerm' => $searchTerm,
        ]);
    }
    
    public function login() {
        return view('auth/login');
    }

    public function loginPOST(Request $request) {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');
 
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect(route('index'));
        }

        return redirect(route('auth.login'))->with('message', 'Wrong creditnails');
    }
    public function registration() {
        return view('auth/registration');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:users,name',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => $request->password, 
        ]);

        auth()->login($user);

        return redirect(route('index'));
    }

    public function destroy()
    {
        auth()->logout();
        
        return redirect(route('index'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|unique:users,name,' . $id,
            'realnamename' => 'nullable',
            'aboutuser' => 'nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Додавання валідації для аватара
        ]);

        if ($request->hasFile('avatar')) {
            $avatarName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $user->avatar = $avatarName;
        }

        $user->update([
            'name' => $request->name,
            'realnamename' => $request->realnamename,
            'aboutuser' => $request->aboutuser,
            'avatar' => $user->avatar ?? $user->getOriginal('avatar'), // Зберегти існуючий аватар, якщо новий не завантажено
        ]);

        return redirect()->route('profile', ['id' => $id])->with('success', 'User information updated successfully.');
    }

}
