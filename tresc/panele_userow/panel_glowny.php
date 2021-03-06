<!--- Jest to główny plik
      Z lewej strony zawiera menu
      Z prawej strony wyświetlają się podstrony
--->
<div style="padding:0 20px 20px 20px;"><h1>Panel użytkownika</h1></div>
<div id="z_panel_menu_lewe" class="col-md-3">
    <ul class="nav nav-pills nav-stacked thumbnail">
        <?php
        // $plik to adres do tego pliku. Zrobiono dla wygody
        $plik = "?v=tresc/panele_userow/panel_glowny";
        // przyciski do podstron
        standardowy_przycisk("{$plik}&prawa=tresc/panele_userow/uczen/u_info", "Główne informacje");
        standardowy_przycisk("{$plik}&prawa=tresc/panele_userow/uczen/u_zmiana_hasla", "Zmiana hasła");
        
        // jeśli jesteśmy nauczycielem lub adminem, mamy dostęp do dodatkowych opcji (przycisków)
        if (nauczyciel() || admin())
        {   
            echo "<hr><center><p>Panel Nauczyciela</p></center>";
            standardowy_przycisk("{$plik}&prawa=tresc/panele_userow/nauczyciel/n_lista_kursow", "Lista kursów");
            standardowy_przycisk("{$plik}&prawa=tresc/panele_userow/nauczyciel/n_lista_lekcji_w_kursie", "Lista lekcji");
            standardowy_przycisk("{$plik}&prawa=tresc/panele_userow/nauczyciel/n_podglad_lekcji", "Podgląd lekcji");
            standardowy_przycisk("{$plik}&prawa=tresc/panele_userow/nauczyciel/n_stworz_kurs", "Stwórz nowy kurs");
            standardowy_przycisk("{$plik}&prawa=tresc/panele_userow/nauczyciel/n_usun_z_kursu1", "Usuń użytkownika z kursu");
        }
        if (admin())
        {
            echo "<hr><center><p>Panel Administratora</p></center>";
            standardowy_przycisk("{$plik}&prawa=tresc/panele_userow/admin/a_zarzadzanie_uzytkownikami", "Zarządzanie użytkownikami");
            standardowy_przycisk("{$plik}&prawa=tresc/panele_userow/admin/a_dodawanie_usera_do_kursu1", "Dodaj użytkownika do kursu");
            standardowy_przycisk("{$plik}&prawa=tresc/panele_userow/admin/a_zablokuj_kurs1", "Blokada kursu");
        }
        ?>
    </ul>
</div>
<div id="z_panel_tresc_prawa" class="col-md-9">
    <div class="thumbnail">
    <?php
    // dołączmy plik z $_GET['prawa']
    dolacz_plik("prawa", "tresc/panele_userow/uczen/u_info"); 
    ?>
    </div>
</div>