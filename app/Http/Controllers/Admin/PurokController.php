<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Purok;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurokRequest;
use App\Http\Requests\UpdatePurokRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Request;

class PurokController extends Controller
{
    public function index()
    {
        $search = Request::input('search');

        return Inertia::render('Admin/Puroks/Index',[
            'puroks'=>Purok::query()
                    ->when($search, function($query, $search){
                        $query->where('name', 'like', '%'.$search.'%');
                    })
                    ->paginate(10)
                    ->withQueryString()
                    ->through(function($purok){
                        return [
                            'id'=>$purok->id,
                            'name'=>$purok->name,
                        ];
                    }),
                'filters'=>Request::only(['search']),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Puroks/Create');
    }

    public function store(StorePurokRequest $request)
    {
        Purok::create($request->validated());

        return redirect()->route('admin.puroks')->with('toast',[
            'type'=>'success',
            'message'=>'Purok created successfully',
        ]);
    }

    public function edit(Purok $purok)
    {
        return Inertia::render('Admin/Puroks/Edit',[
            'purok'=>[
                'id'=>$purok->id,
                'name'=>$purok->name,
            ],
        ]);
    }

    public function update(UpdatePurokRequest $request, Purok $purok)
    {
        $purok->update($request->validated());

        return redirect()->route('admin.puroks')->with('toast',[
            'type'=>'success',
            'message'=>'Purok updated successfully',
        ]);
    }
}
