@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modifica Post: {{$post->title}}</div>
                <div class="card-body">
                    <form action="{{route("posts.update", $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="title">Titolo:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del post" value="{{old("title") ?? $post->title}}">
                            @error("title")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Contenuto:</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="6" name="content" placeholder="Inserisci il contenuto del post">{{old("content") ?? $post->content}}</textarea>
                            @error("content")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Categoria:</label>
                            <select class="custom-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                                <option value="">Seleziona una categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{old("category_id", $post->category_id) == "$category->id" ? "selected" : ""}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error("category_id")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p>Tags:</p>
                            @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                @if (old("tags"))
                                    <input type="checkbox" class="form-check-input @error('tags') is-invalid @enderror" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array($tag->id, old("tags", [])) ? "checked" : ""}}>
                                @else
                                    <input type="checkbox" class="form-check-input @error('tags') is-invalid @enderror" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{$post->tags->contains($tag) ? "checked" : ""}}>
                                @endif
                                    <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                            </div>
                            @endforeach
                            @error("tags")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <label class="d-block">Pubblica post:</label>
                            <div class="form-group form-check">
                                @php
                                    $checked = old("published") ?? $post->published;
                                @endphp
                                <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{$checked ? "checked" : ""}}>
                                <label class="form-check-label" for="published">Pubblica</label>
                                @error("published")
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="custom-file form-group mb-4">
                            @if ($post->image)
                                <img height="50px" src="{{asset("storage/$post->image")}}" alt="{{$post->title}}.' image'">
                            @endif
                            <label for="image">Aggiungi immagine</label>
                            <input type="file" class="@error('published') is-invalid @enderror" id="image" name="image">
                            @error("image")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Modifica post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection