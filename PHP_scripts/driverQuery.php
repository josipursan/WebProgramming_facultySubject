<?php

/*
    Pokupiti korisnicki unos za prezime vozaca, sanitazati taj unos da nisu utrpane neke gluposti ili SQL injeciton. 
    Low casati unos i napraviti sljedeci poziv na Ergast API : http://ergast.com/api/f1/drivers/webber

    Ako ovaj poziv vrati vrati neku vrijednost, i ne radi se o BAD REQUEST vrijednosti, onda idemo dalje na glavni poziv ove skripte. 
    Ovaj gornji poziv je zapravo samo provjera da korisnik nije unio neki glupi string ili promašio ime tipa "VeTel" umjesto "Vettel".

    Ista ova logika primjenit ce se za korisnicki unos staze i ekipe.
    Sanitazati korisnicki unos imena staze, low casati i provjeriti na Ergast API hoce li to ime staze vratiti nesto, ili ce baciti BAD REQUEST.
    

*/



/*  PRIMJERI MOGUCIH QUERYJA : 

    Korisnik moze unijeti slijedece podatke : godina, prezime vozaca, staza, ekipa
    


    1. Korisnik je odabrao sva polja za query. Moguca polja su godina, prezime vozaca, ekipa, staza.

        https://ergast.com/api/f1/2012/drivers/alonso/constructors/ferrari/circuits/monza/results   -----> ovime se prikazuju rezultati odabranog vozaca za odabranu sezonu na odabranoj stazi za odabranu ekipu (isto kao 2. poziv ali duze)

    2. Korisnik je odabrao polja godina, prezime vozaca, staza. 

        https://ergast.com/api/f1/2012/drivers/alonso/circuits/monza/results    ------> ovime se prikazuju rezultati odabranog vozaca za odabranu sezonu na odabranoj stazi (isto kao 1. poziv ali krace jer je uvjet ekipe redundantan)

    3. Korisnik je odabrao polja prezime vozaca, staza. 

        https://ergast.com/api/f1/drivers/alonso/circuits/monza/results     --------> ovime se prikazuju svi rezultati vozaca u karijeri za odabranu stazu

    4. Korisnik je odabrao samo prezime vozaca. 

        https://ergast.com/api/f1/drivers/alonso/results    -------> ovime se prikazuju svi rezultati vozaca (cijela karijera)

    5. Korisnik je odabrao godinu, vozaca i ekipu.
    
        https://ergast.com/api/f1/2012/drivers/alonso/constructors/ferrari/results  ------> ovime se prikazuju svi rezultati odabranog vozaca u odabranoj sezoni za odabranu ekipu

    6. Korinik je odabrao godinu i vozaca. 

        https://ergast.com/api/f1/2012/drivers/alonso/results   ------> ovime se prikazuju svi rezultati odabranog vozaca u odabranoj sezoni

    7. Korisnik je odabrao vozaca i ekipu.

        https://ergast.com/api/f1/drivers/alonso/constructors/ferrari/results    ------> ovime se prikazuju svi rezultati za odabranog vozaca s odabranom ekipom

    Komentari : 
        -pozivi 1. i 2. daju isti rezultat jer je parametar ekipe u 1. pozivu zapravo redundantan obzirom da se zna za koju je ekipu vozio ako je definirana sezona
        -pozivi 5. i 6. daju isti rezultat jer je parametar ekipe u 5. pozivu zapravo redundantan obzirom da se zna za koju je ekipu vozio ako je definirana sezona

        -poziv 4. mozda treba onemoguciti obzirom da bi se radilo o velikom broju rezultata za pojedine vozace za prikaz


        ** AKO SE ZELI POKUPITI REZULTATE U OBLIKU JSON-A, NA KRAJ TREBA DODATI ".json"
*/


?>