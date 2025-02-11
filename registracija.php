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
    <title>Registracija</title>
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
                if (isset($_SESSION['error_message'])) {
                    echo '<p>' . $_SESSION['error_message'] . '</p>';
                    echo '<br>';
                    unset($_SESSION['error_message']);
                }
            ?>
            <h2>Registracija:</h2>
            <br>
            <form enctype="multipart/form-data" action="registracijaSkripta.php" method="POST">
                <div class="form-item">
                    <label for="username">Korisničko ime:</label>
                    <span id="porukaUsername" class="bojaPoruke"></span>
                    <div class="form-field">
                        <input type="text" name="username" id="username" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <label for="ime">Ime:</label>
                    <span id="porukaIme" class="bojaPoruke"></span>
                    <div class="form-field">
                        <input type="text" name="ime" id="ime" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <label for="prezime">Prezime:</label>
                    <span id="porukaPrezime" class="bojaPoruke"></span>
                    <div class="form-field">
                        <input type="text" name="prezime" id="prezime" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <label for="pass">Lozinka:</label>
                    <span id="porukaPass" class="bojaPoruke"></span>
                    <div class="form-field">
                        <input type="password" name="pass" id="pass" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <label for="passRep">Ponovite lozinku:</label>
                    <span id="porukaPassRep" class="bojaPoruke"></span>
                    <div class="form-field">
                        <input type="password" name="passRep" id="passRep" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <button type="submit" value="Prijava" id="slanje">Prijava</button>
                </div>
            </form>
        </article>
    </section>
    <footer id="bot">
        <div>
            <h3>Domagoj Čirko</h3>
            <h3>dcirko@tvz.hr</h3>
            <h3>2024</h3>
        </div>
    </footer>
    <script type="text/javascript"> 
        document.getElementById("slanje").onclick = function(event) { 
            var slanjeForme = true; 
            
            var poljeIme = document.getElementById("ime"); 
            var ime = poljeIme.value; 
            if (ime.length == 0) { 
                slanjeForme = false; 
                poljeIme.style.border="1px dashed red"; 
                document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>"; 
            } else { 
                poljeIme.style.border="1px solid green"; 
                document.getElementById("porukaIme").innerHTML=""; 
            } 
            
            var poljePrezime = document.getElementById("prezime"); 
            var prezime = poljePrezime.value; 
            if (prezime.length == 0) { 
                slanjeForme = false; 
                poljePrezime.style.border="1px dashed red"; 
                document.getElementById("porukaPrezime").innerHTML="<br>Unesite prezime!<br>"; 
            } else { 
                poljePrezime.style.border="1px solid green"; 
                document.getElementById("porukaPrezime").innerHTML=""; 
            } 

            var poljeUsername = document.getElementById("username"); 
            var username = poljeUsername.value; 
            if (username.length == 0) { 
                slanjeForme = false; 
                poljeUsername.style.border="1px dashed red"; 
                document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>"; 
            } else { 
                poljeUsername.style.border="1px solid green"; 
                document.getElementById("porukaUsername").innerHTML=""; 
            } 
            
            var poljePass = document.getElementById("pass"); 
            var pass = poljePass.value; 
            var poljePassRep = document.getElementById("passRep"); 
            var passRep = poljePassRep.value; 
            if (pass.length == 0 || passRep.length == 0 || pass != passRep) { 
                slanjeForme = false; 
                poljePass.style.border="1px dashed red"; 
                poljePassRep.style.border="1px dashed red"; 
                document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu iste!<br>"; 
                document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu iste!<br>"; 
            } else { 
                poljePass.style.border="1px solid green"; 
                poljePassRep.style.border="1px solid green"; 
                document.getElementById("porukaPass").innerHTML=""; 
                document.getElementById("porukaPassRep").innerHTML=""; 
            } 
            if (slanjeForme != true) { 
                event.preventDefault(); 
            } 
        }; 
    </script>

</body>
</html>
