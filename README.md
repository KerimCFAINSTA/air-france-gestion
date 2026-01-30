#  Air France - Système de Gestion des Vols

![Air France](https://img.shields.io/badge/Air%20France-Gestion%20des%20Vols-002157?style=for-the-badge&logo=data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTIxIDEybC0xOCAxMiA1LTEyLTUtMTJ6IiBmaWxsPSIjZmZmIi8+PC9zdmc+)
![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

Application web de gestion des affectations de vols pour Air France, développée en PHP avec une architecture MVC moderne et sécurisée.

---

##  Table des matières

- [Fonctionnalités](#-fonctionnalités)
- [Technologies](#-technologies)
- [Architecture](#-architecture)
- [Prérequis](#-prérequis)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Utilisation](#-utilisation)
- [Sécurité](#-sécurité)
- [Structure du projet](#-structure-du-projet)
- [Captures d'écran](#-captures-décran)
- [Contribution](#-contribution)
- [Auteur](#-auteur)
- [Licence](#-licence)

---

##  Fonctionnalités

###  Gestion des Pilotes
- ✅ Ajouter, modifier, supprimer des pilotes
- ✅ Informations complètes : nom, prénom, email, bip, statut
- ✅ Statuts : Capitaine, Copilote, Instructeur
- ✅ Mots de passe sécurisés (hashage bcrypt)

###  Gestion des Avions
- ✅ Catalogue de la flotte Air France
- ✅ Désignation, constructeur, nombre de places
- ✅ CRUD complet (Create, Read, Update, Delete)

###  Gestion des Vols
- ✅ Planification des vols avec date et heure
- ✅ Affectation de 2 pilotes (capitaine + copilote)
- ✅ Association avec un avion
- ✅ Visualisation claire des affectations

###  Interface Moderne
- ✅ Design aux couleurs Air France (bleu #002157 + rouge #ed1c24)
- ✅ Icônes Font Awesome
- ✅ Responsive (mobile-friendly)
- ✅ Navigation intuitive

---

##  Technologies

| Technologie | Version | Usage |
|------------|---------|-------|
| **PHP** | 8.0+ | Backend, logique métier |
| **MySQL** | 8.0+ | Base de données |
| **PDO** | - | Requêtes sécurisées |
| **Font Awesome** | 6.5.1 | Icônes |
| **CSS3** | - | Styles modernes |
| **HTML5** | - | Structure |

---

##  Architecture

### Modèle MVC (Model-View-Controller)
