@extends('layout.backend')

@section('content')
    @if(Session::has('domain_update'))
        <div class="alert alert-primary alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Primary!</strong> {!! session('domain_update') !!}
        </div>
    @endif
    @if (count($errors) > 0)
        <!-- Form Error List -->
        <div class="alert alert-danger">
            <strong>Something is Wrong</strong>
            <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('domain.update', $domain->domain_id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="domain_name" class="form-label">Domain name</label>
            <input type="text" class="form-control" id="domain_name" name="domain_name" value="{{ $domain->domain_name }}">

        </div>
        <div class="mb-3">
            <label for="expiry_date" class="form-label">Expiry date</label>
            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ $domain->expiry_date }}">

        </div>
        <div class="mb-3">
            <label for="registrar" class="form-label">Registrar</label>
            <input type="text" class="form-control" id="registrar" name="registrar" value="{{ $domain->registrar }}">

        </div>
        <div class="mb-3">
            <label for="auto_rename" class="form-label">Auto renew</label>
            <input type="checkbox" id="auto_rename" name="auto_rename" value="1" {{ old('featured', $domain->auto_renew) ? 'checked' : '' }}>>

        </div>
        <div class="mb-3">
            <label for="contact_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ $domain->contact_email }}">

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection