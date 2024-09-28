<?php

namespace Karlis\Module1\Http\Controllers;

use CommonModule\Helper;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Karlis\Module1\Http\Requests\NewsRequest;
use Karlis\Module1\Models\News;

class NewsController extends Controller
{
    public function index(): Collection
    {
        return News::orderBy('created_at', 'desc')
            ->get();
    }

    public function store(NewsRequest $request): News
    {
        return News::create($request->all());
    }

    public function show(int $id): JsonResponse
    {
        $news = News::find($id);

        $data = [
            'title' => $news->title,
            'content' => $news->content,
            'created_at' => Helper::formatDate($news->created_at)
        ];

        return response()->json($data);
    }

    public function update(NewsRequest $request, int $id): News
    {
        $news = News::find($id);
        if ($news) {
            $news->update($request->all());
        }

        return $news;
    }

    public function destroy(int $id): JsonResponse
    {
        $news = News::find($id);
        if ($news) {
            $news->delete();
        }

        return response()->json(['deleted' => $news]);
    }
}
