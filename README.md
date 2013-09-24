# Yiiapp - Nuova applicazione Yii

**Nota: MAI clonare direttamente questo repository a meno che non si voglia lavorare direttamente sullo skeleton dell'applicazione**

## Requisiti

**Git** 

Per informazioni, visitare: [http://git-scm.com](http://git-scm.com)

Per installarlo:

    apt-get install git

**Node**

Scaricare ed installare dal sito del produttore: [http://nodejs.org](http://nodejs.org)

**Bower** [http://bower.io](http://bower.io)

Dopo l'installazione di **node** eseguire il seguente comando come `root`

    npm install -g bower

## Quickstart

Scaricare lo ZIP della nuova applicazione dal sito [https://github.com/netwing/yiiapp](https://github.com/netwing/yiiapp) cliccando sul link **Download ZIP**

Copiare tutti i files e le directory nella destinazione desiderata.

**N.B.: Accertarsi di copiare anche i file nascosti che iniziano con `.`**



### Configurazione

Tutti i comandi seguenti vanno eseguiti dalla directory *radice* della propria applicazione, generalmente è `/web/`

*Assicurarsi che il database esista e sia vuoto*

    cp protected/config/config.php.example protected/config/config.php
    vim protected/config/config.php

### Inizializzazione

    php composer.phar install
    bower install
    chmod -R 777 assets/
    chmod -R 777 protected/runtime
    cd protected/node/
    npm install
    ./protected/yiic migrate

Seguire le successive istruzioni a schermo per la migrazione del database.

### Credenziali predefinite applicazione

Effettuare il login all'applicazione con le credenziali di default.

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
