<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de bord d'analyse | Hyper - Tableau de bord d'administration Bootstrap 5 réactif</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

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
                    <div class="col-lg-6">
                        <h3>Créer une Importance, une Urgence ou une Catégorie</h3>
                        <form action="{{ route('importances.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Importance" class="form-label">Importance</label>
                                <input type="text" id="Importance" name="importance" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Valider l'Importance</button>
                        </form>

                        <form action="{{ route('urgences.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Urgence">Urgence</label>
                                <input type="text" id="Urgence" name="NomUrgence" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Soumettre l'Urgence</button>
                        </form>

                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Categorie">Catégorie</label>
                                <input type="text" id="Categorie" name="categorie" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Soumettre la Catégorie</button>
                        </form>
                    </div>

                    <div class="col-lg-6">
                        <h3>Voir toutes les Importances, Urgences ou Catégories</h3>
                        <div class="card">
                            <div class="card-body">
                                <h5>Sélectionner les options :</h5>
                                <div class="mb-3">
                                    <label for="select-importance" class="form-label">Importance</label>
                                    <select class="form-control select2" id="select-importance" name="importance">
                                        <option value="" disabled selected>-- Sélectionnez l'Importance --</option>
                                        @foreach ($importances as $importance)
                                            <option value="{{ $importance->id }}">{{ $importance->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-urgence" class="form-label">Urgence</label>
                                    <select class="form-control select2" id="select-urgence" name="urgence">
                                        <option value="" disabled selected>-- Sélectionnez une Urgence --</option>
                                        @foreach ($urgences as $urgence)
                                            <option value="{{ $urgence->id }}">{{ $urgence->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-categorie" class="form-label">Catégorie</label>
                                    <select class="form-control select2" id="select-categorie" name="categorie">
                                        <option value="" disabled selected>-- Sélectionnez une Catégorie --</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>



                        <h3>Supprimer une Importance, une Urgence ou une Catégorie</h3>
                        <div class="mb-3">
                            <label for="delete-importance" class="form-label">Importance</label>
                            <select class="form-control select2" id="delete-importance">
                                <option value="" disabled selected>-- Sélectionnez l'Importance --</option>
                                @foreach ($importances as $importance)
                                    <option value="{{ $importance->id }}">{{ $importance->nom }}</option>
                                @endforeach
                            </select>
                            <form id="importance-delete-form" action="" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </div>

                        <div class="mb-3">
                            <label for="delete-urgence" class="form-label">Urgence</label>
                            <select class="form-control select2" id="delete-urgence">
                                <option value="" disabled selected>-- Sélectionnez une Urgence --</option>
                                @foreach ($urgences as $urgence)
                                    <option value="{{ $urgence->id }}">{{ $urgence->nom }}</option>
                                @endforeach
                            </select>
                            <form id="urgence-delete-form" action="" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </div>

                        <div class="mb-3">
                            <label for="delete-categorie" class="form-label">Catégorie</label>
                            <select class="form-control select2" id="delete-categorie">
                                <option value="" disabled selected>-- Sélectionnez une Catégorie --</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                            <form id="categorie-delete-form" action="" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {

                $('.select2').select2();


                $('#delete-importance').change(function() {
                    const id = $(this).val();
                    $('#importance-delete-form').attr('action', `/importances/${id}`);
                });

                $('#delete-urgence').change(function() {
                    const id = $(this).val();
                    $('#urgence-delete-form').attr('action', `/urgences/${id}`);
                });

                $('#delete-categorie').change(function() {
                    const id = $(this).val();
                    $('#categorie-delete-form').attr('action', `/categories/${id}`);
                });
            });
        </script>

        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

</body>

</html>
