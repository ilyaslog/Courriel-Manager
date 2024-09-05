<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Analytics Dashboard | Hyper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme for CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/vendor/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" id="light-style">
    <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" id="dark-style">

    <!-- Custom Styles -->

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark"}'>
    <div class="wrapper">
        @extends('layouts.partials.User.masterUser')
        @section('content')
            <div class="content">
                <h1>Hello {{ Auth::user()->name }}, bienvenue dans vos messages envoyés !</h1>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="page-aside-left">
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#compose-modal" disabled> messages envoyés </button>
                                        </div>
                                        <div class="email-menu-list mt-3">
                                            <a href="{{ route('CourrielsUser') }}" href="javascript:void(0);">
                                                <i class="dripicons-inbox me-2"></i>Boite de reception
                                                <span class="badge badge-danger-lighten float-end ms-2"></span>
                                            </a>

                                            <a href="{{ route('SentMails') }}" class="text-danger fw-bold">
                                                <i class="dripicons-exit me-2"></i>Messages Envoyer
                                            </a>
                                        </div>

                                    </div>

                                    <div class="page-aside-right">
                                        <div class="mt-3">
                                            <ul class="email-list">
                                                @php
                                                    $sortedCourriels = $courriels->sortByDesc('created_at');
                                                @endphp
                                                @foreach ($sortedCourriels as $courriel)
                                                    @if ($courriel->expediteur_id == Auth::user()->id)
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
                                                                <a href="{{ route('courrielSent.show', $courriel->id) }}"
                                                                    class="email-title">{{ $courriel->destinataires->name }}</a>
                                                            </div>
                                                            <div class="email-content">
                                                                <a href="{{ route('courrielSent.show', $courriel->id) }}"
                                                                    class="email-subject">{{ $courriel->sujet }}</a>
                                                                <div class="email-date">
                                                                    {{ $courriel->created_at->format('d-m-Y') }}</div>

                                                            </div>
                                                            <div class="email-action-icons">
                                                                <ul class="list-inline">

                                                                </ul>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>

                                        </div>

                                        <div class="row">
                                            <div class="col-7 mt-1">Showing 1 - 20 of 289</div>
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

                <!-- Compose Modal -->
                <div id="compose-modal" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="compose-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-primary">
                                <h4 class="modal-title" id="compose-header-modalLabel">New Message</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="p-1">
                                <div class="modal-body px-3 pt-3 pb-0">
                                    <form id="messageForm">
                                        <div class="mb-2">
                                            <label for="msgto" class="form-label">A</label>
                                            <input type="text" id="msgto" class="form-control"
                                                placeholder="Example@email.com">
                                        </div>
                                        <div class="mb-2">
                                            <label for="mailsubject" class="form-label">Subject</label>
                                            <input type="text" id="mailsubject" class="form-control"
                                                placeholder="Votre Sujet">
                                        </div>
                                        <div class="write-mdg-box mb-3">
                                            <label class="form-label">Message</label>
                                            <textarea id="simplemde1" class="form-control" rows="4"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fileUpload" class="form-label">Upload Files</label>
                                            <input type="file" class="form-control" id="fileUpload" name="files">
                                        </div>
                                    </form>
                                </div>
                                <div class="px-3 pb-3">
                                    <button type="button" class="btn btn-primary" onclick="submitForm()"><i
                                            class="mdi mdi-send me-1"></i> Envoyer un Message</button>
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function submitForm() {
                        // This function can be used to handle form submission
                        // For now, let's just close the modal
                        $('#compose-modal').modal('hide');
                    }
                </script>

            </div>

        </div>
    @endsection
    </div>

    <!-- JavaScript -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>

</html>
