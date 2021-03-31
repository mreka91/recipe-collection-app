<form action="login" method="post">
    @csrf
    <label for="email">Email</label>
    <input type="email" id="email" name="email">
    <label for="password">Password</label>
    <input name="password" id="password" type="password" />
    <button type="submit">Login</button>
</form>
<hr>
<form action="signup" method="post">
    @csrf
    <label for="username">Username</label>
    <input type="text" id="username" name="username">
    <label for="email">Email</label>
    <input type="email" id="email" name="email">
    <label for="password">Password</label>
    <input name="password" id="password" type="password" />
    <label for="password">Password vertify</label>
    <input name="password_vertify" id="password_vertify" type="password" />
    <button type="submit">Sign up</button>
</form>
@if ($errors->any())
    {{$errors->first()}}
@endif
