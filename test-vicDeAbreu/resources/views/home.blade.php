@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-center">
                        <img src="img/nike1.jpg" width="50%" alt="">
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <br>
                        <h1>Wellcome</h1>
                    </div>

                    <div>
                    <br>
                    <h2>To see our deals, <a href="/deals">click here</a></h2>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
