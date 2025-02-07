# efrei_b2_challengeWeb_helldiver-s-2 <!-- omit in toc -->

- [Description du projet](#description-du-projet)
- [Installation](#installation)
  - [Prérequis](#prérequis)
  - [Installation des dépendances](#installation-des-dépendances)
  - [Lancer le serveur avec Docker Desktop](#lancer-le-serveur-avec-docker-desktop)
- [Utilisation](#utilisation)
- [Collaborateurs](#collaborateurs)

# Description du projet

Ce projet est une application web de gestion de tâches développée dans le cadre du cours de challenge web à l'Efrei. L'application permet aux utilisateurs de créer, modifier et supprimer des publications, ainsi que de commenter les publications existantes. Elle inclut également un système de rôles pour différencier les administrateurs des utilisateurs.

Les principales fonctionnalités de l'application sont :
- Création et gestion des publications
- Système de commentaires pour les publications
- Authentification des utilisateurs
- Gestion des rôles des utilisateurs (administrateur et utilisateur)
- Interface utilisateur réactive

# Installation

## Prérequis

- [Composer](https://getcomposer.org/download/)
- [Docker Desktop](https://www.docker.com/products/docker-desktop)

## Installation des dépendances

Si vous n'avez pas installé Composer, vous pouvez l'installer en tapant cette commande pour Linux :

```bash
sudo apt-get install composer
```
ou sur cette page pour windows et Mac  [composer dowload](https://getcomposer.org/download/)


Ensuite, vous pouvez installer les dépendances du projet en exécutant cette commande :

```bash
composer install
```

## Lancer le serveur avec Docker Desktop

lancer dockerDeskstop si vous ne l'avez pas voici où l'installer :

- [dockerDesktops windows](https://docs.docker.com/desktop/setup/install/windows-install/)
- [docekrDesktops Linux](https://docs.docker.com/desktop/setup/install/linux/)
- [docekrDesktops MacOs](https://docs.docker.com/desktop/setup/install/mac-install/)

aller dans le dossier **efrei_b2_challengeWeb_Helldiver-s-2**

```bash
cd efrei_b2_challengeWeb_Helldiver-s-2
```

```bash
docker-compose up --build
```

### vous pouvez y acceder sur `http://localhost:8080` dans votre navigateur. <!-- omit in toc -->

# Utilisation

## Admin <!-- omit in toc -->

log : admin@admin.com
password : adminadmin


# Collaborateurs

- [Lucas MAIORANO](https://github.com/lucasmaiorano77)
- [Leo MALGONNE](https://github.com/AlpinooO)
- [Harold LAJOUS](https://github.com/Lajous-Harold)
- [Lucas ROSIER](https://github.com/LucasR65)
