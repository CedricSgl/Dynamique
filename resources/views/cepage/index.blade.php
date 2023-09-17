@extends('template')

@section('title', $title)
@section('content')
    Mes Messages
    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Date</th>
            <th>Id</th>
        </tr>

    @foreach ($cepages as $cepage)
        <tr>
            <td>{{$cepage->name}}</td>
            <td>{{$cepage->created_at}}</td>
            <td><a href="{{route('cepage.show', ['id' => $cepage->id])}}" class="btn btn-secondary">Editer</a>
            </td>
        </tr>

    @endforeach

    
</table>
<a href="{{route('cepage.create')}}" class="btn btn-primary">Nouveau</a>
{{$cepages->links()}}
@endsection