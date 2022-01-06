<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorsRequest;
use App\Http\Resources\AuthorsResource;
use App\Models\Author;
use Faker\Factory;

class AuthorsController extends Controller
{
    public function index()
    {
        return AuthorsResource::collection(Author::all());
    }

    public function store(AuthorsRequest $request)
    {
        $faker = Factory::create(1);
        $author = Author::create([
            'name' => $faker->name,
        ]);
        return new AuthorsResource($author);
    }

    public function show(Author $author)
    {
        return new AuthorsResource($author);
    }

    public function update(AuthorsRequest $request, Author $author)
    {
        $author->update([
            'name' => $request->input('name')
        ]);
        return new AuthorsResource($author);
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return response(null, 204);
    }
}