@extends('template')

@section('title', 'Ajouter un vin')
@section('content')
    <form action="" method="post">
        @csrf
        <div class="mb-3">
          <label for="" class="form-label">Nom du Cépage</label>
          <input type="text"
            class="form-control" name="name" id="nameId" aria-describedby="helpId" placeholder="Nom du Cépage" value="{{ old('name')}}">
          <small id="helpId" class="form-text text-muted">Merci de complter le champ</small>
          @error("name")
              {{$message}}
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

@endsection