<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\Api\PostResource;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(
        private PostService $postService,
        private PostRepositoryInterface $repository
    ) {}

    public function index(Request $request): JsonResponse
    {
        $categorySlug = $request->query('category');
        $search = $request->query('search');
        $sort = $request->query('sort', 'latest');

        $posts = $this->repository->getPublishedPosts(10, $categorySlug, $search, $sort);

        return PostResource::collection($posts)->response();
    }

    public function store(StorePostRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['author_id'] = $request->user()->id;

        $coverImage = $request->file('cover_image');

        $post = $this->postService->createPost($data, $coverImage);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil diterbitkan',
            'data' => new PostResource($post),
        ], 201);
    }

    public function show(string $slug): JsonResponse
    {
        $post = $this->repository->findPublishedBySlug($slug);

        if (! $post) {
            return response()->json([
                'success' => false,
                'message' => 'Berita tidak ditemukan atau belum rilis',
            ], 404);
        }

        $post->increment('views_count');

        return response()->json([
            'success' => true,
            'message' => 'Detail berita berhasil diambil',
            'data' => new PostResource($post),
        ]);
    }

    public function update(UpdatePostRequest $request, string $id): JsonResponse
    {
        $coverImage = $request->file('cover_image');
        $updated = $this->postService->updatePost($id, $request->validated(), $coverImage);

        if (! $updated) {
            return response()->json([
                'success' => false,
                'message' => 'Berita gagal diperbarui atau tidak ditemukan',
            ], 404);
        }

        $post = $this->repository->findById($id);
        $post->load(['category:id,name,slug', 'author:id,name']);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil diperbarui',
            'data' => new PostResource($post),
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $deleted = $this->postService->deletePost($id);

        if (! $deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Berita gagal dihapus atau tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Berita dan gambar cover berhasil dihapus',
        ]);
    }
}
