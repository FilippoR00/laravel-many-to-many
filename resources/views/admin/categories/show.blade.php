@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{$category->name}}</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route("categories.edit", $category->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                        <form class="d-inline" action="{{route("categories.destroy", $category->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                    <div class="my-3">
                        Slug: {{$category->slug}}
                        @if (count($category->post) > 0)
                            <h3 class="my-3">Lista post associati:</h3>
                            <ul>
                                @foreach ($category->post as $post)
                                    <li>{{$post->title}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection