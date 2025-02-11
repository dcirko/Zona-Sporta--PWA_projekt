<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <header id="top">
        <div>
            <a href="index.php"><h1>Zona Sporta</h1></a>
            <nav>
                <ul>
                    <li><a href="index.php">Početna</a></li>
                    <li><a href="kategorija.php?kategorija=Nogomet">Nogomet</a></li>
                    <li><a href="kategorija.php?kategorija=Košarka">Košarka</a></li>
                    <li><a href="kategorija.php?kategorija=Ostali Sportovi">Ostali Sportovi</a></li>
                    <li><a href="administracija.php">Administracija</a></li>
                    <li><a href="unos.php">Unos</a></li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="odjava.php">Odjava (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    <section id="forma">
        <article class="middle">
            <?php
                if (isset($_GET['error'])) {
                    $error_message = $_GET['error'];
                    echo '<div class="error-message">' . $error_message . '</div>';
                    echo '<br>';
                }
            ?>
            <h2>Admin Login:</h2>
            <br>
            <br>
            <form action="login.php" method="POST">
                <label for="username">Korisničko ime:</label>
                <input type="text" id="username" name="username" required><br><br>
                
                <label for="password">Lozinka:</label>
                <input type="password" id="password" name="password" required><br><br>
                
                <button type="submit" name="prijava">Prijavi se</button>
            </form>
            <br>
        </article>
        <?php
            include 'connect.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $prijavaImeKorisnika = $_POST['username'];
                $prijavaLozinkaKorisnika = $_POST['password'];

                $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
                $stmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) > 0) {
                        mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
                        mysqli_stmt_fetch($stmt);

                        if (password_verify($prijavaLozinkaKorisnika, $lozinkaKorisnika)) {
                            $_SESSION['username'] = $imeKorisnika;
                            $_SESSION['level'] = $levelKorisnika;
                            header("Location: index.php");
                            exit();
                        } else {
                            $error_message = "Password is incorrect. Please try again.";
                            header("Location: login.php?error=" . urlencode($error_message));
                            exit();
                        }
                    } else {
                        $error_message = "Username not found. Please register.";
                        header("Location: registracija.php?error=" . urlencode($error_message));
                        exit();
                    }
                }
                mysqli_stmt_close($stmt);
            }
        ?>
    </section>
    <footer id="bot">
        <div>
            <h3>Domagoj Čirko</h3>
            <h3>dcirko@tvz.hr</h3>
            <h3>2024</h3>
        </div>
    </footer>
</body>
</html>
