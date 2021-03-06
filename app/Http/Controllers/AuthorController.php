<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function create()
    {
        return view(view: 'authors.create');
    }
    public function store()
    {
        Author::create($this->validateRequest());
    }

    protected function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'dob' => 'required',
        ]);
    }
}
