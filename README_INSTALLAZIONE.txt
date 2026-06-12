Componente Joomla 5: com_salaov

Specifiche incluse:
- prenotazioni solo per utenti Joomla autenticati
- amministratori tramite backend Joomla
- una sala di monitoraggio
- fasce orarie configurabili da backend
- capienza per fascia
- prenotazione in stato iniziale "pending" / in attesa di approvazione
- campi: nome, cognome, email, telefono, ente/scuola, numero visitatori, note
- approvazione, rifiuto, annullamento
- export CSV
- email di notifica amministratore

Installazione:
1. Joomla Administrator > Sistema > Installa > Estensioni.
2. Caricare com_salaov_joomla5.zip.
3. Aprire Componenti > Sala OV.
4. Configurare le fasce orarie in Componenti > Sala OV > Fasce orarie.
5. Creare una voce di menu frontend di tipo Sala OV > Prenotazione Sala OV.

Nota tecnica:
Il percorso SQL nel manifest e' sql/install.mysql.utf8.sql, coerente con Joomla: il file viene copiato in administrator/components/com_salaov/sql/.
