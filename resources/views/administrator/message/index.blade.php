@extends('template')
@php
use App\Helpers\Utilities;
@endphp

@section('title', $title)
@section('content')
    Mes Messages
    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Date</th>
            <th>Message</th>
            <th>Détail</th>
        </tr>

    @forelse  ($messages as $message)
        <tr>
            <td>{{$message->name}}</td>
            <td>{{Utilities::getUpdateTimeDiff($message->created_at, 'reçu')}}</td>
            <td ><span class="d-inline-block text-truncate" style="max-width: 300px;">{{ $message->message}}</span></td>
            <td><a href="{{route('administrator.message.show', ['id' => $message->id])}}" class="btn btn-secondary">Lire</a>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">Il n'y a actuellement pas de message</td></tr>
    @endforelse

</table>

{{$messages->links()}}
@endsection
