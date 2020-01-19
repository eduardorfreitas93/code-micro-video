<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenreController extends Controller
{
    private array $rules = [
        'name' => 'required|max:255',
        'is_active' => 'boolean'
    ];

    public function index(): Collection
    {
        return Genre::all();
    }

    public function store(Request $request): Genre
    {
        $this->validate($request, $this->rules);
        return Genre::create($request->all());
    }

    public function show(Genre $category): Genre
    {
        return $category;
    }

    public function update(Request $request, Genre $category): Genre
    {
        $this->validate($request, $this->rules);
        $category->update($request->all());
        return $category;
    }

    public function destroy(Genre $category): Response
    {
        $category->delete();
        return response()->noContent();
    }
}
