@extends('layouts/admin')

@section('content')

    <div class="go-back-btn text-center d-flex justify-content-center align-items-center gap-4 mt-5">
        
        <h1 class="mb-0 green text-uppercase">Add Type</h1>


        <a href="{{route('admin.types.index')}}" class="btn-custom">Go Back</a>

    </div>

    <div class="form-container">

        <form class="form" action="{{route('admin.types.store')}}" method="POST">
            @csrf

            <label class="lb" for="name">Name:</label>
            <input name="name" id="name" type="text" class="infos input @error('name') is-invalid @enderror" value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback mb-3 mt-0">
                {{$message}}
            </div>
            @enderror

            <label for="description" class="lb">Description:</label>
            <textarea name="description" id=description" cols="30" rows="3" class="infos input @error('description') is-invalid @enderror">{{old('description')}}</textarea>
            @error('description')
            <div class="invalid-feedback mb-3 mt-0">
                {{$message}}
            </div>
            @enderror
        
            <button id="send" type="submit">Send</button>
            <button id="limpar" type="reset">Clear </button>
            
        </form>

    </div>
    

@endsection