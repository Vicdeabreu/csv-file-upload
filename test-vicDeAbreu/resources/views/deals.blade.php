@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
</div>


<div class="container">
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline" action="/deals" method="GET" role="search">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search by Id" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
            <div class="row mt-5 justify-content-around align-items-center bg-light p-1 br-3">
                <img src="img/nike1.jpg" alt="actual-sales-test-vicdeabreu" width="60" class="mr-4">
                <h3 class="">Here you will see all the deals closed until now</h3>
            <div>
                </div>
        
            <table class="table">
                @foreach($deals as $deal)
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Deal Type</th>
                <th scope="col">Status</th>
                <th scope="col">Amount</th>
                <th scope="col">Signed Date</th>
                <th scope="col">ID Client</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                <th scope="row">{{$deal->id}}</th>
                <td>{{$deal->deal_type}}</td>
                <td>{{$deal->status}}</td>
                <td>{{$deal->amount}}</td>
                <td>{{$deal->signed_date}}</td>
                <td>{{$deal->client_id}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

        
        <div class="card">
            <div class="card-body">
                <p>{{ session('status') }}</p>
                <form method="POST" action="{{ url('deals') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file" class="control-label">CSV file to import</label>

                        <input id="file" type="file" class="form-control" name="file" required>

                        @if ($errors->has('file'))
                        <span class="help-block">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                        @endif
                    </div>

                    <p><button type="submit" class="btn btn-success" name="submit">Submit</button></p>
                </form>

            </div>
        </div>

    <footer>
        <div class="card mt-5 bg-light">
            <div class="card-body">
                <div class="row justify-content-start ml-4">
                    <p>Do you want to see our clients?</p> 
                    <a href="clients" class="btn btn-secondary ml-3">See clients</a>
                </div>
            </div>
        </div>
    </footer>
@endsection

