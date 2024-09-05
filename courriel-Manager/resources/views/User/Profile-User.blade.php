<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de Profil | Mon Application</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    <style>
        .profile-header {
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .profile-header h2 {
            margin-bottom: 10px;
        }

        .profile-header p {
            margin-bottom: 5px;
        }

        .profile-header .btn {
            margin-right: 10px;
        }

        .card-body {
            padding: 20px;
        }
    </style>
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false,"leftSidebarCondensed":false,"leftSidebarScrollable":false,"darkMode":false}'>

    <div class="wrapper">
    @extends('layouts.partials.User.masterUser')

        @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- Profile Header -->
                    <div class="profile-header text-center mb-4">
                        <h2>{{ Auth::user()->name }}</h2>
                        <p><i class="fas fa-envelope"></i> {{ Auth::user()->email }}</p>
                    
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editAboutMeModal">Edit About Me</button>
                    </div>

           
                    <div class="card mb-4">
                        <div class="card-header">
                            About Me
                        </div>
                        <div class="card-body" id="aboutMe">
                            <p>{{ Auth::user()->Aboutme }}</p>
                        </div>
                    </div>

       
                    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="editName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="editName" value="Jean Dupont">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editEmail" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="editEmail" value="jean.dupont@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editPhone" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="editPhone" value="+33 1 23 45 67 89">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editLocation" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="editLocation" value="123 Rue de Paris, 75001 Paris, France">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit About Me Modal -->
                    <div class="modal fade" id="editAboutMeModal" tabindex="-1" aria-labelledby="editAboutMeModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editAboutMeModalLabel">Edit About Me</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="updateAboutMeForm" method="POST" action="{{ route('updateAboutMeUser', Auth::user()->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="aboutMeText" class="form-label">About Me</label>
                                            <textarea class="form-control" id="aboutMeText" name="Aboutme" rows="4">{{ Auth::user()->Aboutme }}</textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveAboutMeChanges">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/vendor/dataTables.buttons.min.js"></script>
    <script src="assets/js/vendor/buttons.bootstrap5.min.js"></script>
    <script src="assets/js/vendor/buttons.html5.min.js"></script>
    <script src="assets/js/vendor/buttons.flash.min.js"></script>
    <script src="assets/js/vendor/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#saveAboutMeChanges').click(function() {
                $('#updateAboutMeForm').submit();
            });
        });
    </script>
</body>

</html>
