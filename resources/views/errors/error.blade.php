@if($errors->any())
    <ul class="alert alert-info">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif