@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts</div>
                <div class="card-body p-0">
                    <div class="m-3">
                        <a href="{{route("posts.create")}}"><button type="button" class="btn btn-success">Aggiungi Post</button></a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Stato</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="text-center">{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->slug}}</td>
                                    <td>
                                        <div class="mb-3">
                                            @if ($post->published)
                                                <h5><span class="badge badge-pill badge-success">Pubblicato</span></h5>
                                            @else
                                                <h5><span class="badge badge-pill badge-info text-white">Bozza</span></h5>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mb-3">
                                            @if ($post->category != null)
                                                <h5><span class="badge badge-pill badge-primary">{{$post->category->name}}</span></h5>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{route("posts.show", $post->id)}}"><button type="button" class="btn btn-primary">Visualizza</button></a>
                                        <a href="{{route("posts.edit", $post->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                                        <form class="d-inline" action="{{route("posts.destroy", $post->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection