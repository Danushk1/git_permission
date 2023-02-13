@if (Route::has('login'))

@auth

@extends('layouts.app')

@section('content')


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD With Multiple Image Upload</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>

    <div class="container" style="margin-top: 50px;">


        <h3 class="text-center text-danger"><b>Laravel CRUD With Multiple Image Upload</b> </h3>
        @can('create')
        <a href="/create" class="btn btn-outline-success">Add New Post</a>
        @endcan
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Cover</th>
                    @can('edit')
                    <th>Update</th>
                    @endcan
                    @can('delete')
                    <th>Delete</th>
                    @endcan
                </tr>
            </thead>
            <tbody>


                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{!!  $post->title !!}</td>
                    <td>{!! $post->author !!}</td>
                    <td>{!! $post->body !!}</td>



                    <td><img src="cover/{{ $post->cover }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
                    @can('edit')
                    <td><a href="/edit/{{ $post->id }}" class="btn btn-outline-primary">Update</a></td>
                    @endcan
                    <td>
                        @can('delete')
                        <form action="/delete/{{ $post->id }}" method="post">
                            <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?');" type="submit">Delete</button>
                            @csrf
                            @method('delete')
                        </form>
                        @endcan
                    </td>


                </tr>
                @endforeach

            </tbody>
        </table>
    </div>




</body>

</html>
@endsection

@else
<a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

@if (Route::has('register'))
<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
@endif
@endauth
</div>
@endif