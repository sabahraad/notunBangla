<?php

namespace App\Http\Controllers;

use App\Models\contentRequest;
use Illuminate\Http\Request;

class contentController extends Controller
{
    public function contentRequest(Request $request)
    {
        $request->validate([
            'content_title' => 'required',
            'content_description' => 'required',
            'content_date_time' => 'required',
            'reference_link' => 'string|nullable',
            'media_id' => 'nullable',
        ]);

        $contentRequest = new contentRequest();
        $contentRequest->content_title = $request->content_title;
        $contentRequest->content_description = $request->content_description;
        $contentRequest->content_date_time = $request->content_date_time;
        $contentRequest->content_uploader_ip = $request->content_uploader_ip;
        $contentRequest->reference_link = $request->reference_link;
        $contentRequest->media_id = $request->media_id;
        $contentRequest->save();

        return response()->json([
            'message' => 'Content request submitted successfully',
            'data' => $contentRequest
        ], 201);
    }
}
