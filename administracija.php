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
    <title>Document</title>
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
    <?php 

        include 'connect.php';

        if (!isset($_SESSION['username']) || $_SESSION['level'] != 1) {
            $_SESSION['error_message'] = "You are not an admin.";
            header("Location: index.php");
            exit();
        }

        define('UPLPATH', 'img/');
    ?>
    <section id="formaAdmin">
        <article class="admin">
            <?php 
                $query = "SELECT id, naslov FROM vijesti"; 
                $result = mysqli_query($dbc, $query); 

                echo '<form action="adminSkripta.php" method="POST">
                        <div class="form-item"> 
                            <label for="title">Odaberi naslov vijesti:</label>
                        </div>
                        <div class="form-field"> 
                            <select name="id" class="form-field-textual" onchange="submitForm()"> 
                                <option value="">Odaberi vijest</option>';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="'.$row['id'].'">'.$row['naslov'].'</option>';
                                }
                        echo '      </select> 
                        </div>
                        <div class="form-item">
                            <button type="submit" name="select" value="Otvori">Otvori</button>
                            <button type="submit" name="delete" value="Delete">Delete</button>
                        </div>
                    </form>';
            ?>

        </article>
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