@extends('landing')
@section('content')
<!-- MAIN CONTAINER -->
<section class="main-container" >
    <div class="location" id="home">
        <h1 id="home">Popular on Netflix <a class="create" href="{{ route('movies.create') }}">Create Movies</a></h1>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
        @endif
        <div class="box">
            @foreach ($movie as $item)
            <div>
                <h4>{{ $item->movie_name }}</h4>
                <a href=""><img src="{{ $item->movie_image }}" alt="" style='width:250px; height: 150px;'></a>
                {{-- <a href=""><img src="https://github.com/carlosavilae/Netflix-Clone/blob/master/img/p2.PNG?raw=true" alt=""></a> --}}

                <p>{{ $item->movie_description }}</p>
                <span>{{ $item->movie_gener }}</span>
                <form action="{{ route('movies.destroy',$item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
                <a class="btn btn-primary" href="{{ route('movies.edit',$item->id) }}"><i class="far fa-edit"></i></a>
            </div>
            @endforeach
        </div>
    </div>
    

    
   
  <!-- END OF MAIN CONTAINER -->

  <!-- LINKS -->
  <section class="link">
    <div class="logos">
      <a href="#"><i class="fab fa-facebook-square fa-2x logo"></i></a>
      <a href="#"><i class="fab fa-instagram fa-2x logo"></i></a>
      <a href="#"><i class="fab fa-twitter fa-2x logo"></i></a>
      <a href="#"><i class="fab fa-youtube fa-2x logo"></i></a>
    </div>
    <div class="sub-links">
      <ul>
        <li><a href="#">Audio and Subtitles</a></li>
        <li><a href="#">Audio Description</a></li>
        <li><a href="#">Help Center</a></li>
        <li><a href="#">Gift Cards</a></li>
        <li><a href="#">Media Center</a></li>
        <li><a href="#">Investor Relations</a></li>
        <li><a href="#">Jobs</a></li>
        <li><a href="#">Terms of Use</a></li>
        <li><a href="#">Privacy</a></li>
        <li><a href="#">Legal Notices</a></li>
        <li><a href="#">Corporate Information</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>
  </section>
  <!-- END OF LINKS -->
@endsection
