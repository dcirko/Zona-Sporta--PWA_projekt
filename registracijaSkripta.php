<?php
include 'connect.php';

$ime = '';
$prezime = '';
$username = '';
$lozinka = '';
$msg = '';
$registriranKorisnik = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ime'], $_POST['prezime'], $_POST['username'], $_POST['pass'])) {
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $username = $_POST['username'];
        $lozinka = $_POST['pass'];
        $hashed_password = password_hash($lozinka, PASSWORD_BCRYPT); 
        $razina = 0; 

        $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $msg = 'Korisničko ime već postoji!';
        } else {
            $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
                mysqli_stmt_execute($stmt);
                $registriranKorisnik = true;
            }
        }
        header("Location: index.php");
    } else {
        $msg = 'Sva polja moraju biti ispunjena.';
    }

    mysqli_close($dbc);
}
?>