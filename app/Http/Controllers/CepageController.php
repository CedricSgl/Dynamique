<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCepageRequest;
use App\Models\Cepage;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CepageController extends Controller
{
    public function index(): View
    {
        $cepages = Cepage::paginate(10);
        return view('administrator.cepage.index', ['title' => 'Mon super titre','cepages' => $cepages]);
    }

    public function edit(string $id) : View
    {
        //TODO Use query builder for join, or change the cepage table (add customer info)
        $cepage = Cepage::findOrFail($id);
        return view('administrator.cepage.edit', ['title' => 'Mon cepage','cepage' => $cepage]); // -> update
        //return $cepage;
    }

    public function create(){
        $cepage = new Cepage();
        return view('administrator.cepage.create', ['cepage' => $cepage]);
    }

    /* Methode 1
    public function store(Request $request)
    {
        $cepage = Cepage::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('cepage.index');
    }
    */

    /* Methode 2*/
    public function store(CreateCepageRequest $request)
    {
        $cepage = Cepage::create($request->validated());
        return redirect()->route('administrator.cepage.index')->with('success', 'Votre cépage à bien été créé');
    }

    public function update(Cepage $cepage, CreateCepageRequest $request)
    {

        $datas = $request->validated();
        $cepage->update($datas);

        return redirect()->route('administrator.cepage.index')->with('success', 'Votre cépage à bien été modifié');
    }
}
