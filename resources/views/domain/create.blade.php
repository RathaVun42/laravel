@extends('layout.backend')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Create Domai</h1>
            <div class="card mb-4">
                <div class="card-body">
                    @if(Session::has('domain_create'))
                        <div class="alert alert-primary alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Primary!</strong> {!! session('domain_create') !!}
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
                    <form action="{{ route('domain.store') }}" method="post" class="">
                        <div class="mb-3">
                            <label for="domain_name" class="form-label">Domain name</label>
                            <input type="text" class="form-control" id="domain_name" name="domain_name">
        
                        </div>
                        <div class="mb-3">
                            <label for="expiry_date" class="form-label">Expiry date</label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                     
                        </div>
                        <div class="mb-3">
                            <label for="registrar" class="form-label">Registrar</label>
                            <input type="text" class="form-control" id="registrar" name="registrar"> 
               
                        </div>
                        <div class="mb-3">
                            <label for="auto_rename" class="form-label">Auto renew</label>
                            <input type="checkbox" id="auto_rename" name="auto_rename" value="1">
             
                        </div>
                        <div class="mb-3">
                            <label for="contact_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="contact_email" name="contact_email">
                 
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div style="height: 100vh"></div>
            <div class="card mb-4">
                <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the
                    static navigation demo.</div>
            </div>
        </div>
    </main>
@endsection