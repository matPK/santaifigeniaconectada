@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    <span><strong>Successo:</strong> {{Session::get('success')}}</span>
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    <strong>Erros:</strong>
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
</div>
@endif
