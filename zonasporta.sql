-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 10:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zonasporta`
--
CREATE DATABASE IF NOT EXISTS `zonasporta` DEFAULT CHARACTER SET cp1250 COLLATE cp1250_croatian_ci;
USE `zonasporta`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(5, 'Domagoj', 'Čirko', 'dcirko', '$2y$10$qgndCTQJ1MuVVHmv73LSneaIkTfT4tH9MJw9Swf.JB7GrN4EvFsF.', 1),
(6, 'A', 'Rad', 'radovan123', '$2y$10$nEXUJjZKuT0LAfJkiB/ZyebfWVGVW8w9bHHGAQJACbsr/LF7FmnPm', 0),
(7, 'd', 'cafuta', 'cafuta', '$2y$10$GE4N6ptAZxcXy7mbkhnteOwYw/8BqtnO1XiFwzkarbOJy5nvYZQ9W', 0),
(8, 'd', 'd', 'dinamo', '$2y$10$FwaMpbfT5apfnKhQFZZsxuZM7qAxnEHnCPu./mPuZbL0dX47UbbZu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sažetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sažetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(33, '27.05.2024.', 'Dinamo Prvak!', 'Dinamo osvojio prvenstvo Hrvatske!', 'U svečarskoj atmosferi na maksimirskom ruglu, Dinamo je tek za jedan promil pokvario doživljaj, jer protiv najslabije momčadi SuperSport Hrvatske nogometne lige, Rudeša, propustio je vodstvo 3:1. Naime, na kraju je završilo 3:3. ', 'dinamoPrvak.jpg', 'Nogomet', 0),
(34, '27.05.2024.', 'Okupljanje Reprezentacije!!!', 'Okupila se Dalićeva Hrvatska, odmah počinje bitka za važnu poziciju?', 'Josip Juranović imao je teško sezonu s Union Berlinom koji je Bundesligu završio na 15. mjestu i jedva se spasio od ispadanja.\r\n\r\n- Uvijek kad dođem u reprezentaciju osjećam se kao doma. Možemo vidjeti obitelj i prijatelje, nema razloga za brige, svi smo sretni i nasmijani, tako i ja. ', 'repka.jpg', 'Nogomet', 0),
(35, '27.05.2024.', 'Chelsea pronašao novog trenera', 'Ovaj 44-godišnji Talijan trenersku je karijeru započeo u Ascoliju 2017. godine kao pomoćnik', 'Chelsea je u potrazi za novim trenerom, a po svemu sudeći, imaju rješenje na pomolu. Fabrizio Romano javlja da je londonski klub ušao u pregovore s talijanskim stručnjakom Enzom Marescom koji u ovom trenutku vodi Leicester City s kojim je izborio povratak u najviši rang engleskog nogometa.', 'chelsea.jpg', 'Nogomet', 0),
(37, '27.05.2024.', 'Čudesni Dončić i Irving ispisali povijest i doveli Dallas na pra', 'Dallas u srijedu ima priliku na svom terenu izboriti plasman u NBA finale', 'Dallas je sa 116:107 pobijedio Minnesotu i poveo 3:0 u finalu Zapadne konferencije NBA play-offa, te u idućoj utakmici imaju priliku doći u veliko finale jer se serija igra na četiri pobjede.\r\n\r\nTo će vjerojatno i napraviti u utakmicama koje dolaze jer se nikada u povijesti nije dogodilo da je neka ekipa prosula vodstvo od 3:0. I ovoga puta briljirali su Luka Dončić i Kyrie Irving. Njih su dvojica postigla po 33 poena, a Irving je upisao i tri skoka i četiri asistencije, dok je Dončić imao sedam skokova i pet asistencija čemu je dodao i pet ukradenih lopti.', 'nbaDallas.jpg', 'Košarka', 0),
(38, '27.05.2024.', 'Najpoznatijeg menadžera na Balkanu pitali tko je bolji, Jokić il', '?Mislim da više nikad neću pronaći igrača kakav je Jokić. On je jedinstven?, rekao je', 'Srpski košarkaški superagent Miško Ražnatović dao je intervju za španjolski Relevo, u kojem je između ostalog upitan i tko je za njega najveći europski košarkaš svih vremena. Kada je došlo vrijeme za konačni odabir, Ražnatović se dvojio između trenutnog NBA superstara, Nikole Jokića, i legendarnog Dražena Petrovića.\r\n\r\n- Dražen je moj idol iz djetinjstva. Zbog njega svugdje koristim broj četiri, koji je i dio moje e-mail adrese i mog imena na društvenim mrežama. Ali Nikola je trostruki MVP. Samo četvorica igrača u povijesti lige imaju više tih titula od njega. Iako je teško uspoređivati razdoblja, nije teško zaključiti koga smatram najboljim europskim košarkašem svih vremena - rekao je pa istaknuo:', 'drazen.jpg', 'Košarka', 0),
(41, '27.05.2024.', 'Najbolji Hrvat vratio formu uoči Europskog prvenstva: ?Vječno pi', 'o tome?\r\nNaš najbolji atletičar Filip Mihaljević sprema se za jaki miting, posljednji uoči smotre u Rimu', 'Zimski dio sezone nije prošao onako kako se nadao i kako je priželjkivao, ali nije to uzdrmalo najboljeg hrvatskog atletičara Filipa Mihaljevića (29). Ima već dovoljno iskustva iza sebe da zna kako se podići kad posrne, tako da nije bilo previše tugovanja, već su on i trener Marko Mastelić odmah zasukali rukave i krenuli s pripremama za najvažniji, ljetni dio sezone. U travnju je Filip iz treninga odradio manji miting u Splitu i bacio kuglu 20,80 metara, a onda je ?eksplodirao? prošli vikend na mitingu challenger serije u Slovenskoj Bistrici.', 'kugla.jpg', 'Ostali Sportovi', 0),
(42, '28.05.2024.', 'Jakirović: Peras mi je rekla da ima lošu vijest. Razgovarao sam', '?Čestitao je Mišković nakon Kupa, vidjeli smo se u tunelu, malo popričali?, kaže Sergej Jakirović.', 'Za kraj sezone u maksimirskom klubu novinari su sjeli s trenerom Sergejom Jakirovićem i u opuštenom razgovoru pretresli važne teme vezane uz osvajača trostruke krune. Ugodno je bilo, veselo, a kako i ne bi kad je Dinamo trijumfalno završio sezonu, a Profa je postao veliki trenerski dobitnik, uhvatio je duplu krune, Superkup je uzeo Igor Bišćan. Novinare su došli pozdraviti predstojnik ureda Velimira Zajeca, Sanjin Španović, sportski direktor Marko Marić, naravno bio je tu i glasnogovornik Marko Bošnir, a svi smo uživali u sjajnoj kavici koju je pripremila Goga... Dugo smo se zadržali s Profom, bilo je i zezancije, uglavnom, bilo je to sjajno druženje na kraju sezone, pobjedničkog hoda Dinama.', 'jakir2.jpg', 'Nogomet', 1),
(43, '30.05.2024.', 'Timberwolvesi konačno do pobjede protiv Luke Dončića i Dallasa, ', 'Luka Dončić je u ovom susretu ostvario svoj šesti triple-double u ovosezonskom doigravanju', '\r\nU četvrtom susretu finala doigravanja Zapadne konferencije NBA lige Minnesota Timberwolvesi su na gostovanju pobijedili Dallas Maverickse sa 105-100 smanjišvi na 1-3 u seriji na četiri pobjede.\r\n\r\nNakon što je poveo 3-0, Dallas je pred svojim navijačima u American Airlines Centru imao priliku zaključiti seriju, no Minnesota je pobjedom pokvarila već spremno slavlje domaćina.', 'nbaTimb.jpg', 'Košarka', 0),
(47, '06.06.2024.', 'Opći cirkus u Beogradu, slavi li Zvezda naslov?', '?Prvi put u povijesti naše košarke utakmica se prekinula zbog verbalnog incidenta?', 'Kako stvari stoje, Srbija ima novog košarkaškog prvaka bez da je do kraja odigrana druga utakmica finala Lige između Crvene zvezde i Partizana. Nakon što je derbi prekinut jer su igrači Zvezde napustili teren, izgleda da bi upravo momčad pod vodstvom Ioannisa Sfairopoulosa mogla potpuno profitirati.\r\n\r\nPisali smo, igrači Zvezde napustili su parket zbog niza uvreda s tribina. Protivnički navijači nisu štedjeli ni svoju ekipu Partizana, koja nije htjela nastaviti treću četvrtinu (rezultat 57:45 za Partizan) nakon što su suci naredili pražnjenje dvorane. Sat i pol vremena poslije prekida i evakuacije beogradske Arene, crveno-bijeli vratili su se na parket, ali igrači Partizana nisu se pojavili. Suci su pričekali još 15 minuta, odnosno pričekali da istekne vrijeme zagrijavanja, a kako se domaćin nije pojavio, meč je proglašen završenim. A epilog se neće svidjeti Partizanu,', 'srb.jpg', 'Košarka', 0),
(48, '07.06.2024.', 'Plazibat se vraća!', '?Sretan sam što sam se konačno vratio i što se Glory vraća u Hrvatsku prvi put nakon deset godina?', '\r\nNakon što je u lipnju prošle godine slomio ruku u borbi za naslov privremenog prvaka Gloryjeve teške kategorije, najbolji hrvatski kickboksač Antonio Plazibat vraća se u ring 21. rujna u zagrebačkoj Areni na borilačkoj priredbi \"Glory 95\"\", objavila je velika svjetska kikboksing organizacija, nizozemski Glory.\r\n\r\nPopularni teškaš je izvan pogona od prošle godine nakon što je pretrpio lom ruke u svojoj posljednjoj borbi i sada se želi trijumfalno vratiti pred svojim navijačima.\r\n\r\n\"Sretan sam što sam se konačno vratio i što se Glory vraća u Hrvatsku prvi put nakon deset godina. Jedina stvar koja može biti bolja od pobjede na mom povratku je učiniti to pred svojim navijačima. Priredit ću predstavu za sve,\" poručio je Plazibat.', 'plaz.jpg', 'Ostali Sportovi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`),
  ADD UNIQUE KEY `korisnicko_ime_2` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
