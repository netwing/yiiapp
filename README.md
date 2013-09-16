# YiiApp - Scaffolding nuova applicazione

---

## Requisiti

* Git [http://git-scm.com](http://git-scm.com)
Può essere installato dal package manager della propria distribuzione

* Node [http://nodejs.org](http://nodejs.org)
Scaricare ed installare il package provveduto dallo sviluppatore

* Bower installato globalmente [http://bower.io](http://bower.io)
Con i permessi di root, eseguire `npm install -g bower`

## Quick Start

Nel momento in cui si vuole creare una nuova applicazione è necessario definire il repository remoto

    ssh git@git.netwing.it
    git init --shared --bare /home/git/<app_name>
    chmod -R 755 /home/git/<app_name>

### Clonare YiiApp per creare una nuova applicazione

Posizionarsi nella directory *all'interno* della quale si vuole creare il progetto.

    git clone ssh://<gituser>@git.netwing.it/home/git/yiiapp-composer .

Se la directory non è vuota, eliminare il contenuto, oppure effettuare il clone in una directory temporanea e successivamente spostare tutto dentro alla directory di lavoro.

***Importantissimo: Cambiare ORIGIN alla nuova app prima di iniziare a fare delle modifiche !!!***

Settare la nuova origine

    git remote set-url origin ssh://<gituser>@git.netwing.it/home/git/<app_name>

Verificare che l'URL sia modificato in quello testé inserito

    git remote show origin

Ora modificare il file *protected/config/main.php* ed impostare il nome dell'applicazione, poi eseguire:

    git commit -a -m "primo commit"
    git push origin master

A questo punto tutto verrà caricato sul server remoto, dove verrà creato anche il ramo master che prima non esisteva, essendo appena stato inizializzato il repository.

### Configurazione

Copiare il file `protected/config/config-example.php` come `protected/config/config.php` ed inserire i propri parametri di configurazione.

### Inizializzazione

Tutti i comandi seguenti vanno eseguiti dalla directory *radice* della propria applicazione, generalmente è `/web/`

*Assicurarsi che il db sia esistente e vuoto*

    php composer.phar install
    bower install
    chmod -R 777 assets/
    chmod -R 777 protected/runtime
    ./protected/yiic migrate

Seguire le successive istruzioni a schermo per la migrazione del database.

### Credenziali predefinite applicazione

    username: admininistrator
    password: password

---

## Moduli aggiuntivi

### Node JS e Socket.io

Dalla directory *radice* dell'applicazione, avviare il server node lanciando:

    node protected/node/server.js

A questo punto, effettuando il login nell'applicazione dev'essere possibile entrare nella pagina Node JS e visualizzare i messaggi scambiati con il server.

---

## Test funzionali e di comportamento


### Test con PHPUnit

***Per eseguire i test con PHPUnit è necessario che xdebug ed il modulo pcntl di PHP sia installato***

Il file di configurazione XML di PHPUnit è in `./test/phpunit.xml` ed i valori di default sono generalmente adatti a qualsiasi ambiente.

Per eseguire tutti i test con PHPUnit, lanciare:

    ./bin/phpunit -c test/phpunit.xml test/unit

I risultati vengono salvati nel file ./test/results/logfile.tap (normale file di testo) mentre la copertura del codice viene salvata in ./test/results/index.html (visualizzabile via browser).

### Test con Behat

Per eseguire alcuni dei test di Behat che richiedono il browser Firefox, è necessario che sulla macchina siano installate le librerie Xcommon e che il software Xvfb sia installato. Nel caso non lo fosse, si installa con:

    apt-get install xvfb

A questo punto, per avviare il display virtuale con Xvfb e il server Selenium, eseguire:

    cd test
    ./start.sh

Il servizio rimane attivo fintanto che la console è attiva. Per uscire, premere CTRL+C.
Se in avvio il Selenium Server si lamenta di un _Already running_ o simili, significa che un altro è già in esecuzione, quindi si può passare all'esecuzione dei test senza problemi.

Copiare il file `test/behat.yml.example` in `test/behat.yml` ed impostare la corretta configurazione del puntamento all'applicazione via http (parametro `base_url`).

Per eseguire tutti i test con Behat e visualizzare i risultati a video, lanciare:

    ./bin/behat -c test/behat.yml

Per eseguire tutti i test ed avere il risultato in un file HTML, lanciare:

    ./bin/behat -c test/behat.yml --format=html > ./results/behat.html

### Comandi utili per Behat

* Elenco delle regexp definite: `./bin/behat -dl`

* Eseguire un singolo feature test: `./bin/behat feature/bla_bla.feature`
    
* Disabilitare i colori e vedere solo i problemi riscontrati: `./bin/behat --format=progress --no-ansi`
    
#### Guida consigliata

[http://docs.behat.org/cookbook/behat_and_mink.html](http://docs.behat.org/cookbook/behat_and_mink.html)


---

### Se si aggiorna il composer.json

Eseguire 

    php composer.phar update

Se il comando non riesce, eliminare tutto dentro a vendor/ e riprovare.
