@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Something went wrong.</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
