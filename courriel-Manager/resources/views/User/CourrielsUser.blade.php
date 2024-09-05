<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Tableau de bord Analytics | Hyper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Un thème d'administration complet pour CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/vendor/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" id="light-style">
    <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" id="dark-style">

    <!-- Styles personnalisés -->
    <!-- Add any custom stylesheets here -->

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark"}'>
    <div class="wrapper">
        @extends('layouts.partials.User.masterUser')

        @section('content')
            <div class="content">
                <h1>Bonjour {{ Auth::user()->name }}, bienvenue dans votre boîte de réception !</h1>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="page-aside-left">
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#compose-modal">Composer</button>
                                        </div>
                                        <div class="email-menu-list mt-3">
                                            <a href="javascript:void(0);" class="text-danger fw-bold"><i
                                                    class="dripicons-inbox me-2"></i>Boîte de réception <span
                                                    class="badge badge-danger-lighten float-end ms-2"></span></a>

                                            <a href="{{ route('SentMails') }}" href="javascript:void(0);"><i
                                                    class="dripicons-exit me-2"></i>Messages envoyés</a>
                                        </div>
                                    </div>

                                    <div class="page-aside-right">
                                        <div class="mt-3">
                                            <ul class="email-list">
                                                @php
                                                    $sortedCourriels = $courriels->sortByDesc('created_at');
                                                @endphp
                                                @foreach ($sortedCourriels as $courriel)
                                                    @if ($courriel->destinataire == Auth::user()->id)
                                                        <li>
                                                            <div class="email-sender-info">
                                                                <div class="checkbox-wrapper-mail">
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            id="mail{{ $courriel->id }}">
                                                                        <label class="form-check-label"
                                                                            for="mail{{ $courriel->id }}"></label>
                                                                    </div>
                                                                </div>
                                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                                <a href="{{ route('courriel.show', $courriel->id) }}"
                                                                    class="email-title">{{ $courriel->expediteur->name }}</a>
                                                            </div>
                                                            <div class="email-content">
                                                                <a href="{{ route('courriel.show', $courriel->id) }}"
                                                                    class="email-subject">{{ $courriel->sujet }}</a>
                                                                <div class="email-date">
                                                                    {{ $courriel->created_at->format('d-m-Y') }}</div>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="row">
                                            <div class="col-7 mt-1">Affichage 1 - 20 de {{ $courriels->count() }}</div>
                                            <div class="col-5">
                                                <div class="btn-group float-end">
                                                    <button type="button" class="btn btn-light btn-sm"><i
                                                            class="mdi mdi-chevron-left"></i></button>
                                                    <button type="button" class="btn btn-info btn-sm"><i
                                                            class="mdi mdi-chevron-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de composition -->
                <div id="compose-modal" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="compose-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-primary">
                                <h4 class="modal-title" id="compose-header-modalLabel">Nouveau message</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Fermer"></button>
                            </div>
                            <div class="p-1">
                                <div class="modal-body px-3 pt-3 pb-0">
                                    <div class="col-md-12">
                                        <h3>Créer un Courrier</h3>
                                        <form id="mainForm" action="/User/CourrielsUser" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <!-- Expéditeur -->
                                            <div class="form-group">
                                                <label for="expediteur">Expéditeur</label>
                                                <input disabled type="text" id="expediteur" class="form-control"
                                                    name="expediteur"
                                                    placeholder="{{ Auth::user()->name }}, &lt;{{ Auth::user()->email }}&gt;">
                                                <input type="hidden" name="expediteur"
                                                    value="{{ Auth::user()->email }}">
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
                                                    name="date_du_courrier" data-toggle="date-picker"
                                                    data-single-date-picker="true" disabled>
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
                                                        <select class="form-control select2" id="destinataire"
                                                            name="destinataire">
                                                            <option disabled>-- Veuillez sélectionner des destinataires --
                                                            </option>
                                                            @foreach ($users as $user)
                                                                @if ($user->email == Auth::user()->email)
                                                                    <option value="{{ $user->id }}" disabled>
                                                                        {{ $user->email }}</option>
                                                                @else
                                                                    <option value="{{ $user->id }}">
                                                                        {{ $user->email }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Catégorie -->
                                                    <div class="form-group">
                                                        <label for="categorie">Catégorie</label>
                                                        <select class="form-control select2" id="categorie"
                                                            name="categorie">
                                                            <option disabled value="categorie">-- Veuillez sélectionner une
                                                                Catégorie --</option>
                                                            @foreach ($categories as $categorie)
                                                                <option value="{{ $categorie->nom }}">
                                                                    {{ $categorie->nom }}</option>
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
                                                        <select class="form-control select2" id="urgence"
                                                            name="urgence">
                                                            <option disabled selected value="urgence">-- Veuillez
                                                                sélectionner une urgence --</option>
                                                            @foreach ($urgences as $urgence)
                                                                <option value="{{ $urgence->nom }}">{{ $urgence->nom }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <!-- Importance -->
                                                    <div class="form-group">
                                                        <label for="importance">Importance</label>
                                                        <select class="form-control select2" id="importance"
                                                            name="importance">
                                                            <option disabled selected value="importance">-- Veuillez
                                                                sélectionner une Importance --</option>
                                                            @foreach ($importances as $importance)
                                                                <option value="{{ $importance->nom }}">
                                                                    {{ $importance->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-fileinput" class="form-label">Fichier</label>
                                                <input type="file" name="file" id="example-fileinput"
                                                    class="form-control">
                                            </div>


                                        </form>
                                    </div>
                                </div>

                                <!-- Bouton Soumettre -->
                                <div class="form-group mt-3">
                                    <button type="button" class="btn btn-primary"
                                        onclick="submitForms()">Soumettre</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
        </div>
    @endsection
    </div>
    <!-- End wrapper -->

    <!-- App js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- Custom JS -->
    <!-- Add any custom JavaScript here -->
</body>

</html>
