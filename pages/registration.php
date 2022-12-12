<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>

<body>
    <?php
    require_once(__DIR__ . "/../config.php");
    require(SITE_ROOT . "/logic/Controller.php");
    $controller = new Controller();
    $places = $controller->getAllPlaces();

    ?>
    <h2>Register an account</h2>
    <form action="" method="post">
        <label for="firstName">First name: </label>
        <input type="text" name="firstName" id="firstName" required>
        <br>
        <label for="lastName">Last name: </label>
        <input type="text" name="lastName" id="lastName" required>
        <br>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" required>
        <br>
        <label for="places">Place: </label>
        <select name="places" id="places">
            <?php foreach ($places as $place) { ?>
                <option value="<?php echo $place->get_id(); ?>"><?php echo $place->get_name(); ?></option>
            <?php } ?>
        </select>
        <br>
        <input type="submit" name="registracija" value="Registruj">
    </form>
</body>

</html>