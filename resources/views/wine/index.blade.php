@extends('template')

@section('title', 'Gestion des Vins')
@section('content')

<div class="row">
    <div class="col"><h3>Vins</h3></div>
    @auth
        <div class="col text-end"><a name="" id="" class="btn btn-danger" href="{{route('wine.create')}}" role="button">Ajouter un vin</a></div>
    @endauth

</div>

<small>Liste des vins</small>
<div class="card">

    <ul class="list-group list-group-flush">

        @forelse ($wines as $wine)
        <li class="list-group-item">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col-2 text-center">
                    @if ($wine->image)
                    <img src="storage/{{$wine->image}}" alt="" height="150px">
                    @endif
                </div>
                <div class="col"><h5>{{$wine->name}}</h5><br>{{$wine->cepage->name}}</div>
                <div class="col text-end"><h5>{{$wine->vintage}}</h5><br>{{$wine->updated_at}}</div>
                @auth
                <div class="col-1 text-center"><a name="" id="" class="btn btn-primary" href="{{route('wine.edit', ['wine' => $wine->id])}}" role="button">Editer</a></div>
                @endauth
            </div>
        </li>
        @empty
        <li class="list-group-item">
            <div class="row justify-content-center align-items-center g-2">
                Il n'y a actuellement pas de vin enregistré
            </div>
        </li>
        @endforelse

    </ul>
</div>
<br>
{{$wines->links()}}

@if (session('success'))
<div class="container">
    <div class="alert alert-success">{{session('success')}}</div>
</div>

@endif
@endsection
