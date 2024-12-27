
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
<!-- Lien vers le fichier CSS -->
<link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <h1>Formulaire</h1>

        @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif


        <form action="{{ route('form.index') }}" method="POST">
            <div class="form-group">
                @csrf
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
    </div>
      <!-- Lien vers le fichier JavaScript -->
    <script src="style/script.js"></script>
</body>
</html>
