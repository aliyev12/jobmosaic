<x-layout>
    <div class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12">
        <h2 class="text-4xl text-center font-bold mb-4">Register</h2>
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <x-inputs.text id="name" name="name" placeholder="Full name" />
            <x-inputs.text id="email" name="email" type="email" placeholder="Email address" />
            <x-inputs.text id="password" name="password" type="password" placeholder="Password" />
            <x-inputs.text id="password_confirmation" name="password_confirmation" type="password"
                placeholder="Confirm password" />

            <div class="mb-4">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
            </div>

            <button type="submit" class="w-full button primary">
                <i class="mr-2" data-feather="user-plus"></i> Register
            </button>
            <p class="mt-4 text-gray-500">Already have an account? <a href="{{ route('login') }}"
                    class="link">Login</a></p>

        </form>
    </div>

</x-layout>
