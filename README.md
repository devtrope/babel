# Bibliothèque de Babel

## Kesako ?

Grosso modo, et parce que je suis pas Wikipedia, c'est tiré d'une nouvelle, et ça serait une bibliothèque infinie qui contiendrait tous les livres de 410 pages possibles. Concrètement, il y aurait quelque part dans la bibliothèque ce README, le dialogue que j'ai eu avec mon frère le jour où je lui ai dit qu'il était adopté alors que pas du tout, ton contrat de travail, mon contrat de travail etc etc, t'as compris le concept.

## Pourquoi faire un script pour ça ?

Parce que générer une suite de caractères random ça me semble pas compliqué, c'est plus la quantité qui va être un souci, l'idée c'est que chaque livre a 410 pages, chaque page a 40 lignes, et chaque ligne environ 80 caractères, ce qui nous fait donc :

$`80 * 40 * 410 = 1 312 000`$

1 312 000 caractères, ce qui est beaucoup, mais si ça se trouve mon serveur web aura pas de souci à faire tourner ça, demandons lui.

_Mon serveur web :_

![GIF de mon serveur web](https://images.hive.blog/0x0/https://thumbs.gfycat.com/HeartyPassionateKob-size_restricted.gif)

Je pense que ça devrait le faire !

Il y a le site [libraryofbabel](https://libraryofbabel.info) qui fait justement ce concept là, avec quelques fonctionnalités intéressantes au-delà de la simple génération de 410 pages de charabia.  
Genre `gqxzxkxxevbxemhzcoqxiwfaynpmnpvd.epkfgdwzwjkqvom` je sais pas trop ce que ça veut dire par exemple.

Vous pouvez par exemple chercher n'importe quelle phrase dans l'immensité de la bibliothèque, celle que je viens d'écrire par exemple (sans les accents) : 

![Capture d'écran d'une suite de caractères random avec ma phrase au milieu](https://www.hebergeur-image.com/upload/88.168.198.53-679cbc47207c0.PNG)

Mais je ne pense pas avoir les capacités de stockage d'autant de bouquins malheureusement.

## Est-ce que ça peut vraiment générer un livre complet ?

Pour donner un ordre d'idées, avec les 26 lettres de l'alphabet en minuscule, des espaces, des points et des virgules, soit 29 caractères, le nombre possible de combinaisons est de $`29^{1312000}`$ ce qui est plus qu'immense, pour donner un ordre d'idées, le nombre d'atomes dans l'univers est de $`2x10^{79}`$ donc on parle d'un nombre astronomique de livres.

Disons que la probabilité de générer un livre complet, en français, avec du sens est quasi-nulle, on parle de 0.000000000000...(avec beaucoup de 0 derrière)...1%, mais techniquement pas impossible en tout cas.

## Comment tu comptes faire évoluer ce projet une fois le script fini ?

![Capture d'écran de Twitter (nan pas X)](https://pbs.twimg.com/media/GY-9xM9W8AAs28o.jpg)