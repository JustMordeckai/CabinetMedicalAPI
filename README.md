# CabinetMedicalAPI

## Objectif
L’objectif de ce projet est de reprendre le projet de gestion d’un cabinet médical proposé dans la
ressource R3.01 du semestre 3, et d’externaliser les traitements relatifs à la gestion des usagers,
des médecins, et des consultations à différentes API REST.

## Travail à réaliser
La figure ci-dessous décrit l’architecture générale du projet.
Deux bases de données distinctes doivent être mises en œuvre : l’une contiendra les utilisateurs
autorisés à interagir avec les API du cabinet médical ; l’autre contiendra les informations sur les
usagers, les médecins et les consultations. L’objectif de ces deux bases de données est de
clairement séparer les parties “authentification” et “traitement métier”.
Les API à concevoir sont détaillées ci-dessous.

### API authentification
Cette API est responsable de la création des jetons qui doivent être transmis aux API de gestion
du cabinet médical. La base de données associée à cette API contient donc les identifiants des
secrétaires autorisé·e·s à accéder aux API de gestion du cabinet médical.

### API de gestion de la ressource usagers
Cette API est responsable de la gestion (i.e., création, modification, mise à jour, suppression) des
usagers du cabinet médical. Pour être manipulée, elle requiert un jeton valide d’authentification.

### API de gestion de la ressource médecins
Cette API est responsable de la gestion (i.e., création, modification, mise à jour, suppression) des
médecins du cabinet médical. Pour être manipulée, elle requiert un jeton valide d’authentification.

### API de gestion de la ressource consultations
Cette API est responsable de la gestion (i.e., création, modification, mise à jour, suppression) des
consultations du cabinet médical. La contrainte de non chevauchement de deux consultations pour
un même médecin proposée dans le projet du semestre 3 doit être préservée. Pour être
manipulée, cette API requiert un jeton valide d’authentification.

### API de demande de statistiques
La demande d’obtention des statistiques ne respecte pas le principe CRUD, nous ne pouvons pas
considérer cette API comme étant Rest. Malgré tout, pour respecter un format général cohérent, il
sera nécessaire de prévoir un endpoint spécifique comme si les stats étaient une ressource à part
entière.

### Interface cliente
Reprendre la partie front-end de votre projet de la ressource R3.01, et la modifier afin qu’elle
interagisse avec vos différentes API.

## Ce que vous devez rendre
Différents livrables sont attendus pour ce projet :
- Une documentation décrivant le fonctionnement des différentes API (à déposer sur Moodle). Vous porterez une attention particulière au format utilisé pour cette documentation. Vous pouvez prendre exemple sur différentes documentations d’API que vous trouverez en ligne.
- Une archive contenant le code source de chacune de vos API (à déposer sur Moodle). L’archive devra contenir deux dossiers : l’un pour l’API d'authentification et l’autre pour le code de l’API de l’application médicale.
- Les API doivent être disponibles en ligne sur le site alwaysdata. ATTENTION : vous devez créer 2 comptes sur alwaysdata. L’un des comptes sera dédié à l’API d’authentification et gérera la base de données des comptes utilisateurs (et les jetons) ; l’autre compte hébergera l’application médicale et gérera la base de données associée.
- Une collection Postman incluant différentes requêtes permettant d’interagir avec chacune de vos API (à déposer sur Moodle). Le gabarit de la collection Moodle vous est fourni par l’équipe enseignante. Le nom de la collection devra être mis à jour selon le format suivant : <Equipe A1> <NOM1>-<NOM2>.

## Bonus
Les fonctionnalités ci-dessous sont optionnelles (en dehors du barème /20) :
- Gestion des jours fériés à partir d’une API disponible en ligne.
- Gestion de différents rôles (secrétaire, usager, médecin) avec droits d’accès spécifiques.
