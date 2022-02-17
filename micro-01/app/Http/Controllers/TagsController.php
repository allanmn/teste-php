<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function create()
    {
        return view('tags.create.index');
    }

    public function show(int $id)
    {
        $tag = $this->repository->findOrFail($id);
        
        return view('tags.edit.index', compact('tag'));
    }


    public function store(TagRequest $request)
    {
        try {
            DB::beginTransaction();

            $tag = $this->repository->create($request->toArray());

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('status', ['danger', 'Erro ao cadastrar tag.']);
        }

        return redirect('tags')->with('status', ['success', 'Tag cadastrada com sucesso.']);
    }

    public function update(int $id, TagRequest $request)
    {
        try {
            DB::beginTransaction();

            $tag = $this->repository->find($id);
    
            if (!empty($tag)) {
                $tag->update($request->toArray());
            } else {
                return redirect()->back()->with('status', ['danger', 'Tag não encontrada em nosso sistema.']);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('status', ['danger', 'Erro ao editar tag.']);
        }

        return redirect('tags')->with('status', ['success', 'Tag atualizada com sucesso.']);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $tag = $this->repository->find($id);

            if (!empty($tag)) {
                $tag->delete();
            } else {
                return redirect()->back()->with('status', ['danger', 'Tag não encontrada em nosso sistema.']);
            }
    
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('status', ['danger', 'Erro ao excluir tag.']);
        }

        return redirect('tags')->with('status', ['success', 'Tag excluída com sucesso.']);
    }
}
