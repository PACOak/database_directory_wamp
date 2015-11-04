<h1>Here are my post images!</h1>

@forelse ($posts as $post)
    <img src="{{ $post->content }}" />
@empty
    <p>Sorry no posts!</p>
@endforelse
