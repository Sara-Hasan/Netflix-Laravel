<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Netflix</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Movies: </h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('movies.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Movies Name:</strong>
<input type="text" name="movie_name" class="form-control" placeholder="movies Name">
@error('movie_name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Movies desc:</strong>
<input type="text" name="movie_description" class="form-control" placeholder="movies Desc">
@error('movie_description')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Movies gener:</strong>
<input type="text" name="movie_gener" class="form-control" placeholder="movies gener">
@error('movie_gener')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label for="img">Image Upload</label>
        <input type="file" name="movie_image" id="img" required>
    @error('movie_image')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>