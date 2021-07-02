<?php

namespace App\Http\Controllers\Api;

use App\Criteria\Builder\UserCriteriaBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Actions\UserServiceAction;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller {
  /**
   * @var UserServiceAction
   */
  protected $service;

  /**
   * UserController constructor.
   *
   * @param UserServiceAction $service
   */
  public function __construct(UserServiceAction $service) {
    $this->service = $service;
  }

  /**
   * Display a listing of the resource.
   *
   * @OA\Get(
   *   tags={"User"},
   *   path="/users",
   *   summary="Find users",
   *   operationId="findUsers",
   *   @OA\Parameter(
   *     name="q",
   *     in="query",
   *     description="Filter results based on query string value.",
   *     required=false,
   *     @OA\Schema(
   *        type="string"
   *     ),
   *     style="form"
   *   ),
   *   @OA\Parameter(
   *     name="orderByColumn",
   *     in="query",
   *     description="Sort results by name of column.",
   *     required=false,
   *     @OA\Schema(
   *        type="string"
   *     ),
   *     style="form"
   *   ),
   *   @OA\Parameter(
   *     name="orderByMethod",
   *     in="query",
   *     description="Sort results by method  example- desc. Requered fild orderByColumn.",
   *     required=false,
   *     @OA\Schema(
   *        type="string"
   *     ),
   *     style="form"
   *   ),
   *   @OA\Parameter(
   *     name="max",
   *     in="query",
   *     description="Max count results.",
   *     required=false,
   *     @OA\Schema(
   *        type="integer"
   *     ),
   *     style="form"
   *   ),
   *   @OA\Response(
   *      response=200,
   *      description="successful operation",
   *      @OA\Schema(
   *        type="array",
   *        @OA\Items(ref="#/components/schemas/SchemaUserResource")
   *      )
   *   ),
   *   @OA\Response(response=400, description="token not provided"),
   *   @OA\Response(response=401, description="token invalid"),
   *   security={{"Bearer":{}}}
   * )
   *
   * @param UserCriteriaBuilder $criteriaBuilder
   * @return AnonymousResourceCollection
   */
  public function index(UserCriteriaBuilder $criteriaBuilder) {
    return UserResource::collection(
      User::filterToPaginate($criteriaBuilder, $criteriaBuilder->max(), $criteriaBuilder->page())
    );
  }

  /**
   * Display the specified resource.
   *
   * @OA\Get(
   *   tags={"User"},
   *   path="/users/{user}",
   *   summary="Find user by ID",
   *   description="Returns a single user",
   *   operationId="getUserById",
   *   @OA\Parameter(
   *      description="ID of user to return.",
   *      in="path",
   *      name="user",
   *      required=true,
   *      @OA\Schema(
   *        type="integer",
   *        format="int64"
   *      )
   *   ),
   *   @OA\Response(
   *      response=200,
   *      description="successful operation",
   *      @OA\JsonContent(ref="#/components/schemas/SchemaUserResource")
   *   ),
   *   @OA\Response(response="404", description="Not found"),
   *   @OA\Response(response=400, description="token not provided"),
   *   @OA\Response(response=401, description="token invalid"),
   *   security={{"Bearer":{}}}
   * )
   *
   * @param User $user
   * @return UserResource
   */
  public function show(User $user) {
    return new UserResource($user);
  }

  /**
   *  Store a newly created resource in storage.
   *
   * @OA\Post(
   *   tags={"User"},
   *   path="/users",
   *   operationId="addUser",
   *   summary="Add a new user to the store",
   *   description="",
   *   @OA\RequestBody(
   *      description="Object that needs to be added in the store. Descriptive description of all entities",
   *      required=true,
   *      @OA\JsonContent(ref="#/components/schemas/SchemaUserRequest",)
   *   ),
   *   @OA\Response(response=200,
   *    description="successful operation",
   *    @OA\JsonContent(ref="#/components/schemas/SchemaUserResource")
   * ),
   *   @OA\Response(response=422, description="fail validation"),
   *   @OA\Response(response=400, description="token not provided"),
   *   @OA\Response(response=401, description="token invalid"),
   *   security={{"Bearer":{}}}
   * )
   *
   * @param UserRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(UserRequest $request) {
    $user = $this->service->createUser($request->createDto());

    return response()->json([
      'status' => 'created',
      'data' => $this->show($user),
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @OA\Put(
   *   tags={"User"},
   *   path="/users/{user}",
   *   operationId="updateUser",
   *   summary="Update an existing user",
   *   description="",
   *   @OA\Parameter(
   *      description="ID of user to update.",
   *      in="path",
   *      name="user",
   *      required=true,
   *      @OA\Schema(
   *        type="integer",
   *        format="int64"
   *      )
   *   ),
   *   @OA\RequestBody(
   *      description="Object that needs to be updated in the store. Descriptive description of all entities",
   *      required=true,
   *      @OA\JsonContent(ref="#/components/schemas/SchemaUserRequest")
   *   ),
   *   @OA\Response(response=200,
   *    description="successful operation",
   *    @OA\JsonContent(ref="#/components/schemas/SchemaUserResource")
   * ),
   *   @OA\Response(response=422, description="fail validation"),
   *   @OA\Response(response=400, description="token not provided"),
   *   @OA\Response(response=401, description="token invalid"),
   *   security={{"Bearer":{}}}
   * )
   *
   * @param UserRequest $request
   * @param User $user
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(UserRequest $request, User $user) {
    $user = $this->service->updateUser($user, $request->createDto());

    return response()->json([
      'status' => 'updated',
      'data' => $this->show($user),
    ]);
  }

  /**
   * Remove the specified resource from storage
   *
   * @OA\Delete(
   *   tags={"User"},
   *   path="/users/{user}",
   *   summary="Delete a user",
   *   operationId="deleteUser",
   *   @OA\Parameter(
   *      description="User ID to delete.",
   *      in="path",
   *      name="user",
   *      required=true,
   *      @OA\Schema(
   *        type="integer",
   *        format="int64"
   *      )
   *   ),
   *   @OA\Response(response=200, description="successful operation"),
   *   @OA\Response(response=404, description="not found point collection category"),
   *   @OA\Response(response=400, description="token not provided"),
   *   @OA\Response(response=401, description="token invalid"),
   *   security={{"Bearer":{}}}
   * )
   *
   * @param User $user
   * @return \Illuminate\Http\JsonResponse
   * @throws \Exception
   */
  public function destroy(User $user) {
    $user->delete();
    return response()->json(['status' => 'deleted']);
  }

  /**
   * Restore the specified user from storage
   *
   * @OA\Put(
   *   tags={"User"},
   *   path="/users/restore/{user}",
   *   summary="Restore a user",
   *   operationId="restoreUser",
   *   @OA\Parameter(
   *      description="User ID to restore.",
   *      in="path",
   *      name="user",
   *      required=true,
   *      @OA\Schema(
   *        type="integer",
   *        format="int64"
   *      )
   *   ),
   *   @OA\Response(response=200, description="successful operation"),
   *   @OA\Response(response=404, description="not found point collection category"),
   *   @OA\Response(response=400, description="token not provided"),
   *   @OA\Response(response=401, description="token invalid"),
   *   security={{"Bearer":{}}}
   * )
   *
   * @param User $restoreUser
   * @return \Illuminate\Http\JsonResponse
   */
  public function restore(User $restoreUser) {
    $restoreUser->restore();
    return response()->json(['status' => 'restored']);
  }
}
