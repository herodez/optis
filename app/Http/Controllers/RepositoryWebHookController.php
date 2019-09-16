<?php

namespace App\Http\Controllers;

use App\Events\RepositoryUpdated;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RepositoryWebHookController extends Controller
{
    public function gitlab(Request $request, User $user)
    {
        if ($request->header('X-Gitlab-Token') !== $user->api_key) {
            abort(Response::HTTP_UNAUTHORIZED);
        }
        
        event(new RepositoryUpdated());
    }
}
