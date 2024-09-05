<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'projet-stage';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$totalCourriersReçus = $conn->query('SELECT COUNT(*) AS count FROM courriels')->fetch_assoc()['count'];
$totalCourriersImportants = $conn->query("SELECT COUNT(*) AS count FROM courriels WHERE importance = 'Tres Important'")->fetch_assoc()['count'];
$totalCourriersNonLus = $conn->query("SELECT COUNT(*) AS count FROM courriels WHERE `Urgence` = 'Tres Urgent'")->fetch_assoc()['count'];
$totalConversationsEnCours = $conn->query("SELECT COUNT(*) AS count FROM courriels WHERE Categorie = 'Autres'")->fetch_assoc()['count'];


$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de bord Analytics | Hyper - Tableau de bord d'administration Bootstrap 5 réactif</title>

    <!-- Bootstrap CSS -->
    <link href="assets/css/vendor/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css" rel="stylesheet">
</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false,"leftSidebarCondensed":false,"leftSidebarScrollable":false,"darkMode":false,"showRightSidebarOnStart":true}'>
    <!-- Début de la page -->
    <div class="wrapper">

        @extends('layouts.partials.User.masterUser')

        @section('content')
            <div class="row">
                <div class="col-md-12">
                    <h3>Tableau de bord</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-info text-white">
                        <h3 class="text-center"><span><?php echo $totalCourriersReçus; ?></span></h3>
                        <p class="text-center">Courriers reçus</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-white">
                        <h3 class="text-center"><span><?php echo $totalCourriersImportants; ?></span></h3>
                        <p class="text-center">Courriers importants</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-danger text-white">
                        <h3 class="text-center"><span><?php echo $totalCourriersNonLus; ?></span></h3>
                        <p class="text-center">Courriers Tres Urgent</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <h3 class="text-center"><span><?php echo $totalConversationsEnCours; ?></span></h3>
                        <p class="text-center">Conversations Categorie Autre</p>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0">Calendrier</h5>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#compose-modal">Ajouter un événement</button>
                                            </div>
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ajouter un nouvel événement MODAL -->
                            <div id="compose-modal" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="compose-header-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-primary">
                                            <h4 class="modal-title" id="compose-header-modalLabel">Nouvel événement</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Fermer"></button>
                                        </div>
                                        <div class="p-1">
                                            <div class="modal-body px-3 pt-3 pb-0">
                                                <form id="event-form">
                                                    <div class="mb-2">
                                                        <label for="event-title" class="form-label">Titre de
                                                            l'événement</label>
                                                        <input type="text" id="event-title" class="form-control"
                                                            placeholder="Titre de l'événement" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="event-start" class="form-label">Date de début</label>
                                                        <input type="date" id="event-start" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="event-end" class="form-label">Date de fin</label>
                                                        <input type="date" id="event-end" class="form-control" required>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="px-3 pb-3">
                                                <button type="button" class="btn btn-primary" id="save-event"
                                                    data-bs-dismiss="modal"><i class="mdi mdi-send me-1"></i> Créer
                                                    l'événement</button>
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Supprimer un événement MODAL -->
                            <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="delete-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="delete-modalLabel">Supprimer l'événement</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Fermer"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Êtes-vous sûr de vouloir supprimer cet événement ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                id="confirm-delete">Supprimer</button>
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection

        </div>

        <!-- JavaScript -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js"></script>

        <!-- Initialiser FullCalendar -->
        <script>
            let events = JSON.parse(localStorage.getItem('events')) || [];
            let currentEvent;

            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: events,
                    eventClick: function(info) {
                        currentEvent = info.event;
                        var modal = new bootstrap.Modal(document.getElementById('delete-modal'));
                        modal.show();
                    }
                });

                calendar.render();

                document.getElementById('save-event').addEventListener('click', function() {
                    var title = document.getElementById('event-title').value;
                    var start = document.getElementById('event-start').value;
                    var end = document.getElementById('event-end').value;

                    if (title && start) {
                        const newEvent = {
                            title: title,
                            start: start,
                            end: end,
                        };

                        calendar.addEvent(newEvent);
                        events.push(newEvent);
                        localStorage.setItem('events', JSON.stringify(events));

                        document.getElementById('event-form').reset();
                        var modal = bootstrap.Modal.getInstance(document.getElementById('compose-modal'));
                        modal.hide();
                    }
                });

                document.getElementById('confirm-delete').addEventListener('click', function() {
                    if (currentEvent) {
                        currentEvent.remove();
                        events = events.filter(event => event.title !== currentEvent.title);
                        localStorage.setItem('events', JSON.stringify(events));
                    }

                    var modal = bootstrap.Modal.getInstance(document.getElementById('delete-modal'));
                    modal.hide();
                });
            });
        </script>

</body>

</html>
