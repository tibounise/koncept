# Koncept

## Partie utilisateur

Doit être rempli.

## Partie administrateur

### Interface de l'administration

#### Charte graphique

La charte graphique est définie selon les points suivants :
 - Les couleurs utilisées principalement sont :
	 - Magenta : cd1c69
	 - Cyan : 2a929d
	 - Gris foncé : 383938
	 - Gris moyen : 616262
	 - Gris clair : d6d6d7
 - Le logo est forcément sur fond gris foncé ou gris clair
 - Le bleu est toujours au dessus du magenta sur le logo

#### Traductions

Les traductions de l'interface sont faites au format JSON. Elle sont organisées de la manière suivante (spécifications de la v1) :

    {
        "language":"fr",
        "matchspecs":1,
        "locales":
        {
            "Identifiant de la chaine de caractères" : "Traduction"
        }
    }

Language permet de savoir quel language est représenté par le fichier. Matchspecs donne le numéro de version de la spécification que respecte le fichier. Le tableau locales contient toutes les traductions.

#### Interfaces graphiques

WIP. C'est très spécial

#### ssParser

Le slash-slash-Parser est un parser intégré dans la partie admin de koncept. Sa syntaxe permet d'éviter tout problème avec du code HTML, et se présente sous la forme suivante :

    <Type//Param>

Il est utilisé dans le Localization pour traduire les textes en plusieurs langues, mais aussi dans l'InterfaceBuilder, pour ajouter les tokens dans les liens.