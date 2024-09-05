<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Tableau de bord Analytics | Hyper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Un thème d'administration complet pour CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- Favicon de l'application -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"
        rel="stylesheet">

    <!-- CSS personnalisé -->
    <style>
        .email-content {
            border-bottom: 1px solid #f0f0f0;
            padding: 15px 0;
        }

        .email-subject {
            padding: 20px;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 20px;
        }

        .email-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .email-actions button {
            margin-left: 10px;
        }

        .email-menu-list a {
            display: block;
            padding: 10px 20px;
            color: #444;
        }

        .email-menu-list a:hover {
            background-color: #f0f0f0;
        }

        .modal-dialog {
            max-width: 800px;
        }
    </style>

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark"}'>
    <div class="wrapper">
        @extends('layouts.partials.User.masterUser')
        @section('content')
            <div class="content">
                <h1>Bonjour {{ Auth::user()->name }}, bienvenue dans votre boîte de réception !</h1>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-grid">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#compose-modal" disabled="">boîte de réception</button>
                                    </div>
                                    <div class="email-menu-list mt-3">
                                        <a href="{{ route('CourrielsUser') }}" href="javascript:void(0);"
                                            class="text-danger fw-bold"><i class="dripicons-inbox me-2"></i>Boîte de
                                            réception <span class="badge badge-danger-lighten float-end ms-2"></span></a>

                                        <a href="{{ route('SentMails') }}" href="javascript:void(0);"><i
                                                class="dripicons-exit me-2"></i>Messages envoyés</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="email-content">
                                        <div class="email-subject">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="info">
                                                    <h3 class="m-0 font-14">{{ $courriel->expediteur->name }},
                                                        &lt;{{ $courriel->expediteur->email }}&gt;</h3>

                                                </div>
                                                <div class="ms-auto">
                                                    <h6 class="text-muted">
                                                        {{ $courriel->created_at->format('M d, Y H:i A') }}</h6>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <div class="mb-2">
                                                        <strong>Importance :</strong>
                                                        <span class="badge bg-primary">{{ $courriel->importance }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-2">
                                                        <strong>Urgence :</strong>
                                                        <span class="badge bg-danger">{{ $courriel->urgence }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-2">
                                                        <strong>Catégorie :</strong>
                                                        <span class="badge bg-info">{{ $courriel->categorie }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5>{{ $courriel->sujet }}</h5>
                                            <p>{{ $courriel->description }}</p>


                                            @if ($courriel->courrier)
                                                @php
                                                    $filename = basename($courriel->courrier);
                                                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
                                                @endphp

                                                <div class="email-attachments">
                                                    <h5 class="mb-3">Pièces jointes</h5>
                                                    <div class="row">
                                                        <div class="col-xl-4">
                                                            <div class="card mb-1 shadow-none border">
                                                                <div class="p-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-auto">
                                                                            <div class="avatar-sm">
                                                                                <span
                                                                                    class="avatar-title bg-primary-lighten text-primary rounded">
                                                                                    .{{ strtoupper($extension) }}
                                                                                    <!-- Extension en majuscules -->
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col ps-0">
                                                                            <a href="{{ asset('path/to/attachments/' . $courriel->courrier) }}"
                                                                                class="text-muted fw-bold">{{ $filename }}</a>

                                                                            <p class="mb-0">2,3 Mo</p>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <a href="{{ asset('path/to/attachments/' . $courriel->courrier) }}"
                                                                                class="btn btn-link btn-lg text-muted"
                                                                                download>
                                                                                <i class="dripicons-download"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- fin col -->
                                                        <!-- Répéter pour d'autres pièces jointes si nécessaire -->
                                                    </div> <!-- fin row-->
                                                </div>
                                            @endif


                                            <!-- Boutons -->
                                            <div class="email-actions">
                                                <a href="{{ route('CourrielsUser') }}" class="btn btn-secondary"><i
                                                        class="mdi mdi-reply me-1"></i> Retour à la boîte de réception</a>

                                            </div>
                                        </div>
                                        <!-- fin email-subject -->
                                    </div>
                                    <!-- fin email-content -->
                                </div>
                                <!-- fin card-body -->
                            </div>
                            <!-- fin card -->
                        </div>
                        <!-- fin col -->
                    </div>
                    <!-- fin row -->
                </div>
                <!-- fin container-fluid -->
                <div id="compose-modal" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="compose-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-primary">
                                <h4 class="modal-title" id="compose-header-modalLabel">Nouveau message</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Fermer"></button>
                            </div>
                            <div class="p-1">
                                <div class="modal-body px-3 pt-3 pb-0">
                                    <form id="messageForm">
                                        <div class="mb-2">
                                            <label for="msgto" class="form-label">À</label>
                                            <input type="text" id="msgto" class="form-control"
                                                placeholder="Exemple@courriel.com">
                                        </div>
                                        <div class="mb-2">
                                            <label for="mailsubject" class="form-label">Sujet</label>
                                            <input type="text" id="mailsubject" class="form-control"
                                                placeholder="Votre sujet">
                                        </div>
                                        <div class="write-mdg-box mb-3">
                                            <label class="form-label">Message</label>
                                            <textarea id="simplemde1" class="form-control" rows="4"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fileUpload" class="form-label">Télécharger des fichiers</label>
                                            <input type="file" class="form-control" id="fileUpload" name="files[]"
                                                multiple>
                                        </div>
                                    </form>
                                </div>
                                <div class="px-3 pb-3">
                                    <button type="button" class="btn btn-primary" onclick="submitForm()"><i
                                            class="mdi mdi-send me-1"></i> Envoyer le message</button>
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin content -->
        @endsection
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-J5KMDQVXSHiDwPvi2I1BwkK2VwJpg+a6C7QqGhz2CY6wL9c51hQJ+qJqNaB6ZVPj" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLku6zCxCDVw/0fOV+58bsCp+O2zC2tFBS3BqUGhX2hLeW7tjD" crossorigin="anonymous">
    </script>


</body>

</html>
