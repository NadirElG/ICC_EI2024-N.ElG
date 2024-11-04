@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Subscribers</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Send mail to all subscribers</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.subscribers-send-mail') }}" method="POST">
                        @csrf
                            <div class="form-group">  
                                <label for="">Subject</label>
                                <input type="text" class="form-control" name="subject" >
                            </div>
                            <div class="form-group">  
                                <label for="">Message</label>
                                <textarea name="messageContent" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">SEND</button>                        
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-header">
        <h1>Subscribers</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Subscribers List</h4>
                    </div>
                    <div class="card-body">
                        {{ $dataTable-> table() }}
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush