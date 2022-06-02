@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class=" border  shadow-lg p-3 mb-5 bg-white rounded" style="width:30rem;">
                <form action="{{ route('users.update-profile') }}" method="POST">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @csrf
                    @method('PUT')
                    <h1>Vos Informations</h1>
                    <hr>
                    <div class="form-group">
                        <label for="name">Votre Nom</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                            id="name" value="{{ $user->name }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Votre Email</label>
                        <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                            id="email" value="{{ $user->email }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password"> Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmation du mot de passe</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="password_confirmation">
                    </div>

                    <button type="submit" class="btn btn-success">Enregistrer les modifications</button>

                </form>
<form action="{{ route('users.destroy', $user->id) }}" method="POST">
    @method('delete')
    @csrf
<button type="submit">Supprimer le compte</button>
</form>

            </div>



        </div>




    </div>
@endsection
