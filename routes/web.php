<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});


Route::get('posts/{post}', function($slug) {
/*   //1we build a path
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
//1we see if the file exists
    if (! file_exists($path)) {
        return redirect('/');
    }
//2caching for expensive operations
$post = cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));



//1and if it does we fetch the content
    //$post = file_get_contents($path);
//1and we pass it to the view
        return view ('post', [
        'post' => $post
    ]); */

    //find a post by its slug and pass it to a view called "post"
   return view('post', [
       'post' => Post::find($slug)
   ]);
})->where('post', '[A-z_/-]+');