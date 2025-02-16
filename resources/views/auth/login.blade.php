<x-layout>
    <div class="bg-white rounded-lg shadow-md border w-full md:max-w-xl mx-auto mt-12 p-8 py-12">
        <h2 class="text-4xl text-center font-bold mb-4">Login</h2>
        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <x-inputs.text id="email" name="email" type="email" placeholder="Email address" />
            <x-inputs.text id="password" name="password" type="password" placeholder="Password" />

            <button type="submit" class="w-full button primary flex justify-center items-center">
                <i class="mr-2" data-feather="log-in"></i> Login
            </button>
            <p class="mt-4 ">Don't have an account? <a href="{{ route('register') }}" class="link">Register</a></p>

        </form>
    </div>
</x-layout>
