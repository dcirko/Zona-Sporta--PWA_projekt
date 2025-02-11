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
    <title>Unos</title>
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
            <form action="insert.php" method="POST" enctype="multipart/form-data"> 
                <div class="form-item"> 
                    <span id="porukaTitle" class="bojaPoruke"></span>
                    <label for="title">Naslov vijesti</label> 
                    <div class="form-field"> 
                        <input type="text" id="title" name="title" class="form-field-textual"> 
                    </div> 
                </div> 
                <div class="form-item"> 
                    <span id="porukaAbout" class="bojaPoruke"></span>
                    <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label> 
                    <div class="form-field"> 
                        <textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"></textarea> 
                    </div> 
                </div> 
                <div class="form-item"> 
                    <span id="porukaContent" class="bojaPoruke"></span>
                    <label for="content">Sadržaj vijesti</label> 
                    <div class="form-field"> 
                        <textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea> 
                    </div> 
                </div> 
                <div class="form-item"> 
                    <span id="porukaSlika" class="bojaPoruke"></span>
                    <label for="pphoto">Slika: </label> 
                    <div class="form-field"> 
                        <input type="file" id="pphoto" accept="image/jpg,image/gif" class="input-text" name="pphoto"/> 
                    </div> 
                </div> 
                <div class="form-item"> 
                    <span id="porukaKategorija" class="bojaPoruke"></span>
                    <label for="category">Kategorija vijesti</label> 
                    <div class="form-field"> 
                        <select name="category" id="category" class="form-field-textual"> 
                            <option value="Nogomet">Nogomet</option> 
                            <option value="Košarka">Košarka</option> 
                            <option value="Ostali Sportovi">Ostali Sportovi</option> 
                        </select> 
                    </div> 
                </div> 
                <div class="form-item"> 
                    <label>Spremiti u arhivu:  
                        <div class="form-field"> 
                            <input type="checkbox" name="archive"> 
                        </div> 
                    </label> 
                </div> 
                <div class="form-item"> 
                    <button type="reset" value="Poništi">Poništi</button> 
                    <button type="submit" value="Prihvati" id="slanje">Prihvati</button> 
                </div> 
            </form>
        </article>
        <script type="text/javascript"> 
            document.getElementById("slanje").onclick = function(event) { 
                var slanjeForme = true; 
                
                var poljeTitle = document.getElementById("title"); 
                var title = poljeTitle.value; 
                if (title.length < 5 || title.length > 50) { 
                    slanjeForme = false; 
                    poljeTitle.style.border="1px dashed red"; 
                    document.getElementById("porukaTitle").innerHTML="Naslov vijesti mora imati između 5 i 50 znakova!<br>"; 
                } else { 
                    poljeTitle.style.border="1px solid green"; 
                    document.getElementById("porukaTitle").innerHTML=""; 
                } 
                
                var poljeAbout = document.getElementById("about"); 
                var about = poljeAbout.value; 
                if (about.length < 10 || about.length > 100) { 
                    slanjeForme = false; 
                    poljeAbout.style.border="1px dashed red"; 
                    document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>"; 
                } else { 
                    poljeAbout.style.border="1px solid green"; 
                    document.getElementById("porukaAbout").innerHTML=""; 
                } 

                var poljeContent = document.getElementById("content"); 
                var content = poljeContent.value; 
                if (content.length == 0) { 
                    slanjeForme = false; 
                    poljeContent.style.border="1px dashed red"; 
                    document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>"; 
                } else { 
                    poljeContent.style.border="1px solid green"; 
                    document.getElementById("porukaContent").innerHTML=""; 
                } 
        
                var poljeSlika = document.getElementById("pphoto"); 
                var pphoto = poljeSlika.value; 
                /*if (pphoto.length == 0) { 
                    slanjeForme = false; 
                    poljeSlika.style.border="1px dashed red"; 
                    document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>"; 
                } else { 
                    poljeSlika.style.border="1px solid green"; 
                    document.getElementById("porukaSlika").innerHTML=""; 
                } */
        
                var poljeCategory = document.getElementById("category"); 
                if(poljeCategory.selectedIndex == -1) { 
                    slanjeForme = false; 
                    poljeCategory.style.border="1px dashed red"; 
                    document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>"; 
                } else { 
                    poljeCategory.style.border="1px solid green"; 
                    document.getElementById("porukaKategorija").innerHTML=""; 
                } 

                if (slanjeForme != true) { 
                    event.preventDefault(); 
                } 
            }; 
        </script>
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
