@extends('layouts.app')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Recipes</h1>
    <a href="{{ route('recipes.create') }}" class="btn btn-primary">Add Recipe</a>
  </div>

  @if($recipes->count())
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($recipes as $recipe)
        <tr>
          <td>{{ $recipe->name }}</td>
          <td class="recipe-actions">
            <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-sm btn-primary text-white">Details</a>
            <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-sm btn-secondary">Edit</a>
            <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this recipe?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

    {{ $recipes->links() }}
  @else
    <p>No recipes yet. <a href="{{ route('recipes.create') }}">Add one</a>.</p>
  @endif
@endsection
