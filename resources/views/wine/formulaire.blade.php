<div class="card">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col m-3">
                <h4 class="card-title">Vin</h4>
                </div>
            @if ($wine->id)
            <!-- Modal trigger button -->
            <div class="col m-3 text-end">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalId">
                Supprimer le vin
            </button>
            </div>
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
                    <!-- a améliorer !!! -->
                    @if ($wine->image)
                        <br><img src="/storage/{{$wine->image}}" id="imageId" alt="" height="150px">
                        <a name="" id="" class="btn btn-danger"  role="button" onclick="removePicture()">Supprimer l'image</a>
                        <div class="form-check">
                          <input class="form-check-input hidden" type="checkbox" value="true" id="removePictureId" name="removePicture">
                        </div>

                    @endif
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
    </div>
    </form>
</div>


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">
                @csrf
                @method('delete')

                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Suppresion de l'enregistrement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer ce vin ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Confirmer</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

    function removePicture(){
        document.getElementById('imageId').remove();
        document.getElementById('removePictureId').checked = true
    }
</script>
