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
    <body>
        <div class="container">
            <div class="row mt-5 justify-content-around align-items-center bg-light p-1 br-3">
                <img src="img/nike1.jpg" alt="actual-sales-test-vicdeabreu" width="60" class="mr-4">
                    <h3 class="">Our Clients</h3>
            <div>
            <div>
                <a href="deals" class="btn btn-secondary">Back to deals</a>
            </div>
        </div>
        @foreach($clients as $client)
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Country</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">{{$client->id}}</th>
                <td>{{$client->client_name}}</td>
                <td>{{$client->country}}</td>
                </tr>
            </tbody>
        </table>
        @endforeach
        
    </div>
@endsection