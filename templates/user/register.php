<main>
    <form action="/login" method="POST">
        <label for="name">name</label>
        <input type="text" name="name" id="name" required>
        <label for="firstname">firstname</label>
        <input type="text" name="firstname" id="firstname" required>

        <label for="email">email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">password</label>
        <input type="password" name="password" id="password" minlength="8" required>

        <label for="passwordConfirm">password confirm</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm" minlength="8" required>

        <button type="submit">login</button>
    </form>
</main>