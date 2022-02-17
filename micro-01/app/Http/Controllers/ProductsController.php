<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function __construct(Product $model)
    {
        $this->repository = $model;
    }

    public function index()
    {
        $products = $this->repository->get()->load('tags');
        return view('products.index.index', compact('products'));
    }

    public function create()
    {
        $tags = Tag::get();

        return view('products.create.index', compact('tags'));
    }

    public function show(int $id)
    {
        $product = $this->repository->findOrFail($id)->load('tags');
        $tags = Tag::get();

        $selectedsTags = [];

        foreach ($product->tags as $tag) {
            array_push($selectedsTags, $tag->id);
        }
        
        return view('products.edit.index', compact('product', 'selectedsTags', 'tags'));
    }


    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();

            info('tentou produto');


            $product = $this->repository->create($request->toArray());

            $product->tags()->sync($request->id_tags);

            info('criou produto');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('status', ['danger', 'Erro ao cadastrar produto.']);
        }

        return redirect('produtos')->with('status', ['success', 'Produto cadastrado com sucesso.']);
    }

    public function update(int $id, Request $request)
    {
        info('oi');
        try {
            DB::beginTransaction();

            $product = $this->repository->find($id);
            info('achou');
    
            if (!empty($product)) {
                $product->update($request->toArray());

                $product->tags()->sync($request->id_tags);

            } else {
                return redirect()->back()->with('status', ['danger', 'Erro ao atualizar produto.']);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('status', ['danger', 'Erro ao atualizar produto.']);
        }

        return redirect('produtos')->with('status', ['success', 'Produto atualizado com sucesso.']);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $product = $this->repository->find($id);

            if (!empty($product)) {
                $product->tags()->sync([]);
                $product->delete();
            } else {
                return redirect()->back()->with('status', ['danger', 'Produto não encontrado em nosso sistema.']);
            }
    
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('status', ['danger', 'Erro ao excluir produto.']);
        }

        return redirect('produtos')->with('status', ['success', 'Produto excluído com sucesso.']);
    }
}
