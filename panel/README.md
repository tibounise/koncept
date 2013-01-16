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

Toutes les interfaces graphiques doivent être produites à l'aide de interface/interfacebuilder.php. La fonction InterfaceBuilder::buildStandardPage() vous permet de créer une page basique. Vous devez alimenter en paramètre de la fonction une chaîne de caractère contenant le code html que vous vous afficher. Cette fonction donne en retour le code HTML de la page.