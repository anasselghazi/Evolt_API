 # ⚡ EVolt API

## 📌 Description

**EVolt API** est une API REST développée avec **Laravel** pour la gestion des bornes de recharge pour véhicules électriques.

Elle permet aux utilisateurs de :

* rechercher des bornes de recharge disponibles
* réserver un créneau de recharge
* gérer leurs réservations
* consulter l’historique des sessions de recharge

Les administrateurs peuvent :

* gérer les bornes de recharge (CRUD)
* consulter les statistiques d’utilisation.

---

# 🚀 Technologies utilisées

* **Laravel 10+**
* **Laravel Sanctum** (Authentification API)
* **MySQL**
* **Postman** (tests API)
* **PHP 8+**

---

# ⚙️ Installation

### 1️⃣ Cloner le projet

```bash
git clone https://github.com/username/evolt-api.git
```

### 2️⃣ Aller dans le dossier du projet

```bash
cd evolt-api
```

### 3️⃣ Installer les dépendances

```bash
composer install
```

### 4️⃣ Configurer le fichier .env

Copier le fichier :

```bash
cp .env.example .env
```

Modifier les informations de base de données :

```
DB_DATABASE=evolt
DB_USERNAME=root
DB_PASSWORD=
```

### 5️⃣ Générer la clé de l'application

```bash
php artisan key:generate
```

### 6️⃣ Lancer les migrations

```bash
php artisan migrate
```

### 7️⃣ Lancer le serveur

```bash
php artisan serve
```

Le serveur sera accessible sur :

```
http://127.0.0.1:8000
```

---

# 🔐 Authentification

L'API utilise **Laravel Sanctum** pour sécuriser les requêtes.

Après connexion, un **token** est généré et doit être envoyé dans le header :

```
Authorization: Bearer TOKEN
```

---

# 📡 API Endpoints

## Authentification

| Method | Endpoint      | Description |
| ------ | ------------- | ----------- |
| POST   | /api/register | Inscription |
| POST   | /api/login    | Connexion   |

---

## Stations

| Method | Endpoint           | Description         |
| ------ | ------------------ | ------------------- |
| GET    | /api/stations      | Liste des bornes    |
| GET    | /api/stations/{id} | Détails d'une borne |
| POST   | /api/stations      | Ajouter une borne   |
| PUT    | /api/stations/{id} | Modifier une borne  |
| DELETE | /api/stations/{id} | Supprimer une borne |

---

## Reservations

| Method | Endpoint               | Description              |
| ------ | ---------------------- | ------------------------ |
| GET    | /api/reservations      | Liste des réservations   |
| POST   | /api/reservations      | Créer une réservation    |
| PUT    | /api/reservations/{id} | Modifier une réservation |
| DELETE | /api/reservations/{id} | Annuler une réservation  |

---

# 🗄️ Structure du projet

```
app
 ├── Models
 │    ├── User.php
 │    ├── Station.php
 │    └── Reservation.php
 │
 ├── Http
 │    ├── Controllers
 │    │     ├── AuthController.php
 │    │     ├── StationController.php
 │    │     └── ReservationController.php
 │
database
 ├── migrations
```

---

# 🧪 Tests

Les endpoints peuvent être testés avec :

* **Postman**
* **Insomnia**

Exemple :

```
GET /api/stations
```

Header :

```
Authorization: Bearer TOKEN
```

---

# 📊 Fonctionnalités principales

✔ Authentification sécurisée avec Sanctum
✔ Gestion des bornes de recharge
✔ Système de réservation
✔ Gestion des sessions de recharge
✔ API RESTful
✔ Gestion des erreurs

---

# 📚 Documentation API

La documentation complète de l'API est disponible via **Postman Collection**.

---

# 👨‍💻 Auteur

**Anass Elghazi**

Développeur Web Full Stack
YouCode - Safi, Maroc

---

# 📄 Licence

Ce projet est développé dans un cadre pédagogique.
