<x-layout>
    <section class="flex flex-col items-center">
        <x-form action="login" buttonText="Login">
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-bold text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-bold text-gray-700"></label>Password</label>
                <input name="password" id="password" type="password" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:shadow-outline" />
            </div>
        </x-form>
        <x-messages />
        <a href="signup" class="inline-block w-max px-4 py-2 mt-2 mr-2 font-bold text-white bg-blue-700 rounded-full hover:bg-blue-400 focus:shadow-outline my-4">Create an account</a>
    </section>
</x-layout>
