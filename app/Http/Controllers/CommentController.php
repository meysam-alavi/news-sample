<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CommentController extends Controller
{
    /**
     * @param int $id
     * @param string $rate
     * @param Request $request
     * @return JsonResponse
     */
    public function setRate(int $id, string $rate, Request $request): JsonResponse
    {
        $request->merge([
            'id' => $id,
            'rate' => $rate
        ]);
        $request->validate([
            'id' => 'required',
            'rate' => 'required'
        ]);

        $result = ['data' => null, 'messages' => null, 'success' => false];

        $command = 'decr';
        $params = ["comment{$id}:dislike"];
        if ($rate === 'like') {
            $command = 'incr';
            $params = ["comment{$id}:like"];
        }

        if (Redis::command($command, $params)) {
            $result['data'] = array(
                'id' => $id,
                'rate' => $rate,
                'like' => Redis::command('get', $params)
            );
            $result['success'] = true;
        }

        return response()->json($result);
    }
}
