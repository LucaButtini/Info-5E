<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
</head>
<body>
<h2>Registrati</h2>
<form action="registerAction.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <label for="role">Ruolo:</label>
    <select name="role" id="role" required>
        <option value="student">Studente</option>
        <option value="teacher">Docente</option>
        <option value="parent">Genitore</option>
        <option value="staff">Personale</option>
    </select>

    <button type="submit">Registrati</button>
</form>
</body>
</html>
