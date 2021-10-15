<?php

namespace App\Http\Controllers;

use App\Models\Reply;

class FavoritesController extends Controller
{
    public function store(Reply $reply)
    {
        $reply->favorite();
    }

    public function destory(Reply $reply)
    {
        $reply->unfavorite();
    }
}
