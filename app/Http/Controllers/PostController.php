<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Mostrar una lista de todos los posts.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Almacenar un nuevo post.
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    /**
     * Mostrar un post específico.
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Actualizar un post existente.
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return response()->json($post, 200);
    }

    /**
     * Eliminar un post.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }
}
