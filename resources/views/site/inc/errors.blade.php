@if($errors->any())
<ul class="alert alert-danger list-unstyled mb-3">
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
@endif
