document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault(); // Empêche le rechargement de la page
            const formData = new FormData(this);

            try {
                const response = await fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });

                if (response.ok) {
                    const result = await response.json();
                    alert('Incident ajouté avec succès : ' + result.message);
                    location.reload(); // Recharge la liste après succès
                } else {
                    const error = await response.json();
                    alert('Erreur : ' + (error.message || 'Veuillez vérifier vos données.'));
                }
            } catch (err) {
                console.error('Erreur lors de la soumission du formulaire :', err);
                alert('Une erreur inattendue est survenue.');
            }
        });
    } else {
        console.error('Formulaire introuvable.');
    }

// Ajouter un événement de clic sur tous les liens de suppression
document.querySelectorAll('.delete').forEach(function (deleteLink) {
    deleteLink.addEventListener('click', function (e) {
        e.preventDefault();  // Empêche le comportement par défaut du lien

        // Récupérer l'ID du formulaire à supprimer
        const formulaireId = deleteLink.getAttribute('data-id');

        // Afficher une confirmation avant de soumettre le formulaire
        if (confirm("Êtes-vous sûr de vouloir supprimer cet incident ?")) {
            // Soumettre le formulaire de suppression correspondant à cet ID
            document.getElementById('delete-form-' + formulaireId).submit();
        }
    });
});
     // Sélectionner tous les boutons "view"
    document.querySelectorAll('.view').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id'); // Récupérer l'ID de l'incident
            const modalBody = document.querySelector('#viewIncidentModal .modal-body');

            // Afficher un message de chargement
            modalBody.innerHTML = '<p>Chargement des détails...</p>';

            // Effectuer une requête AJAX pour récupérer les détails
            fetch(`/formulaires/${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Erreur HTTP : ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    // Injecter les données dans la modal
                    modalBody.innerHTML = `
                        <h5>Prénom : ${data.first_name}</h5>
                        <p><strong>Nom :</strong> ${data.last_name}</p>
                        <p><strong>Objet :</strong> ${data.subject}</p>
                        <p><strong>Description :</strong> ${data.description}</p>
                        <p><strong>Gravité :</strong> ${data.severity}</p>
                    `;
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    modalBody.innerHTML = `
                        <p class="text-danger">Impossible de charger les détails de l'incident. Veuillez réessayer plus tard.</p>
                    `;
                });
        });
    });
});
