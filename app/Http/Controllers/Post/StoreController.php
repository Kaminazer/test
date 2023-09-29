<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request):RedirectResponse
    {
        $data =  $request-> validated();
        $this->service->store($data);
        return redirect()->route('posts.index');
    }
}
