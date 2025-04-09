<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class BlogService
{
    public function getAll()
    {
        return Blog::with('user')->latest()->get();
    }

    public function getById(int $id)
    {
        return Blog::with('user')->findOrFail($id);
    }

    public function getBySlug(string $slug)
    {
        return Blog::with('user')->where('slug', $slug)->firstOrFail();
    }

    public function create(array $data, UploadedFile $image)
    {
        $data['image'] = $this->uploadImage($image);
        return Blog::create($data);
    }

    public function update(int $id, array $data, ?UploadedFile $image = null)
    {
        $blog = Blog::findOrFail($id);

        if ($image) {
            // Hapus gambar lama jika ada
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $data['image'] = $this->uploadImage($image);
        }

        $blog->update($data);
        return $blog;
    }

    public function delete(int $id): bool
    {
        $blog = Blog::findOrFail($id);

        // Hapus gambar jika ada
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        return $blog->delete();
    }

    private function uploadImage(UploadedFile $image): string
    {
        return $image->store('blogs', 'public');
    }
}
