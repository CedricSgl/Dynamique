@extends('template')

@section('title', $title)
@section('content')

<div class="card">
    <div class="card-header"><div class="row">
        <h5 class="card-title">Informations sur le message</h5>
        <p class="card-text">Détails du message reçu depuis le formulaire de contact.</p>
    </div></div>

    <div class="row">
        <div class="col"></div>
        <div class="col-2"><strong>Nom complet</strong></div>
        <div class="col-8">{{$message->name}}</div>

    </div>
    <hr>
    <div class="row">
        <div class="col"></div>
        <div class="col-2"><strong>Date</strong></div>
        <div class="col-8">{{$message->created_at}}</div>

    </div>
    <hr>
    <div class="row">
        <div class="col"></div>
        <div class="col-2"><strong>Adresse Email</strong></div>
        <div class="col-8">{{$message->email}}</div>

    </div>
    <hr>
    <div class="row">
        <div class="col"></div>
        <div class="col-2"><strong>Téléphone</strong></div>
        <div class="col-8">{{$message->phone}}</div>
    </div>
    <hr>
    <div class="row">
        <div class="col"></div>
        <div class="col-2"><strong>Message</strong></div>
        <div class="col-8">{{$message->message}}</div>

    </div>

  </div>

@endsection
