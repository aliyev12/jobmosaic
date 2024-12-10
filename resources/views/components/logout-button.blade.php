<form method="POST" action="{{ route('logout') }}" class="px-4 py-2 md:p-0">
    @csrf
    <button class="text-white flex" type="submit">
        <i class="mr-2" data-feather="log-out"></i> Logout
    </button>
</form>
