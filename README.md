Yiiapp - Nuova applicazione Yii
===============================

**Nota: MAI clonare direttamente questo repository a meno che non si voglia lavorare direttamente sullo skeleton dell'applicazione**

Test and Dependency
-------------------

**Master branch:** 
![master-badge](https://circleci.com/gh/netwing/yiiapp/tree/master.png)

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/netwing/yiiapp/badges/quality-score.png?s=87f1b371bb40e3e7871f0411209cc3037edf76c2)](https://scrutinizer-ci.com/g/netwing/yiiapp/)

[![Code Coverage](https://scrutinizer-ci.com/g/netwing/yiiapp/badges/coverage.png?s=9770e1bc8faa5064386e9f51570a4eb0d14860af)](https://scrutinizer-ci.com/g/netwing/yiiapp/)

[![Dependency Status](https://www.versioneye.com/user/projects/524a84fe632bac6d87004e77/badge.png)](https://www.versioneye.com/user/projects/524a84fe632bac6d87004e77)


Requisiti
---------

**Git** 

Per informazioni, visitare: [http://git-scm.com](http://git-scm.com)

Per installarlo:

    apt-get install git

**Node**

Scaricare ed installare dal sito del produttore: [http://nodejs.org](http://nodejs.org)

**Bower** [http://bower.io](http://bower.io)

Dopo l'installazione di **node** eseguire il seguente comando come `root`

    npm install -g bower

Se non si vuole installare bower globalmente, è possibile installarlo localmente con il comando

    npm install bower

Quickstart
----------

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
    ./protected/yiic migrate --interactive=0

Seguire le successive istruzioni a schermo per la migrazione del database.

### Credenziali predefinite applicazione

Effettuare il login all'applicazione con le credenziali di default.

    username: admininistrator
    password: password

---

Moduli aggiuntivi
-----------------

### Node JS e Socket.io

Dalla directory *radice* dell'applicazione, avviare il server node lanciando:

    node protected/node/server.js

A questo punto, effettuando il login nell'applicazione dev'essere possibile entrare nella pagina Node JS e visualizzare i messaggi scambiati con il server.

---

Unit test ed acceptance test
----------------------------

### Test con Codeception

Per eseguire tutte le suite di test, lanciare

    ./vendor/bin/codecept run --coverage --html --xml --tap --json

---

Altre informazioni
------------------

### Se si aggiorna il composer.json

Eseguire 

    php composer.phar update

Se il comando non riesce, eliminare tutto dentro a vendor/ e riprovare.
