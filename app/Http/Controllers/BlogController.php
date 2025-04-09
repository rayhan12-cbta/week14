<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): BlogCollection
    {
        $blogs = $this->blogService->getAll();
        return new BlogCollection($blogs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = Auth::id();

        $blog = $this->blogService->create($validatedData, $request->file('image'));

        return (new BlogResource($blog))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): BlogResource
    {
        $blog = $this->blogService->getById($id);
        return new BlogResource($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, string $id): BlogResource
    {
        $validatedData = $request->validated();
        $blog = $this->blogService->update(
            $id,
            $validatedData,
            $request->hasFile('image') ? $request->file('image') : null
        );

        return new BlogResource($blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $this->blogService->delete($id);

        return response()->json([
            'message' => 'Blog deleted successfully'
        ]);
    }

    /**
     * Display the specified resource by slug.
     */
    public function showBySlug(string $slug): BlogResource
    {
        $blog = $this->blogService->getBySlug($slug);
        return new BlogResource($blog);
    }
}
