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
        
        <title>Admin Dashboard</title>

    </head>
    <body>
        <?php $this->load->view('partials/user_header') ?>
        <div class="col-md-9">
            <h3>Manage Users
                <a class="btn btn-primary pull-right" href="<?= base_url('users/new_user')?>">Add New</a>
            </h3>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>User Level</th>
                    <th>Actions</th>
                </thead>
                <tbody>
<?                  foreach ($this->session->userdata('all_users') as $value) {
?>                     <tr>
                            <td>
                                <a class="btn btn-danger btn-xs" href="/users/remove/<?= $value['id'] ?>">X</a> 
                                <?= $value['id'] ?> 
                            </td>
                            <td> <?= $value['first_name']. " ". $value['last_name'] ?> </td>
                            <td> <?= $value['email'] ?> </td>
                            <td> <?= $value['time'] ?> </td>
                            <td> <?= $value['user_level'] ?> </td>
                            <td> 
                                <a class="btn btn-warning" href="/users/edit_user/<?= $value['id'] ?>">Edit</a> 
                                <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> 
                                <a href="/users/profile/<?= $value['id'] ?>" class="btn btn-success">Go</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

















