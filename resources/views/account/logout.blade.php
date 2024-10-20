<form action="{{ route('logout') }}" method="get" style="display: inline;">
    @csrf
    <button type="submit">Logout</button>
</form>
