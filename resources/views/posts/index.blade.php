<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
		<div class="content">
			@if (Route::has('login'))
                <div class="top-right links">
                    @if(session('user_id'))
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
			<hr/>
			<a class="btn btn-primary" href="{{route('posts.create')}}"> Add Post </a>
			<hr/>
			<table class="table">
				<tr>
					<th>Sr.No.</th>
					<th>Title</th>
					<th>Body</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
				<tbody>
					@if(!empty($posts))
						@foreach($posts as $key => $post)
							<tr>
								<td>{{($key + 1)}}</td>
								<td>{{$post->title}}</td>
								<td>{{$post->body}}</td>
								<td>{{$post->created_at}}</td>
								<td>
									<a href="{{route('posts.view', $post->id)}}" class="btn btn-primary" title="View">View</a>&nbsp;
									@if($user_id == $post->created_by || session('is_admin') == '1')
										<a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary" title="Edit">Edit</a>&nbsp;
										<a href="{{route('posts.delete', $post->id)}}" class="btn btn-primary" title="Delete">Delete</a>
									@endif
								</td>
							</tr>
						@endforeach
					@else
							<tr>
								<td>No Results</td>
							</tr>
					@endif
				</tbody>
			</table>
		</div>
    </body>
</html>
