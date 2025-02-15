<form method="POST" action="{{ route('logout') }}" class="px-4 py-2 md:p-0">
    @csrf
    <button class="flex" type="submit" class="lav-link">
        Logout
    </button>
</form>
