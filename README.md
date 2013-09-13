# YiiApp - Scaffolding nuova applicazione

---

## Requisiti

* Git [http://git-scm.com](http://git-scm.com)
* Node [http://nodejs.org](http://nodejs.org)
* Bower installato globalmente [http://bower.io](http://bower.io)

## Quick Start

### Clonare YiiApp per creare una nuova applicazione

Posizionarsi nella directory *all'interno* della quale si vuole creare il progetto.

    git clone ssh://<gituser>@git.netwing.it/home/git/yiiapp-composer .

Se la directory non è vuota, eliminare il contenuto, oppure effettuare il clone in una directory temporanea e successivamente spostare tutto dentro alla directory di lavoro.

***Importantissimo: Cambiare ORIGIN alla nuova app prima di iniziare a fare delle modifiche !!!***

Creare il *nuovo* repository remoto [SOLO se necessario]

    ssh git@git.netwing.it
    git init --shared --bare /home/git/<app_name>
    chmod -R 755 /home/git/<app_name>

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

Tutti i comandi relativi ai test vanno eseguiti dalla directory `test/`.

### Inizializzazione

Dalla directory `test/` eseguire:

    php composer.phar install

Composer automaticamente scaricherà, installerà e configurerà tutti i moduli necessari.

***Nota: Se per qualche motivo i test danno dei problemi, eliminare completamente la directory vendor/ ed il file composer.lock dalla directory test/ e rieseguire i comandi sopra indicati.***

### Test con PHPUnit

***Per eseguire i test con PHPUnit è necessario che xdebug ed il modulo pcntl di PHP sia installato***

Il file di configurazione XML di PHPUnit è in `./test/phpunit.xml` ed i valori di default sono generalmente adatti a qualsiasi ambiente.

Per eseguire tutti i test con PHPUnit, lanciare:

    ./bin/phpunit -c phpunit.xml unit

I risultati vengono salvati nel file ./test/results/logfile.tap (normale file di testo) mentre la copertura del codice viene salvata in ./test/results/index.html (visualizzabile via browser).

### Test con Behat

Per eseguire alcuni dei test di Behat che richiedono il browser Firefox, è necessario che sulla macchina siano installate le librerie Xcommon e che il software Xvfb sia installato. Nel caso non lo fosse, si installa con:

    apt-get install xvfb

A questo punto, per avviare il display virtuale con Xvfb e il server Selenium, eseguire:

    cd jar
    ./start.sh

Il servizio rimane attivo fintanto che la console è attiva. Per uscire, premere CTRL+C.
Se in avvio il Selenium Server si lamenta di un _Already running_ o simili, significa che un altro è già in esecuzione, quindi si può passare all'esecuzione dei test senza problemi.

Copiare il file `test/behat.yml.example` in `test/behat.yml` ed impostare la corretta configurazione del puntamento all'applicazione via http (parametro `base_url`).

Per eseguire tutti i test con Behat e visualizzare i risultati a video, lanciare:

    ./bin/behat 

Per eseguire tutti i test ed avere il risultato in un file HTML, lanciare:

    ./bin/behat --format=html > ./results/behat.html

### Comandi utili per Behat

* Elenco delle regexp definite: `./bin/behat -dl`

* Eseguire un singolo feature test: `./bin/behat feature/bla_bla.feature`
    
* Disabilitare i colori e vedere solo i problemi riscontrati: `./bin/behat --format=progress --no-ansi`
    
#### Guida consigliata

[http://docs.behat.org/cookbook/behat_and_mink.html](http://docs.behat.org/cookbook/behat_and_mink.html)


---

## Articoli utili sull'argomento dei submoduli git

[Git-tools-submodules](http://git-scm.com/book/en/Git-Tools-Submodules)

[Altro tutorial](https://git.wiki.kernel.org/index.php/GitSubmoduleTutorial)

### Come e' stato aggiunto Yii come sottomodulo

Si noti che NON seve creare la directory yiiapp/yii.

Importante: il comando "submodule add" deve sempre essere eseguito dalla radice del submodulo

    cd yiiapp
    git submodule add https://github.com/yiisoft/yii.git

Si noti che a questo punto che il submodule e' agganciato di default al master

Nel caso di yii, dove non ci sono branch 'stable' o 'release-*', occorre fare un checkout dello specifico tag. Per esempio:

    git checkout tags/1.1.14

Si ottiene un messaggio del tipo: "HEAD is now at f0fee98... 1.1.14 release.". Se andiamo su github, e ci posizioniamo su questo tag [link: https://github.com/yiisoft/yii/tree/1.1.14] vedremo che il "latest commit" ha lo stesso commit_id. Quindi e' andato tutto bene.

Ora riportiamo nella directory del 'supermodulo', ovvero yiiapp nel nostro esempio.

    cd yiiapp
    git status
    # On branch master
    # Changes to be committed:
    #(use "git reset HEAD ..." to unstage)
    #
    #modified: .gitmodules
    #new file: yii
    #

Questi cambiamenti sono "staged", per cui NON bisogna fare un add -A prima. E' pero' richiesto un commit specifico.

    git commit -m "Added Yii modules, at tags/1.1.14"

Quindi la modifica e' stata aggiunta allo skeleton in via ufficiale pushando sul master

    git push origin master

### Aggiungiamo un altro sottomodulo: yiistrap

Si ricorda importantissimo, che i comando "submodule add" devono sempre essere eseguiti dalla radice del supermodulo, motivo per cui viene fornito il patch dove creare la directory yiistrap
Yiistrap ha un branch "stable", per cui usiamo quello

    cd yiiapp
    git submodule add https://github.com/Crisu83/yiistrap.git protected/extensions/yiistrap
    cd protected/extensions/yiistrap
    git checkout stable

Ritorniamo nella radice del supermodulo per effettuare aggiunta, commit e push

    cd yii
    git commit -m "Added Yiistrap, at stable branch"
    git push origin master

### Aggiornare l'applicazione dopo l'aggiunta di sotto moduli

Andiamo nella directory dove abbiamo clonato l'app per iniziarne una nuova

    cd yiiapp2
    git pull origin
    git submodule init
    git submodule update

Verifichiamo che sia tutto ok

    cd protected/extensions/yiistrap/
    git log -n1

E verifichiamo se il commit id e' identico a quello del [branch stable su github](https://github.com/Crisu83/yiistrap/tree/stable)

Se si, tutto e' ok.

### Installazione di Selenium

Scaricare il Selenium Server da [http://docs.seleniumhq.org/download/](http://docs.seleniumhq.org/download/)

Posizionare il file JAR nella directory test/jar/ dell'applicazione.

Prima di eseguire i test che richiedono il browser, lanciare il jar con il comando:

    java -jar test/bin/selenium-server-standalone-2.35.0.jar

### Se si aggiorna il composer.json

Eseguire 

    php composer.phar update

Se il comando non riesce, eliminare tutto dentro a vendor/ e riprovare.
