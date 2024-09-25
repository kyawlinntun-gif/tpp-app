<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends BaseController {

	private UserRepositoryInterface $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function index()
	{
		$users = $this->userRepository->index();

		$result = UserResource::collection($users);

		return $this->sendResponse($result, 'User Retrieved Successfully!', 200);
	}

	public function show($id)
	{
		$user = $this->userRepository->show($id);

		$result = new UserResource($user);

		return $this->sendResponse($result, 'User Show Successfully!', 200);
	}

	public function store(UserCreateRequest $request)
	{
		$userValidator = $request->validated();

		if($request->hasFile('image')) {
			$imageName = time() . '.' . $request->file('image')->extension();
			$request->image->storeAs('userImages', $imageName);
			$userValidator = array_merge($userValidator, ['image' => $imageName]);
		}

		$user = $this->userRepository->store($userValidator);

		return $this->sendResponse($user, 'User Store Successfully!', 201);
	}

	public function update(UserUpdateRequest $request, $id)
	{
		$user = $this->userRepository->show($id);

		if(!$user) {
			return $this->sendError('User Not Found', null, 404);
		}

		$user = $this->userRepository->update($id, $request->validated());

		return $this->sendResponse($user, 'User Updated Successfully!', 200);
	}

	public function destroy($id)
	{
		$user = $this->userRepository->show($id);

		if(!$user) {
			return $this->sendError("User Not Found", null, 404);
		}

		$user = $this->userRepository->destroy($id);
		return $this->sendResponse($user, 'User Deleted Successfully!', 200);
	}

}