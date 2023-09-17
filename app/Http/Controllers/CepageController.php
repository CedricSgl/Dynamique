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
        $cepages = \App\Models\Cepage::paginate(10);
        return view('cepage.index', ['title' => 'Mon super titre','cepages' => $cepages]);
    }

    public function show(string $id) : View
    {
        //TODO Use query builder for join, or change the cepage table (add customer info)
        $cepage = \App\Models\Cepage::findOrFail($id);
        return view('cepage.show', ['title' => 'Mon cepage','cepage' => $cepage]); // -> update
        //return $cepage;
    }

    public function create(){
        return view('cepage.create');
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
        return redirect()->route('cepage.index');
    }
}
