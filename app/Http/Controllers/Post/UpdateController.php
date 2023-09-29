<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        $data =  $request-> validated();
        $this->service->update($data, $post);
        return redirect()->route('posts.show', $post->id);
    }
}
