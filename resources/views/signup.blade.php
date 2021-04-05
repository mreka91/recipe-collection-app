<x-layout>
    <x-form action="signup" buttonText="Signup">
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" />
        <label for="password">Confirm password</label>
        <input name="password_confirmation" id="password_confirmation" type="password" />
    </x-form>
    <x-errors/>
    <a href="login">Login</a>
</x-layout>
