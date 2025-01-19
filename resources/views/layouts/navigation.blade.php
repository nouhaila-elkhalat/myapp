<nav x-data="{ open: false, showForm: false }" class="bg-orange-500 border-b border-gray-100  fixed top-0 left-0 w-full z-50 shadow-md">
            <!-- Primary Navigation Menu -->
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
           <div class="flex">

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <div class="inline-flex items-center px-1 pt-1 text-lg font-medium leading-5 text-gray-800 focus:outline-none hover:text-gray-600 transition duration-150 ease-in-out">
                    <a href="#" id="openModal" >Formulaire</a>
                </div>
            </div>
            </div>
                <!-- Votre fichier CSS de formulaire-->
             <link rel="stylesheet" href="style/style.css">
         <!-- Modal -->
    <div id="formModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h1>Formulaire</h1>
            <form id="customForm" method="POST" action="{{ route('dashboard.store') }}" >
                @csrf
                <div class="form-group">
                    <label for="first_name">Prénom :</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Entrez votre prénom" required>
                </div>

                <div class="form-group">
                    <label for="last_name">Nom :</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Entrez votre nom" required>
                </div>

                <div class="form-group">
                    <label for="subject">Objet :</label>
                    <input type="text" id="subject" name="subject" placeholder="Entrez l'objet" required>
                </div>

                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea id="description" name="description" placeholder="Entrez une description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="severity">Gravité :</label>
                    <select id="severity" name="severity" required>
                        <option value="" disabled selected>Choisissez une gravité</option>
                        <option value="Fiable">Fiable</option>
                        <option value="Moyen">Moyen</option>
                        <option value="Haut">Haut</option>
                    </select>
                </div>

                <button type="submit">Envoyer</button>
            </form>

            <div class="message success" id="successMessage">Formulaire soumis avec succès !</div>
            <div class="message error" id="errorMessage">Une erreur s'est produite lors de la soumission !</div>
        </div>
    </div>
            <!-- Votre fichier JavaScript de formulaire-->
           <script src="style/style.js"></script>

          <!-- Compte Utilisateur (Icône) et Notifications -->
          <div class="hidden sm:flex sm:items-center sm:ml-6">
            <!-- Icône de notification -->
            <div class="mr-4">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <i class="fas fa-bell fa-2x"></i>
                </button>
            </div>

            <!-- Icône de compte utilisateur avec taille augmentée -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <!-- Icône de profil utilisateur avec taille 2x -->
                        <i class="fas fa-user fa-2x"></i>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <!-- Authentification -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                      this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</div>
</nav>
