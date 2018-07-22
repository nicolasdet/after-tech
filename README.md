
# After-tech.fr

  - Un site de gestion d'after-works
  - Open-source tout le monde est inviter à contribuer

### Tech

Stack technique:




### Installation

Installation avec Docker

```sh
$ git clone https://github.com/nicolasdet/after-tech.git
$ cd after-tech
$ docker-compose up --build
windows: HOST = http://192.168.99.100/ > http://after-tech.local/ 
mac + linux HOST = 0.0.0.0:80 > http://after-tech.local/ 
```

Installation sans docker (wamp)

```sh
$ git clone https://github.com/nicolasdet/after-tech.git
$ deplacer les fichier de bases de donnée dans le dossier de wamp/bin/mysql
crée le Vhost pour http://after-tech.local/ 
```

### Plugins

Dillinger is currently extended with the following plugins. Instructions on how to use them in your own application are linked below.

| Ressource | file |
| ------ | ------ |
| Code of conduct | [LorenIpsum.md][PlDb] |
| Licence | [LorenIpsum.md][PlGh] |
| Issue template | [LorenIpsum.md][PlGd] |
| Pull request Template | [LorenIpsum.md][PlOd] |
| Contributing | [LorenIpsum.md][PlMe] |



### Contribute

Want to contribute? Great!

Premiere étape:
```sh
$ LorenIpsum
```


### Todos

 - Améliorer le Readme
 - voir les issues et les fermée
 - voir les taches projet et les réalisée


License
----

MIT


**Free Software, Hell Yeah!**



## Test 

testunitraire = phpUnit

Bdd           = Behat + mink + sélénium + chrome 


les Features ce trouvent dans le dossier du même nom 

Il faut lancer le serveur sélénium:

assumon que MonProjet correspond a la racine du projet.

$ cd MonProjet/TestBehat/
$ java -Dwebdriver.gecko.driver=E:\chromedriver.exe -jar selenium.jar

le driver chrome est sur mon PC dans E:\ mais j'ai mis le fichier dans TestBehat/   a vous de le metre ou vous voulez et d'indiquer le bon path dans la commande.

$ cd MonProjet
$ ./vendor/bin/behat   (executer cette commande dans le git bash c'est mieux si on est sur windows )




[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [dill]: <https://github.com/joemccann/dillinger>
   [git-repo-url]: <https://github.com/joemccann/dillinger.git>
   [john gruber]: <http://daringfireball.net>
   [df1]: <http://daringfireball.net/projects/markdown/>
   [markdown-it]: <https://github.com/markdown-it/markdown-it>
   [Ace Editor]: <http://ace.ajax.org>
   [node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [@tjholowaychuk]: <http://twitter.com/tjholowaychuk>
   [express]: <http://expressjs.com>
   [AngularJS]: <http://angularjs.org>
   [Gulp]: <http://gulpjs.com>

   [PlDb]: <https://github.com/joemccann/dillinger/tree/master/plugins/dropbox/README.md>
   [PlGh]: <https://github.com/joemccann/dillinger/tree/master/plugins/github/README.md>
   [PlGd]: <https://github.com/joemccann/dillinger/tree/master/plugins/googledrive/README.md>
   [PlOd]: <https://github.com/joemccann/dillinger/tree/master/plugins/onedrive/README.md>
   [PlMe]: <https://github.com/joemccann/dillinger/tree/master/plugins/medium/README.md>
   [PlGa]: <https://github.com/RahulHP/dillinger/blob/master/plugins/googleanalytics/README.md>

