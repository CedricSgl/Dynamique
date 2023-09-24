@extends('template')

@section('title', 'Ajouter un vin')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com" value="Admin@dk.be">
                <small id="emailHelpId" class="form-text text-muted">@error('email')
                    {{$message}}
                @enderror</small>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="" placeholder="">
                <small id="emailHelpId" class="form-text text-muted">@error('password')
                    {{$message}}
                @enderror</small>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection


