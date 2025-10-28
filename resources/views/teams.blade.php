<h1>Welcome to My Custom Page</h1>

@auth
    <div style="padding: 10px; border: 1px solid green;">
        🎉 **Hello, {{ Auth::user()->name }}!** You are successfully logged in.
        This content is **only visible** to authenticated users.
        <a href="{{ route('dashboard') }}">Go to Dashboard</a>
    </div>
@endauth

@guest
    <div style="padding: 10px; border: 1px solid red;">
        👋 **Welcome, Guest!** You are not logged in.
        This content is **only visible** to non-logged-in visitors.
        <a href="{{ route('login') }}">Log in here</a> or <a href="{{ route('register') }}">Register</a>.
    </div>
@endguest
