# jobboard
Développement d'un Jobboard pour un exercice (Subskill)

Bonjour,
Je voulais tout d’abord vous remercier de m’avoir offert cette occasion, j’ai fait de mon mieux et j’ai essayé de trouver des solutions pour répondre aux problèmes que j’ai pu rencontrer.
Je commence seulement ma 3eme année de développement et celle-ci se focalise sur l’apprentissage technique ce qui me permettra d’être meilleure et polyvalente, d’autant plus grâce à l’alternance.
J’ai utilisé un modèle MVC qui m’a été enseigné l’année précédente pour une meilleure répartition des éléments.

Bonne lecture et bonne journée !


Problèmes rencontrés
Mise en place d’un $_GET :
L’URL ne récupère pas le chemin après le « ? » que je renvoie dans le paramètre action de la balise form car en SQL le « ? »  ici attend le retour des paramètres comme le métier, ce qui ne permet donc pas d’effectuer la recherche.
l.15:  <form action="index.php?uc=accueil&recherche" method="$_GET">
Solution → Remplacement du $_GET par un $_POST

Création d’API (ajout, modification, suppression d’une offre) :
Malheureusement je n’ai pu avoir de formation concernant la création d’API et par manque de temps je n’ai pas pu la réaliser.

Pagination :
Les calculs que j’ai pu faire et les références que j’ai trouvées ne m’ont pas suffi pour réaliser cette étape. J’ai essayé avec le LIMIT et le OFFSET.
J’avais une autre solution mais qui utilisait un GET pour l’obtention de la page, GET que je n’ai pas pu utiliser.
