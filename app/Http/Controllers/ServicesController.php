<?php

namespace App\Http\Controllers;

use App\Models\Search;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function searchStats() : JsonResponse
    {
        // Get search history
        $s = Search::orderByDesc('hits')->get();
        return response()->json($s);
    }

    public function getVideos() : JsonResponse
    {
        // Get all videos with plays stats
        return response()->json(Video::with('stats')->get());
    }
}
