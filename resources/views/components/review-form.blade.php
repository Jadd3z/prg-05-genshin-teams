{{-- resources/views/components/review-form.blade.php --}}

@props(['product'])

<div class="mt-4">
    <h3>Add a Review</h3>
    {{-- Form posts to the reviews.store route --}}
    <form method="POST" action="{{ route('reviews.store', $team) }}">
        @csrf

        {{-- Review Body --}}
        <div>
            <label for="body">Your Review:</label>
            <textarea name="body" id="body" rows="3" required>{{ old('body') }}</textarea>
            @error('body')
            <div class="error">{{ $message }}</div> @enderror
        </div>

        {{-- Rating --}}
        <div>
            <label for="rating">Rating (1-5):</label>
            <input type="number" name="rating" id="rating" min="1" max="5" value="{{ old('rating', 5) }}" required>
            @error('rating')
            <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Submit Review</button>
    </form>
</div>
