<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController extends Controller
{
    /**
     * @param UserRequest $request
     */
    public function index(UserRequest $request)
    {
        $country = Country::where('name', $request->get('country_name'))->firstOrFail();

        $users = User::with('companies')
            ->whereHas('companies', fn($q) => $q->where('country_id', $country->id))
            ->get();

        return UserCollection::collection($users);
    }
}
