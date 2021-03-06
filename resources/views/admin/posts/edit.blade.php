@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Aggiorna il Post</h1>

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo del Post"
                    value={{ old('title') ?? $post->title }}>
            </div>
            <div class="form-group">
                <label for="content">Descrizione</label>
                <textarea class="form-control" id="content" name="content" placeholder="Inserisci la descrizione del prodotto"
                    value={{ old('content') ?? $post->content }}></textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select name="category_id">
                    <option value="">-----</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @foreach ($tags as $elemento)
                <div class="form-check">
                    <input class="form-check-input"  id="{{$elemento->slug}}" type="checkbox" name="tags[]" value="{{$elemento->id}}" 
                    @if ($errors->any())
                        {{in_array($elemento->id, old('tags', [])) ? " checked" : ""}}
                    @else
                        {{$post->tags->contains($elemento) ? " checked" : ""}}
                    @endif
                    >
                    <label class="form-check-label" for="{{$elemento->slug}}">
                        {{$elemento->name}}
                    </label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Aggiorna</button>
        </form>
    </div>
@endsection