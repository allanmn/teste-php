<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function __construct(Tag $model)
    {
        $this->repository = $model;
    }

    public function index()
    {
        $tags = $this->repository->get();
        return view('tags.index.index', compact('tags'));
    }

    public function show(int $id)
    {
        $tag = $this->repository->find($id);
        
        return $tag;
    }

    public function create()
    {
        return view('tags.create.index');
    }

    public function store(TagRequest $request)
    {
        $tag = $this->repository->create($request->toArray());

        return $tag;
    }

    public function update(int $id, TagRequest $request)
    {
        $tag = $this->repository->find($id);

        if (!empty($tag)) {
            $tag->update($request);
        }
    }

    public function delete($id)
    {
        $tag = $this->repository->find($id);

        if (!empty($tag)) {
            $tag->delete();
        }
    }
}
