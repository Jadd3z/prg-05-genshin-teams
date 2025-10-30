{{-- resources/views/products/show.blade.php --}}

<h1>{{ $team->name }}</h1>
<p>{{ $team->description }}</p>

{{-- Display Reviews --}}
<h2>Customer Reviews</h2>
@forelse ($team->reviews as $review)
    <div>
        <p>Rating: {{ $review->rating }}/5</p>
        <p>{{ $review->body }}</p>
        <hr>
    </div>
@empty
    <p>No reviews yet.</p>
@endforelse

{{-- Review Form Component --}}
<x-review-form :product="$team"/>
