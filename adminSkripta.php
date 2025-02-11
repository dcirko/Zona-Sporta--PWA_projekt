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
    <section id="forma">
        <article class="admin">
        <?php 
            include 'connect.php'; 
            define('UPLPATH', 'img/'); 
            $query = "SELECT id, naslov FROM vijesti"; 
            $result = mysqli_query($dbc, $query);  

            if (isset($_POST['id']) && !isset($_POST['update']) && !isset($_POST['delete'])) {
                $id = $_POST['id'];
                $query = "SELECT * FROM vijesti WHERE id = $id";
                $result = mysqli_query($dbc, $query);
                $vijest = mysqli_fetch_assoc($result);

                echo '<form enctype="multipart/form-data" action="" method="POST"> 
                        <div class="form-item"> 
                            <label for="title">Naslov vijesti:</label> 
                            <div class="form-field"> 
                                <input type="text" name="title" class="form-field-textual" value="'.$vijest['naslov'].'"> 
                            </div> 
                        </div> 
                        <div class="form-item"> 
                            <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label> 
                            <div class="form-field"> 
                                <textarea name="about" cols="30" rows="10" class="form-field-textual">'.$vijest['sažetak'].'</textarea> 
                            </div> 
                        </div> 
                        <div class="form-item"> 
                            <label for="content">Sadržaj vijesti:</label> 
                            <div class="form-field"> 
                                <textarea name="content" cols="30" rows="10" class="form-field-textual">'.$vijest['tekst'].'</textarea> 
                            </div> 
                        </div> 
                        <div class="form-item"> 
                            <label for="pphoto">Slika:</label> 
                            <div class="form-field"> 
                                <input type="file" class="input-text" id="pphoto" name="pphoto"/> 
                                <div></div>
                                <br><img src="' . UPLPATH . $vijest['slika'] . '" width="300px" padding="20px"> 
                            </div> 
                        </div> 
                        <div class="form-item"> 
                            <label for="category">Kategorija vijesti:</label> 
                            <div class="form-field"> 
                                <select name="category" class="form-field-textual" value="'.$vijest['kategorija'].'"> 
                                    <option value="Nogomet">Nogomet</option> 
                                    <option value="Košarka">Košarka</option>
                                    <option value="Ostali Sportovi">Ostali Sportovi</option> 
                                </select> 
                            </div> 
                        </div> 
                        <div class="form-item"> 
                            <label>Spremiti u arhivu:  
                            <div class="form-field">'; 
                                if($vijest['arhiva'] == 0) { 
                                    echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?'; 
                                } else { 
                                    echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?'; 
                                } 
                            echo '</div> 
                            </label> 
                        </div> 
                        <div class="form-item"> 
                            <input type="hidden" name="id" class="form-field-textual" value="'.$vijest['id'].'"> 
                            <button type="reset" value="Poništi">Poništi</button> 
                            <button type="submit" name="update" value="Prihvati">Izmijeni</button> 
                        </div> 
                    </form>';
            }


            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $about = $_POST['about'];
                $content = $_POST['content'];
                $category = $_POST['category'];
                $archive = isset($_POST['archive']) ? 1 : 0;
                $picture = $_FILES['pphoto']['name'];

                if ($picture) {
                    $target_dir = 'img/' . $picture;
                    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
                    $query = "UPDATE vijesti SET naslov='$title', sažetak='$about', tekst='$content', slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id";
                } else {
                    $query = "UPDATE vijesti SET naslov='$title', sažetak='$about', tekst='$content', kategorija='$category', arhiva='$archive' WHERE id=$id";
                }

                if (mysqli_query($dbc, $query)) {
                    echo "Record updated successfully";
                    header("Location: administracija.php");
                    exit(); 
                } else {
                    echo "Error updating record: " . mysqli_error($dbc);
                }
            }else if (isset($_POST['delete'])) {
                $id = $_POST['id'];
                $deleteQuery = "DELETE FROM vijesti WHERE id = $id";

                if (mysqli_query($dbc, $deleteQuery)) {
                    echo "Record updated successfully";
                    header("Location: administracija.php");
                    exit();
                } else {
                    echo "Error updating record: " . mysqli_error($dbc);
                }
            }
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