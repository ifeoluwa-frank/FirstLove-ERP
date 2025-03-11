<h1>We made it</h1>

<form method="POST" action="{{ route('bacenta.logout') }}">
    @csrf
    <button>Logout</button>
</form>
