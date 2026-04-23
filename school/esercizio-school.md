# Esercizio Laravel API REST – Gestione Studenti e Corsi

Realizzare un progetto Laravel con API REST per la gestione di una scuola. Il sistema deve permettere di amministrare studenti, corsi, profili personali degli studenti e voti scolastici. L’obiettivo dell’esercizio è verificare la capacità di lavorare con Laravel, Eloquent ORM, relazioni tra modelli, migrazioni, autenticazione API tramite Laravel Sanctum e gestione di endpoint REST protetti.

Il progetto deve prevedere la tabella `students`, che contiene i dati principali degli studenti. Ogni studente può frequentare più corsi, quindi deve esistere una relazione molti-a-molti tra studenti e corsi. La tabella `courses` conterrà l’elenco dei corsi disponibili e ogni corso potrà avere più studenti iscritti. Per gestire questa relazione bisogna utilizzare una tabella pivot chiamata `course_student`.

Ogni studente deve avere anche un profilo personale con informazioni aggiuntive come indirizzo, città, telefono, contatto di emergenza e note. Il profilo sarà memorizzato nella tabella `student_profiles` e sarà collegato allo studente tramite una relazione uno-a-uno.

Ogni studente può inoltre ricevere più voti nel tempo. I voti devono essere memorizzati nella tabella `votes`, che avrà una relazione uno-a-molti con `students`. Ogni voto potrà contenere materia, voto numerico e data dell’esame.

Dal punto di vista Eloquent, il model `Student` dovrà avere le relazioni `belongsToMany` con `Course`, `hasOne` con `StudentProfile` e `hasMany` con `Vote`. Il model `Course` dovrà avere la relazione `belongsToMany` con `Student`. Il model `StudentProfile` dovrà avere `belongsTo` verso `Student`, mentre il model `Vote` dovrà avere `belongsTo` verso `Student`.

L’applicazione dovrà utilizzare Laravel Sanctum per autenticare le chiamate API protette. Deve essere previsto un endpoint di login raggiungibile tramite `POST /api/login`. L’utente iniziale potrà essere creato con email `admin@example.com` e password `password123`. Dopo il login il sistema dovrà restituire un token Bearer da utilizzare nelle chiamate successive.

Le rotte pubbliche saranno quelle di consultazione. Dovrà quindi essere possibile visualizzare l’elenco degli studenti tramite `GET /api/students`, il dettaglio di uno studente tramite `GET /api/students/{id}`, l’elenco dei corsi tramite `GET /api/courses` e il dettaglio di un corso tramite `GET /api/courses/{id}`. Inoltre dovrà essere disponibile una ricerca studenti tramite endpoint `POST /api/students/search`.

Le rotte protette da middleware `auth:sanctum` saranno invece quelle di modifica dati. Per gli studenti dovranno essere implementati gli endpoint `POST /api/students` per la creazione, `PUT /api/students/{id}` per la modifica e `DELETE /api/students/{id}` per l’eliminazione. Per i corsi dovranno essere implementati `POST /api/courses`, `PUT /api/courses/{id}` e `DELETE /api/courses/{id}`.

Dovrà essere prevista anche la gestione delle iscrizioni ai corsi. Tramite endpoint `POST /api/courses/{course}/students` sarà possibile iscrivere uno o più studenti a un corso inviando un array di ID studenti. Tramite endpoint `DELETE /api/courses/{course}/students/{student}` sarà invece possibile rimuovere uno studente da un corso.

Quando viene richiesto il dettaglio di uno studente, la risposta dovrà includere anche il profilo personale, l’elenco dei corsi frequentati e tutti i voti ricevuti. In questo modo si testerà l’uso del eager loading delle relazioni.

Le API dovranno prevedere validazioni corrette. Per gli studenti il nome e cognome saranno obbligatori, l’email dovrà essere obbligatoria e univoca, la data di nascita dovrà essere valida. Per i corsi il titolo dovrà essere obbligatorio e il numero di ore dovrà essere numerico e maggiore di zero. Per la ricerca studenti dovrà essere richiesto almeno un campo valorizzato tra nome, cognome o email.

Le risposte JSON dovranno essere coerenti e ben strutturate. In caso di successo si consiglia di restituire campi come `success`, `message` e `data`. In caso di errore dovranno essere restituiti messaggi chiari, specialmente per errori di validazione o autenticazione.

Come miglioramento facoltativo si possono aggiungere paginazione negli elenchi, ordinamento dei risultati, seeder con dati demo, Form Request dedicate, API Resource Laravel e test automatici con PHPUnit o Pest.

Il progetto finale dovrà quindi permettere login tramite token Sanctum, gestione completa di studenti e corsi, iscrizione studenti ai corsi, ricerca studenti e visualizzazione completa delle relazioni tra entità.

La consegna dovrà comprendere il progetto Laravel funzionante, file di migrazione, model con relazioni, controller API, file `routes/api.php` configurato correttamente ed eventualmente una collection Postman per il test degli endpoint.