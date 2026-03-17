@extends('layouts.app')

@section('content')
  <h1>Add Recipe</h1>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('recipes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Ingredients</label>
      <textarea name="ingredients" class="form-control" required>{{ old('ingredients') }}</textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Instructions</label>
      <textarea name="instructions" class="form-control" required>{{ old('instructions') }}</textarea>
    </div>
    <button class="btn btn-primary">Save</button>
  </form>

@endsection
