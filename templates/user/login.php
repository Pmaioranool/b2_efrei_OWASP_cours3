<main>
    <form action="/login" method="POST">
        <label for="email">email</label>
        <input type="email" name="email" id="email" required>
        <label for="password">password</label>
        <input type="password" name="password" id="password" minlength="8" required>
        <button type="submit">login</button>
    </form>
</main>