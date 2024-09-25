<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class UserResource extends JsonResource {

	public function toArray(Request $request): array
	{
		return [
			'name' => $this->name,
			'email' => $this->email,
			'image' => asset('userImages/' . $this->image),
			'status' => $this->status ? 'Active' : 'Inactive'
		];
	}

}