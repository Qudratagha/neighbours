@if(session()->has('message'))
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="alert alert-success" id="deleteAlert" role="alert">{{ session('message') }}</div>
        </div>
    </div>
@endif
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </ul>
@endif
@if(session()->has('errorMessage'))
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="alert alert-danger" id="deleteAlert" role="alert">{{ session('errorMessage') }}</div>
        </div>
    </div>
@endif
