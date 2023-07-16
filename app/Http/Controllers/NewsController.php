<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class NewsController extends Controller
{
    public function createForm()
    {
        return view('news-create');
    }

    /**
     * create new news
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required'
        ]);

        $result = ['data' => null, 'messages' => null, 'success' => false];

        $news = News::query()->create($request->all());
        if($news) {
            $result['data'] = $news->id;
            $result['success'] = true;
        }

        return response()->json($result);
    }

    /**
     * get news list
     *
     * @return JsonResponse
     */
    public function getList(): JsonResponse
    {
        $result = ['data' => null, 'messages' => null, 'success' => false];

        $newsList = News::with('comments')->get();

        if ($newsList->isNotEmpty()) {
            $result['data'] = $newsList;
            $result['success'] = true;
        }

        return response()->json($result);
    }

    /**
     * get news info
     *
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function getNewsInfo($id, Request $request): JsonResponse
    {
        $request->merge(['id' => $id]);
        $request->validate([
            'id' => 'required'
        ]);

        $result = ['data' => null, 'messages' => null, 'success' => false];

        $newsInfo = News::query()->find($id)->with('comments')->get()[0];
        if ($newsInfo) {
            foreach ($newsInfo['comments'] as $key => $comment) {
                $commentId = $comment['id'];
                $newsInfo['comments'][$key]['likes'] = Redis::command('get', ["comment{$commentId}:like"]) ?? 0;
                $newsInfo['comments'][$key]['dislikes'] = Redis::command('get', ["comment{$commentId}:dislike"]) ?? 0;
            }

            $result['data'] = $newsInfo;
            $result['success'] = true;
        }

        return response()->json($result);
    }
}
