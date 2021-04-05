<x-layout>
    <x-form action="login" buttonText="Login">
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" />
    </x-form>
    <x-errors/>
    <a href="signup">Create an account</a>
</x-layout>
