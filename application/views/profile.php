<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?= base_url('/assets/style.css') ?>" />


        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>User Profile</title>

    </head>
    <body>
        
        <?php $this->load->view('partials/user_header'); ?>
        <div class="container">
            <div class="col-md-8">
                <h3>
                    <?= $first_name. " ". $last_name?>
    <?php           if ($this->session->userdata('user_level') === 'Admin') {
                        echo "<a href='/users/edit_profile/". $id. "' class='btn btn-primary pull-right'> 
                                Edit Profile
                            </a>";
                    } else {
                       if ($id === $this->session->userdata('current_id')) {
                        echo "<a href='/users/edit_profile/". $id. "' class='btn btn-primary pull-right'> 
                                Edit Profile
                            </a>";
                        } 
                    }

                    

    ?>                
                </h3>
                <ul class="list-group">
                    <li class="list-group-item row">
                        <p class="col-md-3">Registered at:</p>
                        <p class="col-md-5"><?= $time ?></p>
                    </li>
                    <li class="list-group-item row">
                        <p class="col-md-3">User ID:</p>
                        <p class="col-md-5"><?= $id ?></p>
                    </li>
                    <li class="list-group-item row">
                        <p class="col-md-3">Email address:</p>
                        <p class="col-md-5"><?= $email ?></p>
                    </li>
                    <li class="list-group-item row">
                        <p class="col-md-3">Description</p>
                        <p class="col-md-5"><?= $description ?></p>
                    </li>
                </ul>
            </div>

            <div class="col-md-11">
                <h4>Leave a message for <?= $first_name. " ". $last_name?></h4>
                <form method="post" action="/messages/create_message/<?= $id ?>">
                    <textarea class="form-control" rows="3" name="message"></textarea>
                    <button type="submit" class="btn btn-success pull-right">Post</button>
                </form>
            </div>
            
            <div class="col-md-11">
    <?php       foreach ($this->session->userdata('message') as $message) { 
    ?>               <div class="col-md-11 pull-right">
                        <a href="/users/profile/<?= $message['author_id']?>">
                            <?= $message['first_name']. " ". $message['last_name']?>
                        </a>
                        Wrote:
                        <p class="pull-right"><?= $message['time']?></p> 
                        <div>
                            <p class="message_box col-md-12"><?= $message['content']; ?> </p>
                        </div>
                    </div>
    <?php           foreach ($this->session->userdata('comment') as $comment) {
                        if ($message['id'] === $comment['message_id']) { 
    ?>
                            <div class="col-md-10 pull-right"> 
                                <a href="/users/profile/<?= $comment['user_id']?>">
                                    <?= $comment['first_name']. " ". $comment['last_name']?> 
                                </a>
                                Wrote:
                                <p class="pull-right"><?= $comment['time']?></p> 
                                <div class="comment_box col-md-12 pull-right">
                                    <?= $comment['content'] ?>
                                </div>
                            </div>
                        <?php }        
                     } ?>

                        <form class="col-md-10 pull-right" method="post" action="/comments/create_comment/<?= $id ?>/<?= $message['id'] ?>">
                            <textarea class="form-control" rows="3" name="comment" placeholder="Leave a comment"></textarea>
                            <button type="submit" class="btn btn-success pull-right">Post</button>
                        </form>
                    
         <?php } ?>
            </div>
        </div>
    </body>
</html>














