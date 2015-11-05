<html>
<head>
  <title>{{ config('blog.title') }}</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
        rel="stylesheet">
</head>
<body>

  @if(Auth::check())
    Hello {{ Auth::user()->name }}! | <a href="auth/logout">Logout</a>
  @else
    <a href="auth/login">Login</a> | <a href="auth/register">Register</a>
  @endif

  <div class="container">
    <h1>{{ config('blog.title') }}</h1>
    <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
    <hr>
    <ul>
      @foreach ($posts as $post)
        <li>
          <a href="/blog/public/blog/{{ $post->slug }}">{{ $post->title }}</a>
          <em>({{ $post->published_at->format('M jS Y g:ia') }})</em>
          <p>
            {{ str_limit($post->content) }}
          </p>
        </li>
      @endforeach
    </ul>
    <hr>
    {!! $posts->render() !!}
  </div>
</body>
</html>
