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

    @forelse  ($messages as $message)
        <tr>
            <td>{{$message->name}}</td>
            <td>{{$message->created_at}}</td>
            <td ><span class="d-inline-block text-truncate" style="max-width: 300px;">{{ $message->message}}</span></td>
            <td><a href="{{route('message.show', ['id' => $message->id])}}" class="btn btn-secondary">Lire</a>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">Il n'y a actuellement pas de message</td></tr>
    @endforelse

</table>

{{$messages->links()}}
@endsection
