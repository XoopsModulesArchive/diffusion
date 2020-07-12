
Documentation pour le module de diffusion Version 1.1.0 (demande le
module docmanager Version 1.1.0)

Jeff Saucier

   <jsaucier _AT_ infostrategique _DOT_ com>
     _________________________________________________________

   Table des matières
   ChangeLog
   Informations
   Installation

        Pré requis
        Installation
     _________________________________________________________

ChangeLog

   Je vous recommande de mettre à jour votre installation vers cette
   nouvelle version. Simplement copier les fichiers par dessus les
   anciens (faire attention à votre fichier "include/configs.php" !!)

   Voici ce qui a changé depuis la dernière version :

     * Utilise maintenant le module docmanager Version 1.1.0
     * Correction de bugs
     _________________________________________________________

Informations

   Ce module permet d'envoyer un courriel avec des fichiers attachés
   aux utilisateurs du site. Le module dans son état courant n'est pas
   vraiment  utilisable  car  il  est lié de prêt à la réalité de
   l'extranet du CRISP. Cependant, vous pouvez adapter facilement son
   utilisation.

   Voici ce que permet le module :

     * Envoi d'un courriel soit aux personnes du groupe Membre ou à
       tous les utilisateurs
     * Archive  le  courriel  dans  les forums pour permettre une
       discussion
     * Place les documents dans le centre de documentation pour que les
       personnes ayant re¸u le courriel puissent venir prendre le
       document

   Ce module a été développé pour l'extranet du CRISP et est distribué
   sous license GPL.
     _________________________________________________________

Installation

Pré requis

   Ce module a été testé avec les configurations suivantes. D'autres
   configurations peuvent sûrement être supportées :

     * Le module dans son état courant n'est pas vraiment utilisable
       car il est lié de prêt à la réalité de l'extranet du CRISP.
       Cependant, vous pouvez adapter facilement son utilisation.
     * NOTE  : Ce module dépend de notre autre module, docmanager
       Version 1.1.0. Vous devez l'avoir afin de rendre le module de
       diffusion fonctionnel.
     * Xoops 2.0.7.x et 2.0.9.x
     * Linux et Apache
     _________________________________________________________

Installation

   Pour  installer ce module, décompresser l'archive et copier le
   répertoire "diffusion" dans le répertoire des modules de Xoops.

   Aller ensuite activer le module dans la page d'administration de
   Xoops.

   Maintenant,  vous  devez  créer  un  répertoire dans le module
   docmanager.  Je  vous  recommende  de créer ce répertoire avec
   l'attribut caché et de le mettre dans le répertoire Racine.

   Par la suite, ajuster les permissions afin de s'assurer que tout le
   monde a accès au répertoire (les utilisateurs ne pourront pas voir
   ou accéder le répertoire directement mais pourront aller chercher un
   fichier avec un lien direct).

   Prenez en note le ID du répertoire et aller l'inscrire dans le
   fichier include/configs.php dans le module de diffusion.

   Vous devez maintenant créer deux forums, l'un pour les membres et
   l'autres pour tous les utilisateurs. Prenez en note les ID des
   forums et aller les inscrire dans le fichier include/configs.php.

   Vous pouvez aussi modifier le nombre de fichiers permis dans le
   fichier include/configs.php.
