@extends('layout.backend')
@section('content')
<h1>Domain</h1>
<a class="btn btn-primary" href="{{ url('/domain/create') }}">New</a>
<br><br>
@if(Session::has('domain_delete'))
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Primary!</strong> {!! session('domain_delete') !!}
</div>
@endif
@if (count($domains) > 0)
<table class="table table-bordered">
    <thead>
        <th>ID</th>
        <th>Domain name</th>
        <th>Expiry date</th>
        <th>Registrar</th>
        <th>Auto renew</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        @foreach ($domains as $domain)
        <tr>
            <td>
                {!! $domain->domain_id !!}
            </td>
            <td>
                <a href="{{ url('/domain/' . $domain->domain_id) }}">{!! $domain->domain_name !!}</a>
            </td>
            <td>
                {!! $domain->expiry_date !!}
            </td>
            <td>
                {!! $domain->registrar !!}
            </td>
            <td>
                @if ($domain->auto_renew == 0)
                    {{ "No" }}
                    @else
                    {{ "Yes" }}
                @endif
            </td>
            <td><a class="btn btn-primary" href="{!! route('domain.edit',[$domain->domain_id]) !!}">Edit</a></td>
            <td>
                    {{ Html::form('DELETE','domain/'. $domain->domain_id)->open()}}
                        <button onclick="return confirmAction()" class="btn btn-danger delete">Delete</button>
                    {{ Html::form()->close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    function confirmAction() {
        let confirmAction = confirm("Are you sure to delete?");
        if (confirmAction == true) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endif
@endsection
