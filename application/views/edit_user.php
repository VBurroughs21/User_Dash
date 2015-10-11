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
        
        <title>Edit User</title>

    </head>
    <body>
        <?php $this->load->view('partials/user_header') ?>
        <div class="col-md-12">
            <h3>
                Edit User #<?= $id ?>
                <a class="btn btn-primary pull-right" 
                href="/users/admin_dash">Return to Dashboad</a>
            </h3>
        </div>
        <div class="col-md-12">
            <form class="col-md-6" method="post" action="/users/edit/<?= $id ?>">
                <fieldset>
                    <legend>Edit User Information</legend>
<?php                   if($this->session->flashdata('edit_error')) {
                            echo $this->session->flashdata('edit_error');
                        }
?>
                    <div class="form-group">
                        <label for="email_edit">Email Address:</label>
                        <input type="email" class="form-control" id="email_edit" name="email_edit" placeholder="<?= $email ?>">
                    </div>
                    <div class="form-group">
                        <label for="first_name_edit">First Name:</label>
                        <input type="text" class="form-control" id="first_name_edit" name="first_name_edit" placeholder="<?= $first_name ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name_edit">Last Name:</label>
                        <input type="text" class="form-control" id="last_name_edit" name="last_name_edit" placeholder="<?= $last_name ?>">
                    </div>
                    <div class="form-group">
                        <label for="user_level_edit">User Level:</label>
                        <select class="form-control" id="user_level_edit" name="user_level_edit">
                            <option>Normal</option>
                            <option>Admin</option>
                        </select>
                    </div>
                    <button class="btn btn-success pull-right">Save</button>
                </fieldset>
            </form>

            <form class="col-md-6" method="post" action="/users/change_pass/<?= $id ?>">
                <fieldset>
                    <legend>Change Password</legend>
<?php                   if($this->session->flashdata('pass_error')) {
                            echo $this->session->flashdata('pass_error');
                        }
?>
                    <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                    </div>
                   <div class="form-group">
                        <label for="con_password">Password Confirmation:</label>
                        <input type="password" class="form-control" id="con_password" name="con_password">
                    </div>
                    <button type="submit" class="btn btn-success pull-right">Update Password</button>
                </fieldset>
            </form>
        </div>
    </body>
</html>