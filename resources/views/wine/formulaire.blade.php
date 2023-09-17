<div class="card">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h4 class="card-title">Vin</h4>
            @if ($wine->id)
            <p class="card-text">Modifier les informations du vin.</p>
            @else
            <p class="card-text">Ajouter les informations du vin.</p>
            @endif
        </div>
        <div class="row">
            <div class="m-3 col">
                <label for="" class="form-label">Nom</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('name', $wine->name)}}">
                <small id="helpId" class="text-muted">@error('name')
                    {{$message}}
                @enderror</small>
            </div>
            <div class="m-3 col">
                <label for="" class="form-label">Millésime</label>
                <input type="text" name="vintage" id="" class="form-control" placeholder="" aria-describedby="helpId"  value="{{old('vintage',$wine->vintage)}}">
                <small id="helpId" class="text-muted">@error('vintage')
                    {{$message}}
                @enderror</small>
            </div>
        </div>
        <div class="row">
            <div class="m-3 col">
                <label for="" class="form-label">Cépage</label>
                <select class="form-select " name="cepage_id" id="">
                    <option >Select one</option>

                    @foreach ($cepages as $cepage)
                        <option 
                        @if (old('cepage_id') == $cepage->id || $wine->cepage_id == $cepage->id)
                                {{'selected'}}
                        @endif value="{{$cepage->id}}">{{$cepage->name}}</option>    
                    @endforeach
                </select>
                @error('cepage_id')
                    {{$message}}
                @enderror
            </div>
            <div class="m-3 col">
                <label for="" class="form-label">Type</label>
                <select class="form-select " name="type_id" id="">
                    <option >Select one</option>
                    @foreach ($types as $type)
                        <option @if (old('cepage_id') == $type->id || $wine->type_id == $type->id)
                            {{'selected'}}
                    @endif value="{{$type->id}}">{{$type->name}}</option>    
                    @endforeach
                </select>
                @error('type_id')
                    {{$message}}
                @enderror
            </div>

        </div>
        <div class="row">
            <div class="col m-3">
                
                <div class="col">
                    <label for="" class="form-label">Photo</label>
                    <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <small>
                    @error('image')
                        {{$message}}
                    @enderror
                </small>
            </div>
            <div class="col m-3 text-end">
                <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </div>
        </div>
    </form>
</div>