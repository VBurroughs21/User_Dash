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
        
        <title>User Dashboard</title>

    </head>
    <body>
        <?php $this->load->view('partials/user_header') ?>

        <div class="col-md-11">
            <h3>All Users </h3>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joined</th>
                    <th>User Level</th>
                </thead>
                <tbody>
<?                  foreach ($this->session->userdata('all_users') as $value) {
?>                      <a href="users/profile/<?= $value['id'] ?>"><tr>
                            <td> <?= $value['id'] ?> </td>
                            <td> <?= $value['first_name']. " ". $value['last_name'] ?> </td>
                            <td> <?= $value['email'] ?> </td>
                            <td> <?= $value['time'] ?> </td>
                            <td> <?= $value['user_level'] ?> 
                                <a href="/users/profile/<?= $value['id'] ?>" class="btn btn-success pull-right">Go</a>
                            </td>
                        </tr></a>
                    <?php } ?>
                
                </tbody>
            </table>
        </div>
    </body>
</html>

















