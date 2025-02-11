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
    <?php 
        include 'connect.php'; 
 
        $picture = $_FILES['pphoto']['name']; 
        $title=$_POST['title']; 
        $about=$_POST['about']; 
        $content=$_POST['content']; 
        $category=$_POST['category']; 
        $date=date('d.m.Y.'); 
        if(isset($_POST['archive'])){ 
            $archive=1; 
        }else{ 
            $archive=0; 
        } 
        
        $target_dir = 'img/'.$picture; 
        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir); 
        
        $query = "INSERT INTO vijesti (datum, naslov, sažetak, tekst, slika, kategorija, 
        arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture', 
        '$category', '$archive')"; 
        
        $result = mysqli_query($dbc, $query) or die('Error querying databese.'); 
        mysqli_close($dbc); 
    ?> 
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
    <section id="prikaz">
        <h1 class="category"><?php echo $category;?></h1> 
        <h1 class="title"><?php echo $title;?></h1> 
        <div class="slika">
            <?php 
                echo "<img src='img/$picture' class='responsive-img'>"; 
            ?>
        </div>
        <div class="about"> 
            <?php 
                echo $about; 
            ?> 
        </div>
        <div class="sadrzaj">
            <?php 
                echo $content; 
            ?> 
        </div>
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
    
    