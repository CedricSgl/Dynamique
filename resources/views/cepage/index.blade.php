@extends('template')

@section('title', $title)
@section('content')
    <table class="table">
        <tr>
            <th>Cépage</th>
            <th>Date</th>
            @auth
                <th></th>
            @endauth
        </tr>

    @foreach ($cepages as $cepage)
        <tr>
            <td>{{$cepage->name}}</td>
            <td>{{$cepage->created_at}}</td>
            @auth
            <td>
                <a href="{{route('cepage.edit', ['id' => $cepage->id])}}" class="btn btn-secondary">Editer</a>
            </td>
            @endauth
        </tr>

    @endforeach


</table>
@auth
    <a href="{{route('cepage.create')}}" class="btn btn-primary">Nouveau</a>
@endauth

{{$cepages->links()}}
@endsection
