<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersIndexRequest;
use App\Models\User;
use App\Resources\UserCollection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function index(UsersIndexRequest $request): UserCollection
	{
		$users = User::random(2)
			->sortBy('lastName')
			->keyBy('uuid');
		return new UserCollection($users);
	}
}
