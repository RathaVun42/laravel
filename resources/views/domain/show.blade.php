@extends('layout.backend') // this specify parent layout.

@section('content')
    <h1>Domain details</h1>
    <p>name: {{$domain->domain_name}}</p>
    <p>expiry date: {{$domain->expiry_date}}</p>
    <p>registrar: {{ $domain->registrar }}</p>
    <p>auto renew: @if ($domain->auto_renew == 0)
        {{ "No" }}
        @else
        {{ "Yes" }}
    @endif
        
    </p>
    <p>contact email: {{ $domain->contact_email }}</p>
    <a class="btn btn-secondary" href="{{route('domain.index')}}">Back</a>
@endsection