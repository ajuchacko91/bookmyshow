@extends('layouts.app')

@section('content')

  @if($movies->count() > 0)

  <div class="container">
    <h3 class="display-6">Movies</h3>
    <hr class="my-2">

    @if(Auth::user())
    <a href="{{route('movies.create')}}"><button type="button" class="btn btn-primary mb-4">New Movie</button></a>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

   @endif
    <div class="row">
@foreach($movies as $movie)

      <div class="card mr-4 mt-4 col-xs-12 mx-auto" style="width: 18rem;">
      <a href="{{route('movies.show', ['id' => $movie->id])}}">  <img class="card-img-top" src="{{asset('images/'.$movie->image)}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$movie->name}}</h5></a>
          <p class="card-text">{{str_limit($movie->summary, 40)}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{$movie->language}} / {{$movie->genre}}</li>
          <li class="list-group-item">{{$movie->formatted_date}}</li>
        </ul>
        @if(Auth::user())
        <div class="card-body mx-auto">
          {{-- <a href="{{route('movies.edit', ['id' => $movie->id])}}" class="card-link">
            <button type="button" class="btn btn-primary">Edit</button></a> --}}
            <form class="" action="{{route('movies.edit', ['id' => $movie->id])}}" method="get">
              @csrf
              <input type="submit" class="btn btn-primary mt-2 ml-2" value="Edit"></input>
            </form>

          <form class="" action="{{route('movies.destroy', ['id' => $movie->id])}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-grey mt-2 ml-2" value="Delete"></input>
          </form>
          {{-- <a href="#" class="card-link">Another link</a> --}}
        </div>
      @endif
      </div>

@endforeach
    </div>

    <div class="row mt-5">
      {{-- <div class="mx-auto"> {{ $movies->links() }} --}}
      </div>
      </div>
    </div>


@endif




@if($casts->count() > 0 )
      <div class="container">
        <h3 class="display-6">Casts</h3>
        <hr class="my-2">

        @if(Auth::user())
          <a href="{{route('casts.create')}}"><button type="button" class="btn btn-primary mb-3">New Cast</button></a>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        @endif
        <div class="row justify-content-center">
    @foreach($casts as $cast)

          <div class="card mr-4 mt-4 col-xs-12 " style="width: 18rem;">
            <a href="{{route('casts.show', ['id' => $cast->id])}}"><img class="card-img-top" class="img-fluid" src="{{asset('casts/'.$cast->image)}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$cast->name}}</h5></a>
              <p class="card-text">{{str_limit($cast->details, 40)}}</p>
            </div>
            {{-- <ul class="list-group list-group-flush">
              <li class="list-group-item">{{$cast->birth}}</li>
            </ul> --}}
            @if(Auth::user())
            <div class="card-body mx-auto">
              {{-- <a href="{{route('casts.edit', ['id' => $cast->id])}}" class="card-link">
                <button type="button" class="btn btn-primary">Edit</button></a> --}}
                <form class="" action="{{route('casts.edit', ['id' => $cast->id])}}" method="get">
                  @csrf
                  <input type="submit" class="btn btn-primary mt-2 ml-2" value="Edit"></input>
                </form>

              <form class="" action="{{route('casts.destroy', ['id' => $cast->id])}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-grey mt-2 ml-2" value="Delete"></input>
              </form>
              {{-- <a href="#" class="card-link">Another link</a> --}}
            </div>
          @endif
          </div>

    @endforeach
        </div>

@endif

@if($movies->count() == 0 && $casts->count() == 0 )
  <div class="row mt-5">
    <div class="mx-auto">
      <h1>Sorry No results Found!!!</h1>
    </div>
    </div>

@endif

@endsection
