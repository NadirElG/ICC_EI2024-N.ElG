@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Paiement Annulé</h1>
        <p>Le paiement a été annulé. Si vous avez des questions, veuillez nous contacter.</p>
        <a href="{{ url('/plans') }}" class="btn btn-warning">Retour aux Plans</a>
    </div>
@endsection
