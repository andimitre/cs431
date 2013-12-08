<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->

    <link rel="stylesheet" type="text/css" href="/assets/Flat-UI-master/css/flat-ui.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/cssdashboard.css">

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <ul class="tabs">
            <li>
                <a href="#wall" class="active">Wall</a>
            </li>
            <li>
                <a href="#friends">Friends</a>
            </li>
            <li>
                <a href="#photos">Photos</a>
            </li>
            <li>
                <a href="#events">Events</a>
            </li>
        </ul>

        <div id="wall" class="form-action show">
            <div class="six">
                <h1><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h1>
                <img src="http://lorempixel.com/200/200/people" alt="photos">
            </div>
            <p></p>
            <div class="six">
                <?php if($user['hometown_city']): ?>
                    <h2>Hometown: <?php echo $user['hometown_city'] . ', ' . $user['hometown_state']; ?></h2>
                <?php endif; ?>
                <?php if($user['current_city']): ?>
                    <h2>Current: <?php echo $user['current_city'] . ', ' . $user['current_state']; ?></h2>
                <?php endif; ?>

            <div>
                <p>Wall Posts</p>
                <form action="/index.php/welcome/login" method="POST">
                    <ul>
                        <input type="text" placeholder="How is <?php echo $user['first_name'];?> feeling?" name="username"/>
                        <input type="submit" value="Update Status" class="button" />
                    </ul>
                </form>
                <p></p>
                <p></p>
                <form action="" method="POST">
                    <ul>
                        <?php foreach($messages as $message): ?>
                            <li><?php echo $message['text'] . ' ' . $message['created_time'] ?></li>
                        <?php endforeach;?>                        
                    </ul>
                </form>

            </div>

            <!--/#login.form-action-->
            <div id="friends" class="form-action hide">
                <h4>Hello</h4>
                <p>
                    Here's all your friends
                    <?php $username ?>
                </p>
                <form action="/register" method="POST">
                    <ul>
                        <li>
                            <input type="text" placeholder="Username" />
                        </li>
                        <li>
                            <input type="password" placeholder="Password" />
                        </li>
                        <li>
                            <input type="submit" value="Sign Up" class="button" />
                        </li>
                    </ul>
                </form>
            </div>
            <!--/#register.form-action-->
            <div id="photos" class="form-action hide">
                <h4></h4>
                <p>
                    Here's all your photos
                    <?php $username ?>
                </p>
                <form action="/register" method="POST">
                    <ul>
                        <li>
                            <input type="text" placeholder="Username" />
                        </li>
                        <li>
                            <input type="password" placeholder="Password" />
                        </li>
                        <li>
                            <input type="submit" value="Sign Up" class="button" />
                        </li>
                    </ul>
                </form>
            </div>
            <!--/#events-->
            <div id="events" class="form-action hide">
                <h4></h4>
                <p>
                    Here's all your photos
                    <?php $username ?>
                </p>
                <form action="/register" method="POST">
                    <ul>
                        <li>
                            <input type="text" placeholder="Username" />
                        </li>
                        <li>
                            <input type="password" placeholder="Password" />
                        </li>
                        <li>
                            <input type="submit" value="Sign Up" class="button" />
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script class="cssdeck" src="/assets/js/cssdashboard.js"></script>
</body>

</html>

