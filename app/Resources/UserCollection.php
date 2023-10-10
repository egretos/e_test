<?php

namespace App\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Spatie\ArrayToXml\ArrayToXml;

class UserCollection extends ResourceCollection
{
	public $collects = UserResource::class;
	
	public function withResponse($request, $response)
	{
		/** @var static $original */
		$original = $response->original;
		$data = [];
		
		/** @var User $user */
		foreach ($original->toArray($request) as $user) {
			$data[$user->uuid] = (new UserResource($user))->toArray($request);
		}
		
		$xml = ArrayToXml::convert($data, '', false);
		$response->setContent($xml);
		$response->header('content-type', 'application/xml');
	}
}