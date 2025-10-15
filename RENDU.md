# Sécurisation de l'application
## Authentification 48h

![alt text](assets/img/cookie.png)

*Si l'image ne s'affiche pas, consulter assets/img/cookie*

Ajouts dans **session** dans config/packages/framework.yaml, les 2 lignes importantes sont "cookie_lifetime" qui permet de définir le temps de vie, en secondes, du cookie côté client (ici 172800 secondes pour 48h commme demandé) ainsi que "gc_maxlifetime" qui gère côté serveur.

## Cookie du mode affichage

Pour le moment le cookie n'arrive pas à être exécuté à cause du CSRF, à voir si j'arrive à résoudre ça plus tard. Cependant j'ai bien créer un fichier Subscriber pour cette partie là du rendu.

## Protection CSRF

La protection CSRF (Cross-Site Request Forgery) est une mesure de sécurité importante qui permet d'ajouter un token CSRF dans des requêtes sensibles, ce qui permet de prouver que ces dernières proviennent bien du vrai site et non pas d'un autre domaine cherchant à se faire passer pour.

![alt text](assets/img/csrf.png)

*Si l'image ne s'affiche pas, consulter assets/img/csrf*

Simple changement (décommenter la ligne) dans config/packages/framework.yaml

## Vulnérabilité des dépendances

Commande **composer audit** afin de pouvoir voir quelles dépendances possèdent des vulnérabilités potentielles.

![alt text](<./assets/img/Symfony dependances.png>)

*Si l'image ne s'affiche pas, consulter assets/img/Symfony dependances*

Le terminal affiche la liste de dépendances susceptibles de créer des brèches de sécurité.

## Difficultés rencontrées et solutions

Première difficulté: La mise en place du cookie d'affichage entre clair et sombre, apparement au vu de ce que dit la console le CSRF (je suppose) bloque l'execution du script.

Deuxième difficulté: Je n'arrive pas à accéder à la page edit pour user, cela m'indique l'erreur suivante:

![alt text](<assets/img/user error.png>)

À résoudre plus tard pour le moment.

Troisième difficulté: Le remplacement des pages d'erreur ne se fait pas. (-> peut-être car Symfony affiche ses propres pages d'erreur en mode dev, à voir passer en mode prod).