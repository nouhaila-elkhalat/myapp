<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des incidents</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .custom-orange {
            background-color: #ff4800;
        }
        .custom-gray {
            background-color: #b1b9c0;
        }
        .navbar-brand i {
            margin-right: 10px; /* Espace entre l'icône et le texte */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light custom-gray">
        <div class="container">
            <a class="navbar-brand" href="#">
                <!-- Icône de l'incident -->
                <i class="bi bi-exclamation-triangle-fill"></i>
                Application de Gestion des Incidents
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Laravel Blade Auth Check -->
                @if (Route::has('login'))
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="custom-orange text-white text-center py-5">
        <div class="container">
            <h1>Bienvenue</h1>
            <p class="lead">L'application de gestion des incidents à l'aéroport Marrakech-Menara permet aux utilisateurs de signaler efficacement les incidents tout en garantissant un accès sécurisé. Pour utiliser l'application, l'utilisateur doit d'abord s'inscrire en créant un compte personnel et en saisissant ses informations essentielles en cliquant sur Register. S'il possède déjà un compte, il peut se connecter en saisissant son adresse e-mail et son mot de passe en cliquant sur Login. Une fois connecté, il peut signaler un incident en remplissant un formulaire contenant son nom, prénom, l'objectif du signalement, une description détaillée de l'incident et le niveau de gravité (faible, moyen ou élevé). Après soumission, l'application assure un suivi structuré des incidents signalés, facilitant ainsi leur gestion et leur résolution.</p>
            <a href="#" class="btn btn-light btn-lg">En savoir plus</a>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4">
                    <div class="p-4">
                        <i class="bi bi-speedometer2 fs-1 text-primary"></i>
                        <h3 class="mt-3">Rapidité</h3>
                        <p>Gérez les incidents en toute simplicité avec notre plateforme rapide.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-4">
                        <i class="bi bi-shield-check fs-1 text-primary"></i>
                        <h3 class="mt-3">Sécurité</h3>
                        <p>Vos données sont protégées avec les normes de sécurité les plus élevées.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-4">
                        <i class="bi bi-people fs-1 text-primary"></i>
                        <h3 class="mt-3">Collaboration</h3>
                        <p>Collaborez efficacement avec vos collègues grâce à nos outils.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Application de Gestion des Incidents. Tous droits réservés.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

