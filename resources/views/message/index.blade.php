@extends('template')

@section('title', $title)
@section('content')
    Mes Messages
    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Date</th>
            <th>Message</th>
            <th>Id</th>
        </tr>

    @foreach ($messages as $message)
        <tr>
            <td>{{$message->id}}</td>
            <td>{{$message->created_at}}</td>
            <td ><span class="d-inline-block text-truncate" style="max-width: 300px;">{{ $message->message}}</span></td>
            <td><a href="{{route('message.show', ['id' => $message->id])}}" class="btn btn-secondary">Lire</a>
            </td>
        </tr>

    @endforeach

    
</table>

{{$messages->links()}}
@endsection