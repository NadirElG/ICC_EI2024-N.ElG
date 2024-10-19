@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Paiement Réussi</h1>
        <p>Votre paiement a été traité avec succès. Merci pour votre achat !</p>
        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Retour au Dashboard</a>
    </div>
@endsection
