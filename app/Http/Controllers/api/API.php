<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comments;

class API extends Controller
{
    // GET
    public function index()
    {
        $comments = Comments::all();
        return response()->json(['comments' => $comments]);
    }

    public function show($id)
    {
        $comment = Comments::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }
        return response()->json(['comment' => $comment]);
    }

    // POST
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_comment' => 'required',
        ]);

        $comment = Comments::create($data);
        return response()->json(['message' => 'Comment created', 'comment' => $comment], 201);
    }

    // PUT
    public function update(Request $request, $id)
    {
        $comment = Comments::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $data = $request->validate([
            'user_comment' => 'required',
        ]);

        $comment->update($data);
        return response()->json(['message' => 'Comment updated', 'comment' => $comment]);
    }

    // DELETE
    public function destroy($id)
    {
        $comment = Comments::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $comment->delete();
        return response()->json(['message' => 'Comment deleted']);
    }
}
