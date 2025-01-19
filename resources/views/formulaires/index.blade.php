
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Liste des incidents</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="liste/liste.css">
    <!-- Votre fichier JavaScript de formulaire-->
    <script src="liste/liste.js"></script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Gestion des incidents</h2>
                    </div>
                    <div class="col-sm-6">
              <a href="#addIncidentModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter un incident</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>

                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Objet</th>
                    <th>Description</th>
                    <th>Gravité</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($formulaires as $formulaire)
                <tr>
                    <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox3" name="options[]" value="1">
                            <label for="checkbox3"></label>
                        </span>
                    </td>
                        <td>{{ $formulaire->first_name }} {{ $formulaire->last_name }}</td>
                        <td>{{ $formulaire->subject }}</td>
                        <td>{{ $formulaire->description }}</td>
                        <td>{{ $formulaire->severity }}</td>
                        <td>{{ $formulaire->created_at }}</td>
                        <td class="d-flex justify-content-center gap-2">
                          <!-- Lien pour ouvrir la modal -->
         <a href="#" class="view" data-id="{{ $formulaire->id }}" data-toggle="modal" data-target="#viewIncidentModal">
              <i class="material-icons" data-toggle="tooltip" title="View">&#xE417;</i>
         </a>
                           <!-- Bouton pour ouvrir le modal d'édition -->
      <a href="#editIncidentModal-{{ $formulaire->id }}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

                           <!-- Lien pour ouvrir la modal de suppression -->
     <a href="#" class="delete" title="Delete" data-id="{{ $formulaire->id }}" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                      </tr>
                    </tr>
                    <form method="POST" action="{{ route('formulaires.destroy', $formulaire->id) }}" style="display:inline;" id="delete-form-{{ $formulaire->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="display:none;" id="deleteButton-{{ $formulaire->id }}"></button>
                    </form>

         <!-- Add Modal HTML -->
<div id="addIncidentModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('formulaires.store') }}">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un incident</h4>
                    <button type="button" class="close" data-dismiss="modal" id="closeModal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first_name">Prénom</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Nom</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Objet</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="form-group">
                        <label for="severity">Gravité</label>
                        <select class="form-control" id="severity" name="severity" required>
                            <option value="" disabled selected>Choisissez une gravité</option>
                            <option value="Fiable">Fiable</option>
                            <option value="Moyen">Moyen</option>
                            <option value="Haut">Haut</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-info">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
                <!-- Edit Modal HTML -->
<div id="editIncidentModal-{{ $formulaire->id }}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('formulaires.update', $formulaire->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h4 class="modal-title">Modifier l'incident</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first_name">Prénom</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ $formulaire->first_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Nom</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ $formulaire->last_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Objet</label>
                        <input type="text" id="subject" name="subject" class="form-control" value="{{ $formulaire->subject }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" required>{{ $formulaire->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="severity">Gravité</label>
                        <select id="severity" name="severity" class="form-control" required>
                            <option value="Fiable" {{ $formulaire->severity === 'Fiable' ? 'selected' : '' }}>Fiable</option>
                            <option value="Moyen" {{ $formulaire->severity === 'Moyen' ? 'selected' : '' }}>Moyen</option>
                            <option value="Haut" {{ $formulaire->severity === 'Haut' ? 'selected' : '' }}>Haut</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-info">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</tbody>
@endforeach
</table>
</div>
</div>
</div>
 <!-- View Modal HTML -->
 <div id="viewIncidentModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détails de l'incident</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Contenu chargé dynamiquement -->
                <p>Chargement des détails...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
