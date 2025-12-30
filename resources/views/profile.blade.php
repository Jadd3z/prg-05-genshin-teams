@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name"
               value="{{ old('name', auth()->user()->name) }}" required>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"
               value="{{ old('email', auth()->user()->email) }}" required>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Save Changes</button>
</form>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="text-blue-500 hover:underline bg-transparent border-none p-0 cursor-pointer">
        Log Out
    </button>
</form>

<a href="{{ route('register') }}">
    Register
</a>
