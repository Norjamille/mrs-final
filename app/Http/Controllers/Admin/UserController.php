<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $search = Request::input('search');
        $role = Request::input('role');

        return Inertia::render('Admin/Users/Index', [
            'users' => User::query()
                    ->when($search, function ($query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%')
                            ->orWhere('email', 'like', '%'.$search.'%');
                    })
                    ->when($role, function ($query) use ($role) {
                        $query->role($role);
                    })
                    ->paginate(10)
                    ->withQueryString()
                    ->through(fn ($user) => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'roles' => $user->getRoleNames(),
                    ]),
            'filters' => Request::all(['search', 'role']),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Users/Create');
    }

    public function store(StoreUserRequest $request)
    {
        (new UserService())->store($request->validated());

        return redirect()->route('admin.users')->with('toast', [
            'type' => 'success',
            'message' => 'User successfully created.',
        ]);
    }

    public function edit(User $user)
    {
        return Inertia::render('Admin/Users/Edit', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->getRoleNames()[0],
            ],
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        (new UserService())->update($request->validated(), $user);

        return redirect()->route('admin.users')->with('toast', [
            'type' => 'success',
            'message' => 'User successfully updated.',
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('toast', [
            'type' => 'success',
            'message' => 'User successfully deleted.',
        ]);
    }
}
