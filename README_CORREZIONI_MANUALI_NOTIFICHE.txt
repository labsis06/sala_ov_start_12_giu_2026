CORREZIONE MANUALE - notifiche di rifiuto e personale gia assegnato

Non e necessario reinstallare o aggiornare il componente.
La correzione non modifica il database e interessa soltanto i due file indicati
di seguito.

Prima di iniziare
-----------------
1. Fare una copia di sicurezza dei due file presenti sul sito.
2. Usare i file di questo progetto mantenendo esattamente nomi e cartelle.
3. Non copiare l'intera cartella del componente e non eseguire l'installer ZIP.


FILE 1 - controller delle prenotazioni
--------------------------------------

File fornito nel progetto:
administrator/src/Controller/BookingsController.php

File da sostituire nell'installazione Joomla:
administrator/components/com_salaov/src/Controller/BookingsController.php

Correzioni contenute nel file:
- quando si approva una prenotazione gia assegnata, viene riutilizzato il
  personale memorizzato nella prenotazione se nel menu a tendina non viene
  scelto un nuovo nominativo;
- la selezione di un nuovo nominativo continua a sostituire l'assegnazione per
  tutte le prenotazioni selezionate;
- l'approvazione viene bloccata soltanto se una prenotazione non ha personale
  assegnato e non ne e stato selezionato uno;
- quando una prenotazione viene rifiutata vengono inviate le notifiche al
  richiedente, agli amministratori configurati e al personale gia assegnato;
- oggetto e testo delle email distinguono correttamente tra prenotazione
  "approvata" e "rifiutata";
- al termine dell'operazione viene mostrato il conteggio delle email inviate.

Intervento da effettuare:
sostituire integralmente il file installato con il file fornito nel progetto.
Non unire il vecchio metodo updateStatus(): il controller contiene anche i
nuovi metodi getBookingStaff(), sendStaffStatusEmail() e
getStatusEmailSubject(), che sono necessari alla correzione.


FILE 2 - schermata elenco prenotazioni
--------------------------------------

File fornito nel progetto:
administrator/tmpl/bookings/default.php

File da sostituire nell'installazione Joomla:
administrator/components/com_salaov/tmpl/bookings/default.php

Correzioni contenute nel file:
- il campo "Personale" non e piu obbligatorio nel browser;
- la prima opzione diventa "Mantieni il personale gia assegnato";
- il testo di aiuto chiarisce che il personale non deve essere riselezionato
  per le visite che hanno gia un assegnatario.

Intervento da effettuare:
sostituire integralmente il file installato con il file fornito nel progetto.


OPERAZIONI DOPO LA COPIA
------------------------
1. In Joomla, pulire la cache da Sistema > Manutenzione > Pulisci cache.
2. Se sul server e attiva PHP OPcache, svuotarla o riavviare PHP-FPM tramite il
   pannello hosting.
3. Ricaricare forzatamente la pagina del browser (Ctrl+F5).


VERIFICA RAPIDA
---------------
1. Aprire Componenti > Sala OV > Prenotazioni.
2. Selezionare una prenotazione che ha gia personale assegnato e premere
   Approva lasciando la tendina su "Mantieni il personale gia assegnato":
   l'approvazione deve riuscire senza chiedere una nuova selezione.
3. Rifiutare una prenotazione con personale assegnato: il messaggio finale deve
   mostrare i conteggi delle email a richiedente, amministratori e personale.
4. Controllare che l'oggetto delle email riporti "rifiutata" e non "approvata".

Se dopo la copia compare ancora la vecchia voce "Seleziona personale...", il
secondo file non e stato copiato nel percorso corretto oppure e ancora servito
dalla cache. Non reinstallare il componente: ricontrollare il percorso e
svuotare le cache indicate sopra.
