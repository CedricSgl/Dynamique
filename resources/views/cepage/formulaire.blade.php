<form action="" method="post">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">Nom du Cépage</label>
      <input type="text"
        class="form-control" name="name" id="nameId" aria-describedby="helpId" placeholder="Nom du Cépage" value="{{old('name', $cepage->name)}}"">
      <small id="helpId" class="form-text text-muted">
      @if (!$errors)
          Merci de compléter le champ
      @endif
        @error("name")
          {{$message}}
      @enderror
    </small>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>

</form>
