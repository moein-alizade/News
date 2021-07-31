@if(count($errors->all()) > 0)
    <ul class="bg-danger p-3 mt-1">
        @foreach($errors->all() as $errors)
            <li>{{   $errors   }}</li>
        @endforeach
    </ul>
@endif
