<?php
require_once("functionality/php/session.php");
require_once("../database/repository/mysql/queries/UserQuery.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
</head>

<body>
    <!-- Success modal -->
    <div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccess-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modalSuccess-content">
                <div class="modal-header" id="modalSuccess-header">
                    <h5 class="modal-title" id="modalSuccess-label">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalSuccess-body">
                    ...
                </div>
            </div>
        </div>
    </div>
    <!-- Error modal -->
    <div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="modalError-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modalError-content">
                <div class="modal-header" id="modalError-header">
                    <h5 class="modal-title" id="modalError-label">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalError-body">
                    ...
                </div>
            </div>
        </div>
    </div>
    <!-- Change password modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModal-label">Insert new password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" role="form" class="p-2" id="changePassword-frm">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="New password" <?php echo UserQuery::$constraints["password"]["required"] ?> minlength=<?php echo UserQuery::$constraints["password"]["minLength"] ?> maxlength=<?php echo UserQuery::$constraints["password"]["maxLength"] ?>>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="submit" name="changePassword-btn" id="changePassword-btn" value="Save changes" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- =========================================================================================== -->
    <nav class="navbar navbar-dark bg-dark justify-content-between" id="navHeader">
        <a class="navbar-brand" href="#" id="profileLink">Profile</a>
        <form class="form-inline">
            <input id="searchMovies-txt" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button id="searchMovies-btn" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <!-- ================================================================================================================= -->
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center"><img src="../database/resources/images/icons/wolf-icon.png" alt="Profile.jpg" width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                <div class="media-body">
                    <h5 class="m-0"><?= $dbUser->get_firstName(); ?></h4>
                        <p class="font-weight-normal text-muted mb-0"><?= $dbUser->get_email(); ?></p>
                </div>
            </div>
        </div>
        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Menu</p>
        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link text-dark bg-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                    </svg>Settings</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#" class="nav-link text-dark bg-light" id="changePasswordLink"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                            </svg>Change password</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-dark bg-light" id="deleteLink"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>Delete account</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="functionality/php/logout.php" class="nav-link text-dark bg-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg>Logout</a>
            </li>
        </ul>
    </div>

    <div class="page-content p-5" id="content">
        <div id="contentDiv">
            <!-- This is where the content should reside -->

            


        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="functionality/js/subMenu.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('#searchMovies-txt').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: '../logic/handleClient.php',
                        method: 'get',
                        data: "movieTitle=" + $("#searchMovies-txt").val() + "&request=getMovieSuggestionsByTitle",
                        dataType: "json",
                        success: function(data) {
                            var aData = $.map(data, function(value, key) {
                                return {
                                    label: value.title
                                };
                            });
                            response(aData);
                        }
                    })
                },
                minLength: 1
            });

            $("#searchMovies-btn").click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '../logic/handleClient.php',
                    method: 'get',
                    data: "movieTitle=" + $("#searchMovies-txt").val() + "&request=getMoviesByTitle",
                    dataType: "text",
                    success: function(response) {
                        $("#contentDiv").html(response);
                    },
                    error: function(jqXHR, textStatusString, errorThrownString) {
                        $("#contentDiv").html("Could not find any movies");
                    }
                });

            });

            $("#changePassword-frm").validate();

            $("#changePasswordLink").click(function(e) {
                $("#changePasswordModal").modal('toggle');
            });

            $("#changePassword-btn").click(function(e) {
                if (document.getElementById("changePassword-frm").checkValidity()) {
                    e.preventDefault();
                    $.ajax({
                        url: '../logic/handleClient.php',
                        method: 'post',
                        data: $("#changePassword-frm").serialize() + '&userID=<?php echo $dbUser->get_id(); ?>&request=changeUserPassword',
                        dataType: "text",
                        success: function(response) {
                            if (!response.startsWith("Error")) {
                                handleChangeUserPasswordSuccess(response);
                            } else {
                                handleChangeUserPasswordError(response);
                            }
                        },
                        error: function(jqXHR, textStatusString, errorThrownString) {
                            errorThrownString = "Error: ".errorThrownString;
                            handleChangeUserPasswordError(errorThrownString);
                        }
                    });
                }
            });

            $("#deleteLink").click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '../logic/handleClient.php',
                    method: 'post',
                    data: "userID=<?php echo $dbUser->get_id(); ?>&request=deleteUser",
                    dataType: "text",
                    success: function(response) {
                        if (!response.startsWith("Error")) {
                            handleDeleteUserSuccess(response);
                        } else {
                            handleDeleteUserError(response);
                        }
                    },
                    error: function(jqXHR, textStatusString, errorThrownString) {
                        errorThrownString = "Error: ".errorThrownString;
                        handleDeleteUserError(errorThrownString);
                    }
                });
            });


        });
        // CUSTOM FUNCTIONS

        function place(ele) {
            $("#searchMovies-txt").val(ele.innerHTML);
            $("#livesearch").hide();
        }

        function handleChangeUserPasswordSuccess(success) {
            $("#changePasswordModal").modal('hide');
            $("#modalSuccess-body").html(success);
            $("#modalSuccess").modal('toggle');
        }

        function handleChangeUserPasswordError(error) {
            $("#changePasswordModal").modal('hide');
            $("#modalError-body").html(error.substring(7));
            $("#modalError").modal('toggle');
        }

        function handleDeleteUserSuccess(success) {
            $("#modalSuccess-body").html(success);
            $("#modalSuccess").modal('toggle');
            $('#modalSuccess').on('hidden.bs.modal', function(e) {
                window.location = "functionality/php/logout.php";
            });
        }

        function handleDeleteUserError(error) {
            $("#modalError-body").html(error.substring(7));
            $("#modalError").modal('toggle');
        }
    </script>

</body>

</html>