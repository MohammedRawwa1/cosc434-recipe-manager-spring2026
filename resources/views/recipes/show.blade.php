@extends('layouts.app')

@section('content')
  <h1>{{ $recipe->name }}</h1>

  @if($recipe->description)
    <p><strong>Description:</strong> {{ $recipe->description }}</p>
  @endif

  <h5>Ingredients</h5>
  <p style="white-space: pre-wrap">{{ $recipe->ingredients }}</p>

  <h5>Instructions</h5>
  <p style="white-space: pre-wrap">{{ $recipe->instructions }}</p>

  <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-secondary">Edit</a>
  <a href="{{ route('recipes.index') }}" class="btn btn-link">Back</a>

@endsection
