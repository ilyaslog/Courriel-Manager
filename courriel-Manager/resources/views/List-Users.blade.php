<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de bord d'analyse | Hyper - Tableau de bord d'administration Bootstrap 4 réactif</title>
    <link href="assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- CSS de l'application -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false,"leftSidebarCondensed":false,"leftSidebarScrollable":false,"darkMode":false}'>

    <div class="wrapper">
        @extends('layouts.master')

        @section('content')
        <div class="container-fluid">
            <div class="row">
                <h1>Liste des utilisateurs</h1>
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Date de création</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role == 1 ? 'Admin' : 'Client' }}</td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <button class="btn btn-primary edit-btn" data-id="{{ $user->id }}"
                                        data-toggle="modal" data-target="#edit-modal">
                                        <i class="dripicons-document-edit"></i> Editer
                                    </button>
                                    <button class="btn btn-danger delete-btn" data-id="{{ $user->id }}"
                                        data-toggle="modal" data-target="#delete-modal">
                                        <i class="dripicons-trash"></i> Supprimer
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection

       
<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="edit-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="edit-modalLabel">Modifier l'utilisateur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-form" method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="user-name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="user-name" name="name" value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="mb-3">
                        <label for="user-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="user-email" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="mb-3">
                        <label for="user-role" class="form-label">Rôle</label>
                        <select class="form-control" id="user-role" name="role">
                            <option value="1" >Admin</option>
                            <option value="2" >Client</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="confirm-edit">Enregistrer</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>


        <!-- Delete Modal -->
        <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="delete-modalLabel">Supprimer l'utilisateur</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="confirm-delete">Supprimer</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>

        <form id="delete-form" method="POST" style="display:none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/vendor/dataTables.buttons.min.js"></script>
    <script src="assets/js/vendor/buttons.bootstrap5.min.js"></script>
    <script src="assets/js/vendor/buttons.html5.min.js"></script>
    <script src="assets/js/vendor/buttons.flash.min.js"></script>
    <script src="assets/js/vendor/buttons.print.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle Edit Button Click
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-id');
                    fetch(`/users/${userId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('edit-form').action = `/users/${userId}`;
                            document.getElementById('user-name').value = data.name;
                            document.getElementById('user-email').value = data.email;
                            document.getElementById('user-role').value = data.role;
                        })
                        .catch(error => console.error('Erreur:', error));
                });
            });

            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-id');
                    document.getElementById('confirm-delete').setAttribute('data-id', userId);
                });
            });

            // Handle Confirm Delete Button Click
            document.getElementById('confirm-delete').addEventListener('click', function() {
                const userId = this.getAttribute('data-id');
                const deleteForm = document.getElementById('delete-form');
                deleteForm.action = `/users/${userId}`;
                deleteForm.submit();
            });

            // Handle Confirm Edit Button Click
            document.getElementById('confirm-edit').addEventListener('click', function() {
                const editForm = document.getElementById('edit-form');
                editForm.submit();
            });
        });
    </script>
</body>

</html>
