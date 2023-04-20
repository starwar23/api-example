<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * @return array
     */
    public function index()
    {
        $posts = Cache::remember('posts', null, function () {
            return Post::query()->with('comments')->get();
        });
        return PostResource::collection($posts)->resolve();
    }

    /**
     * @param PostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PostRequest $request)
    {
        $post = Post::query()->create($request->validated());
        return response()->json($post);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $post = Post::query()->with('comments')->findOrFail($id);
        return response()->json(new PostResource($post));
    }

    /**
     * @param PostRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::query()->findOrFail($id);
        $post->fill($request->validated())->save();
        return response()->json($post);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $post = Post::query()->findOrFail($id);
        $post->delete();
        return response()->json();
    }
}
