<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url('')?>">Test App</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li>
                    <a href="/users/
<?php                   if ($this->session->userdata('user_level') === 'Admin') {
                            echo "admin_dash";
                        } else {
                            echo "user_dash";
                        }
?> 
                    ">Dashboard</a>
                </li>
                <li>
                    <a href="/users/profile/<?= $this->session->userdata('current_id')?>"> 
                        Profile</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?= base_url('users/logoff')?>">Log Off</a>
                </li> 
            </ul>
        </div>
    </div>
</nav>