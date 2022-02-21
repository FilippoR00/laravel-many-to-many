@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{$post->title}}</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route("posts.edit", $post->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                        <form class="d-inline" action="{{route("posts.destroy", $post->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                    <div class="tags d-flex">
                        <div class="my-3 mr-3">
                            @if ($post->published)
                                <h5>Stato: <span class="badge badge-pill badge-success">Pubblicato</span></h5>
                            @else
                                <h5>Stato: <span class="badge badge-pill badge-info text-white">Bozza</span></h5>
                            @endif
                        </div>
                        <div class="my-3">
                            @if ($post->category != null)
                            <h5>Categoria: <span class="badge badge-pill badge-primary">{{$post->category->name}}</span></h5>
                            @endif
                        </div>
                    </div>
                    <div>
                        <div>
                            @if ($post->image)
                            <img src="{{asset("storage/$post->image")}}" alt="{{$post->title}}.' image'">
                            @endif
                        </div>
                        <div>
                            @if (count($post->tags) > 0)
                                <h5 class="d-inline">Tags:</h5>
                                @foreach ($post->tags as $tag)
                                <h5 class="d-inline"><span class="badge badge-pill badge-success">{{$tag->name}}</span></h5>
                                @endforeach
                            @endif
                        </div>
                        <div class="my-3">
                            {{$post->content}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection