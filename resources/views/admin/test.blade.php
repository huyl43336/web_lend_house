<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($houses as $house)
    <h1>{{$house->title}}</h1>
    @foreach($house->imagePosts as $imagePost)
    <h2>{{$imagePost->image_url}}</h2>
   
    @endforeach
 
    @endforeach
</body>
</html>