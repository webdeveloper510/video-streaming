
@extends('layout.cdn')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
	<div class="container">
  <div class="row">
  @foreach ($artists as $artist)
  <a href="{{url('artistDetail/'.$artist->id)}}">
    <div class="col-md-4">
      <img src="{{url('storage/uploads/'.$artist->profilepicture) }}" class="rounded-circle" alt="Cinque Terre" width="304" height="236">
        <h2 class="my-5 h2">{{$artist->nickname}}</h2>
    </div>
</a>
    <br/>
    @endforeach
  </div>

​ {{$artists->links()}}
</body>
</html>
​
