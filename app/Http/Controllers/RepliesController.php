<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Reply;
use App\Models\Thread;

class RepliesController extends Controller
{
    public function store(Channel $channel, Thread $thread)
    {
        request()->validate([
            "body" => "required",
        ]);

        $thread->addReply([
            "owner_id" => auth()->id(),
            "body" => request("body"),
        ]);

        return redirect($thread->path());
    }

    public function patch(Reply $reply)
    {
        $this->authorize('update', $reply);
        $reply->update(['body' => request()->body]);
    }

    public function delete(Reply $reply)
    {
        $this->authorize("update", $reply);

        $reply->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'reply deleted']);
        }

        return back();
    }
}
