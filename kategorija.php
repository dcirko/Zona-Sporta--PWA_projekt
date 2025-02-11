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
        define('UPLPATH', 'img/');  
        $kategorija=$_GET['kategorija'];
    ?> 
    <section id="mid">
        <section class="kategorija">
            <h2><?php echo $kategorija?></h2>
            <hr>
            <div class="red">
            <?php 
                $query = "SELECT * FROM vijesti WHERE kategorija='$kategorija' ORDER BY id DESC";                
                $result = mysqli_query($dbc, $query); 
                $i=0; 
                while($row = mysqli_fetch_array($result)) {  
                    echo '<div class="clanak">'; 
                    echo '<div class="slika">';
                    echo '<a href="clanak.php?id=' . $row['id'] . '">';
                    echo '<img src="' . UPLPATH . $row['slika'] . '" class="image">';
                    echo '</a>';
                    echo '</div>'; 
                    echo '<div class="media_body">'; 
                    echo '<h4 class="title">'; 
                    echo '<a href="clanak.php?id=' . $row['id'] . '">'; 
                    echo $row['naslov']; 
                    echo '</a></h4>'; 
                    echo '</div></div>';  
                }
            ?>
           </div>  
        </section>
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