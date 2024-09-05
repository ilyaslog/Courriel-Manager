<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de bord d'analyse | Hyper - Tableau de bord d'administration Bootstrap 5 réactif</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"
        rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- CSS personnalisé -->
    <style>
        /* Styles personnalisés pour la barre latérale */
        .sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false,"leftSidebarCondensed":false,"leftSidebarScrollable":false,"darkMode":false,"showRightSidebarOnStart":false}'>
    <!-- Commencer la page -->
    <div class="wrapper">
        <!-- Étendre la mise en page principale -->
        @extends('layouts.master')

        @section('content')
            <!-- Contenu du tableau de bord -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Créer un Courrier</h3>
                        <form id="mainForm" action="/courriels" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Expéditeur -->
                            <div class="form-group">
                                <label for="expediteur">Expéditeur</label>
                                <input disabled type="text" id="expediteur" class="form-control" name="expediteur"
                                    placeholder="{{ Auth::user()->name }}, &lt;{{ Auth::user()->email }}&gt;">
                                <input type="hidden" name="expediteur" value="{{ Auth::user()->email }}">
                            </div>

                            <!-- Sujet -->
                            <div class="form-group">
                                <label for="sujet">Sujet</label>
                                <input type="text" id="sujet" name="sujet" class="form-control"
                                    placeholder="Sujet">
                            </div>

                            <!-- Date du courrier -->
                            <div class="mb-3">
                                <label class="form-label">Date du courrier</label>
                                <input type="text" class="form-control date" id="date_du_courrier"
                                    name="date_du_courrier" data-toggle="date-picker" data-single-date-picker="true"
                                    disabled>
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Destinataire -->
                                    <div class="form-group">
                                        <label for="destinataire">Destinataire</label>
                                        <select class="form-control select2" id="destinataire" name="destinataire">
                                            <option disabled>-- Veuillez sélectionner des destinataires --</option>
                                            @foreach ($users as $user)
                                                @if ($user->email == Auth::user()->email)
                                                    <option value="{{ $user->id }}" disabled>{{ $user->email }}
                                                    </option>
                                                @else
                                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Catégorie -->
                                    <div class="form-group">
                                        <label for="categorie">Catégorie</label>
                                        <select class="form-control select2" id="categorie" name="categorie">
                                            <option disabled value="categorie">-- Veuillez sélectionner une Catégorie --
                                            </option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->nom }}">{{ $categorie->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Urgence -->
                                    <div class="form-group">
                                        <label for="urgence">Urgence</label>
                                        <select class="form-control select2" id="urgence" name="urgence">
                                            <option disabled selected value="urgence">-- Veuillez sélectionner une urgence
                                                --</option>
                                            @foreach ($urgences as $urgence)
                                                <option value="{{ $urgence->nom }}">{{ $urgence->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- Importance -->
                                    <div class="form-group">
                                        <label for="importance">Importance</label>
                                        <select class="form-control select2" id="importance" name="importance">
                                            <option disabled selected value="importance">-- Veuillez sélectionner une
                                                Importance --</option>
                                            @foreach ($importances as $importance)
                                                <option value="{{ $importance->nom }}">{{ $importance->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="example-fileinput" class="form-label">Fichier</label>
                                <input type="file" name="file" id="example-fileinput" class="form-control">
                            </div>


                        </form>
                    </div>
                </div>

                <!-- Bouton Soumettre -->
                <div class="form-group mt-3">
                    <button type="button" class="btn btn-primary" onclick="submitForms()">Soumettre</button>
                </div>
            </div>
        @endsection

        <!-- JavaScript personnalisé -->
        <script>
            function formatDate(dateString) {
                const parts = dateString.split('/');
                return `${parts[2]}-${parts[0]}-${parts[1]}`; // Convertir MM/JJ/AAAA en AAAA-MM-JJ
            }

            function submitForms() {
                const dateInput = document.getElementById("date_du_courrier");

                // Activer l'entrée de date
                dateInput.disabled = false;

                // Formater la date
                const formattedDate = formatDate(dateInput.value);
                dateInput.value = formattedDate; // Mettre à jour la valeur de l'entrée

                // Obtenir l'élément d'entrée de fichier
                const fileInput = document.getElementById('example-fileinput');
                const fileName = fileInput.files[0].name; // Obtenir le nom du fichier sélectionné

                // Optionnellement, ajouter le nom du fichier aux données du formulaire
                // Par exemple, vous pouvez créer un champ d'entrée caché
                const fileNameInput = document.createElement('input');
                fileNameInput.type = 'hidden';
                fileNameInput.name = 'fileName'; // Ajuster le nom selon les exigences de votre backend
                fileNameInput.value = fileName;
                document.getElementById('mainForm').appendChild(fileNameInput);

                // Soumettre le formulaire principal
                document.getElementById("mainForm").submit();
            }
        </script>

        <!-- jQuery et Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"
            integrity="sha384-TmEvkE3HO6vvoaS2wAXKv3GOtFUnH/L8Q+b/mD5lPAvcT0tkoqlkcYfL4xlezfpW" crossorigin="anonymous">
        </script>

        <!-- Select2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <!-- Initialiser Select2 -->
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>

        <!-- Importations de fichiers JS personnalisés (Dropzone, etc.) -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

    </div><!-- fin wrapper -->
</body>

</html>
