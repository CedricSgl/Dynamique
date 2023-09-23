<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use App\Models\Wine;
use App\Models\Cepage;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateWineRequest;


class WineController extends Controller
{
    public function index()
    {
        return Wine::with('cepage')->get();
        $wines = Wine::with('cepage')->paginate(4);
        return view('wine.index', ['wines' => $wines]);
    }

    public function apiGetAll()
    {
        $all = Wine::with('cepage')->get();
        return response()->json($all);
    }

    public function home()
    {
        $wines = Wine::with('cepage')->paginate(4);
        return view('wine.index', ['wines' => $wines]);
    }

    public function getAll(){
        return Wine::with('cepage')->get();

    }

    public function create() :View
    {
        $wine = new Wine();
        $array = $this->allSelect();
        $array['wine'] = $wine;
        return view('wine.create', $array);
    }

    public function store(CreateWineRequest $request){
        $wine = Wine::create($this->transformData(new Wine(), $request));
        return redirect()->route('wine.index')->with('success', 'Votre vin à bien été ajouté');
    }

    public function edit(Wine $wine/*string $id*/) :View
    {
        //$wine = \App\Models\Wine::findOrFail($id);
        $array = $this->allSelect();
        $array['wine'] = $wine;
        return view('wine.edit', $array);
    }

    public function delete(Wine $wine)
    {
        $wine->delete();
        return redirect()->route('wine.index')->with('success', 'Votre vin à bien été supprimé');
    }

    public function update(Wine $wine, CreateWineRequest $request){


        $wine->update($this->transformData($wine, $request));

        return redirect()->route('wine.index')->with('success', 'Votre vin à bien été modifié');
    }

    public function allSelect(){
        $cepages = Cepage::all();
        $types = Type::all();
        return ['cepages' => $cepages, 'types' => $types];
    }

    private function transformData(Wine $wine, CreateWineRequest $request){
        $datas = $request->validated();
        /** @var UploadedFile $image */
        $image = $request->validated('image');

        //dd($image);
        if($image === null || $image->getError()){
            return $datas;
        }
        if($wine->image){
            Storage::disk('public')->delete($wine->image);
        }
        $path = $image->store('wine', 'public');
        $datas['image'] = $path;
        return $datas;
    }
}
