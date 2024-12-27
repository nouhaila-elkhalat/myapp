document.addEventListener('DOMContentLoaded', function () {
    // Gestionnaire de soumission de formulaire
    document.getElementById('customForm').addEventListener('submit', function (e) {
        e.preventDefault(); // Empêche l'envoi réel du formulaire

        // Récupération des valeurs des champs
        const firstName = document.getElementById('first_name').value.trim();
        const lastName = document.getElementById('last_name').value.trim();
        const subject = document.getElementById('subject').value.trim();
        const description = document.getElementById('description').value.trim();
        const severity = document.getElementById('severity').value;

        // Vérification que tous les champs sont remplis
        if (firstName && lastName && subject && description && severity) {
            // Affiche un message de succès
            document.getElementById('successMessage').style.display = 'block';
            document.getElementById('errorMessage').style.display = 'none';

            // Réinitialise le formulaire (facultatif)
            document.getElementById('customForm').reset();
        } else {
            // Affiche un message d'erreur si des champs sont vides
            document.getElementById('successMessage').style.display = 'none';
            document.getElementById('errorMessage').style.display = 'block';
        }
    });
});
