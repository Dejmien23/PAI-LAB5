-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Lis 2020, 23:43
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pai_dziedzic`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`) VALUES
(1, 'Dell'),
(2, 'Lenovo'),
(3, 'MacBook');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `kategoria_id` int(11) DEFAULT NULL,
  `nazwa` varchar(150) NOT NULL,
  `opis` text NOT NULL,
  `img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `kategoria_id`, `nazwa`, `opis`, `img`) VALUES
(1, 1, 'Dell Inspiron G3 i7-10750H/16GB/1TB/Win10 RTX2060', '<h3>Laptop gamingowy Dell Inspiron G3 3500</h3>\r\n\r\n<p style=\"text-align:justify\">15,6-calowy Dell Inspiron G3 3500 oferuje dokładnie to, czego potrzebujesz, aby zdominować pola wirtualnych bitew. Potężna generacja mobilnych procesor&oacute;w, łączy się z układem graficznym o nieprzeciętnej mocy, aby zapewnić Ci płynną, komfortową rozgrywkę nawet w najnowszych tytułach. Wejdź do gry, poczuj smak rywalizacji na najwyższym poziomie. Czuj się pewniej z klawiaturą odporną na zalanie, kt&oacute;ra posiada także podświetlenie.</p>\r\n\r\n<h3>Intel Core i7 10. generacji</h3>\r\n\r\n<p style=\"text-align:justify\">Procesor Intel Core i7 zaskoczy Cię olbrzymią mocą, szybkością oraz sprawnością, z jaką realizuje najbardziej wymagające zadania. Dzięki technologii Intel Turbo Boost 2.0 procesor w inteligentny spos&oacute;b zwiększa taktowanie zegar&oacute;w, wyzwalając jeszcze większą moc obliczeniową. Intel Core i7 10-th Gen. perfekcyjnie radzi sobie r&oacute;wnież z obsługą film&oacute;w w najwyższej rozdzielczości, zapewniając przy okazji bezpieczne transakcje w sieci.</p>\r\n', 'dell_g3.jpeg'),
(2, 2, 'Lenovo Legion Y540-17 i7-9750HF/32GB/960/Win10 RTX2060X', '<h3>Odkryj laptop gamingowy Lenovo Legion Y540-17</h3>\r\n\r\n<p style=\"text-align:justify\">17,3-calowy Lenovo Legion Y540-17 oferuje dokładnie to, czego potrzebujesz, aby zdominować pola wirtualnych bitew. Najpotężniejsza generacja mobilnych procesor&oacute;w Intel Core i7 9. generacji łączy się z układem graficznym Nvidia GeForce RTX o nieprzeciętnej mocy, aby zapewnić Ci płynną, komfortową rozgrywkę nawet w najnowszych tytułach. Wejdź do gry, poczuj smak rywalizacji na najwyższym poziomie. Sprawdź, jak Lenovo Legion Y540-17 wygląda w rzeczywistości. Chwyć zdjęcie poniżej i przeciągnij je w lewo lub prawo, aby obr&oacute;cić produkt, lub skorzystaj z przycisk&oacute;w nawigacyjnych.</p>\r\n\r\n<h3>Gaming w nowym stylu</h3>\r\n\r\n<p style=\"text-align:justify\">Koniec z topornymi laptopami gamingowymi. Wybierz laptop godny Ciebie &mdash; elegancki z zewnątrz i nieposkromiony wewnątrz. Laptop Lenovo Legion Y540 o grubości 27 mm i ważący 2,78 kg zapewnia idealną r&oacute;wnowagę między spektakularną wydajnością gier a praktyczną mobilnością dla tych, kt&oacute;rzy wolą większe ekrany.</p>\r\n', 'lenovo_legion.png'),
(3, 3, 'Apple MacBook Air i5/16GB/256/Iris Plus/MacOS Space Grayy', '<h3>Odkryj Apple MacBook Air</h3>\r\n\r\n<p style=\"text-align:justify\">MacBook Air zawsze był nieprawdopodobnie smukły i lekki. Ale jeszcze nigdy tak niesamowicie mocny i bystry. Ma przepiękny wyświetlacz Retina, nową klawiaturę Magic Keyboard, Touch ID, wydajniejszy procesor i szybszą grafikę. Jego smukła konstrukcja w kształcie klina została wykonana z aluminium pochodzącego z recyklingu, co czyni go najbardziej ekologicznym ze wszystkich Mac&oacute;w. A na dodatek może pochwalić się baterią, kt&oacute;ra wystarcza na cały dzień pracy. Sprawdź, jak Apple MacBook Air wygląda w rzeczywistości. Chwyć zdjęcie poniżej i przeciągnij je w lewo lub prawo aby obr&oacute;cić produkt lub skorzystaj z przycisk&oacute;w nawigacyjnych.</p>\r\n\r\n<h3>Wyświetlacz Retina</h3>\r\n\r\n<p style=\"text-align:justify\">Wyświetlacz o doskonałej rozdzielczości mieści 4 miliony pikseli i robi piorunujące wrażenie. Obrazy osiągają niespotykany poziom realizmu i szczeg&oacute;łowości, a tekst jest ostry i wyraźny. Technologia True Tone automatycznie dostosowuje punkt bielim, na wyświetlaczu do temperatury barw w otoczeniu. Dzięki temu strony WWW i mejle czyta się r&oacute;wnie komfortowo, jak druk na papierze. Za sprawą milion&oacute;w kolor&oacute;w każdy obraz jest soczysty, żywy i pełen głębi. A ponieważ szyba wyświetlacza sięga samych krawędzi obudowy, kiedy kierujesz wzrok na ekran, widzisz tylko wyświetlane treści. I bez dw&oacute;ch zdań &ndash; jest na co popatrzeć.</p>\r\n', 'mac_book.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `email`, `admin`) VALUES
(1, 'Wolfie', '$2y$10$OMaCRd8uUt9ZrdPhB7r47OPVv4UG4GK44VxbXWlAJecvzCH1Iy7g2', 'wolfie@gmail.com', 1),
(2, 'Rabbit', '$2y$10$890Ju37.MzrzqHih38Wa2uSbU8BpvUjyqEmAGpz1K3hLBPBjgoUDC', 'rabbit@gmail.com', NULL),
(3, 'Roman', '$2y$10$cmwQ2touJtcec/Clg3BD4OPNC3Y1eqSvcon2xT66VvXqRaEGpccLO', 'roman@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecie_profilowe`
--

CREATE TABLE `zdjecie_profilowe` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `status_zdjecia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zdjecie_profilowe`
--

INSERT INTO `zdjecie_profilowe` (`id`, `id_uzytkownika`, `status_zdjecia`) VALUES
(1, 1, 0),
(3, 2, 1),
(4, 3, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategoria_id` (`kategoria_id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zdjecie_profilowe`
--
ALTER TABLE `zdjecie_profilowe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zdjecie_profilowe`
--
ALTER TABLE `zdjecie_profilowe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`kategoria_id`) REFERENCES `kategorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
