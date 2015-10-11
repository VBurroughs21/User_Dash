<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Home Page</title>

    </head>
    <body>
        <?php $this->load->view('partials/header') ?>
        <div class="col-md-12">
            <div class="jumbotron col-md-11">
                <h1>User Dashboard</h1>
                <p>A Coding Dojo Assignment using CodeIgniter and Bootstrap.</p>
                <p><a class="btn btn-primary btn-lg" href="<?= base_url('users/register')?>" role="button">Check it Out</a></p>
            </div>
            <div class="row col-md-11">
                <div class="col-md-4">
                    <h3>User Profiles</h3>
                    <p>Profiles display users' information and received messages.</p>
                
                </div>
                <div class="col-md-4">
                    <h3>Leave Messages</h3>
                    <p>Users can leave messages for other users and comment on existing messages.</p>
                </div>
                <div class="col-md-4">
                    <h3>Edit User Information</h3>
                    <p>Assigned administrators have the capability to add, remove, and edit users. </p>
                </div>
            </div>
        </div>
    </body>
</html>