@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <h1>Paiement Réussi</h1>
        <p>Votre paiement a été traité avec succès. Merci pour votre achat !</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Back HOME</a>
    </div>
@endsection
