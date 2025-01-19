<x-app-layout>
    <x-slot name="header">
        <!-- Lien vers Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Ajouter Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        /* Fond de la page avec image */
        .bg-image {
            background-image: url('{{ asset('images/airport_image.jpg') }}'); /* Remplacer avec l'URL de votre photo de l'aéroport */
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.5);
            height: 100%;
            color: white;
        }
        /* Enlever le soulignement des liens */
        a {
                text-decoration: none; /* Supprime le soulignement sous les liens */
                color: black; /* Change la couleur des liens en noir */
            }


    </style>
    </x-slot>

  <!-- Contenu de la page -->
  <div class="bg-image">
    <div class="overlay d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1>Bienvenue sur la plateforme de gestion des incidents de l'Aéroport Marrakech-Menara.</h1>
            <p class="lead">
                Veuillez utiliser le formulaire ci-dessous pour signaler tout incident rencontré. Assurez-vous de
                fournir des informations précises, y compris la gravité, pour faciliter une intervention rapide.
                Votre collaboration est essentielle pour garantir un environnement sûr et efficace. Merci de votre
                contribution !
            </p>
        </div>
    </div>
</div>

</x-app-layout>
