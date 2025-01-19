// Ouvrir le modal
const openModal = document.getElementById('openModal');
const modal = document.getElementById('formModal');
const closeModal = document.getElementById('closeModal');

openModal.addEventListener('click', (e) => {
    e.preventDefault(); // Empêche le comportement par défaut du lien
    modal.style.display = 'block';
});

// Fermer le modal
closeModal.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Fermer le modal si on clique à l'extérieur
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});

// Gestionnaire de soumission de formulaire
document.getElementById('customForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
        }
    })
    .catch(error => console.error('Erreur :', error));

    const firstName = document.getElementById('first_name').value;
    const lastName = document.getElementById('last_name').value;
    const subject = document.getElementById('subject').value;
    const description = document.getElementById('description').value;
    const severity = document.getElementById('severity').value;

    if (firstName && lastName && subject && description && severity) {
        // Simulation d'une soumission réussie
        document.getElementById('successMessage').style.display = 'block';
        document.getElementById('errorMessage').style.display = 'none';
    } else {
        document.getElementById('successMessage').style.display = 'none';
        document.getElementById('errorMessage').style.display = 'block';
    }
});
