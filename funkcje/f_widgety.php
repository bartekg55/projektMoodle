<?php
// zawiera funkcje wyświetlające małe widgety
// kazda funkcja z tego pliku zaczyna się od prefixu w_ (w jak widget)

// funkcja wyświetla małą tabelkę z ostatnimi kursami, do ktorych nalezy użytkownik
// $id_usera pobiera numer użytkownika
// $ilosc - pobiera ilość rekordów do wyświetlenia
function w_lista_kursow($id_usera, $ilosc = 3)
{
    // wyświetlenie nagłówka
    echo '<div class="thumbnail">'
          .'<div class="caption">'
          .'<h4>Ostatnie kursy</h4>'
          .'<table class="table">'
          .'<tbody>';

    // wyświetlenie małej tabelki z ostatnimi kursami
    // zpaytanie, które wyświetla kursy (wraz z nazwami) do których jest zapisany uzytkownik podany przez id
    $wynik = mysql_query("SELECT * FROM `zapisy` INNER JOIN kursy ON zapisy.id_kursu = kursy.id_kursu WHERE zapisy.id_uzytkownika={$id_usera} AND stan='dobry' ORDER BY id_zapisu DESC LIMIT {$ilosc}");
        while($r = mysql_fetch_assoc($wynik)) 
        {
            // zapytanie i pętla
            // zamiast numeru ID wyświetla pełnoprawne imię i nazwisko założyciela kursu
            $nazwa_nauczyciela =  mysql_query("SELECT * FROM `kursy` INNER JOIN uzytkownicy ON kursy.id_zalozyciela = uzytkownicy.id WHERE uzytkownicy.id={$r['id_zalozyciela']}");
            $imie_i_nazwisko_nauczyciela="brak";
            while($g = mysql_fetch_assoc($nazwa_nauczyciela)) 
            {   // przypisujemy imię i nazwisko danego założyciela (nauczyciela) kursu
                $imie_i_nazwisko_nauczyciela = $g['imie']." ".$g['nazwisko'];
            }
            // tworzenie linku do danego kursu
            $link = "?v=tresc/u_kursy/lista_lekcji&id={$r['id_kursu']}";
            // tabela wyświetlająca kurs i nazwę bauczyciela
            echo '<tr>';
            echo '<td><a href="'.$link.'">'.$r['nazwa'].'</a><br><small>'.$imie_i_nazwisko_nauczyciela.'</small></td>';
            echo '</tr>'; 
        }
    // jeżeli to nauczyciel lub admin, nie wyświetlamy ich kursów, tylko komunikat
    if (nauczyciel() || admin())
    {
        komunikat("Aby zobaczyć kursy, przejdź do zarządzania");
    }
    // zakończenie tabeli i ramki
    echo '</tbody>'
          .'</table>'
          .'</div>'
          .'</div>';
}

// wyświetla widget z informacjami o użytkownku
// w argumencie pobiera id użytkownika, dla ktorego ma wyświetlić informację
function w_dane_usera($id_usera)
{
     echo '<div class="thumbnail">'
          .'<div class="caption">'
          .'<h4>Informacje o uzytkowniku</h4><hr>';
    ?>
        <p>Jesteś zalogowany jako: <b><?=$_SESSION['imie']?> <?=$_SESSION['nazwisko']?></b></p>
        <p>Login: <b><?=$_SESSION['login']?></b></p>
        <p>Mail: <b></b></p>
        <p>Ranga: <b><?=$_SESSION['typ']?></b></p>
   <?php
    echo '</div>'
          .'</div>';
}

// widget wyświetlający listę ostatnich lekcji
function w_osatnie_lekcje($id_usera, $ilosc = 3)
{
    
}

// widget kalendarz - wyświetla kalendarz, który z niczym nie jest powiązany
function w_kalendarz()
{
    
}
?>
