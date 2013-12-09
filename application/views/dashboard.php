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
            </div>
            <div>
               <!--  <p>Wall Posts</p>
                <form action="/index.php/message/send" method="POST">
                    <ul>
                        <input type="text" placeholder="How is <?php echo $user['first_name'];?> feeling?" name="message_text"/>
                        <input type="hidden" name="sender_id" value="<?php echo $current_user['user_id'] ?>"/>
                        <input type="hidden" name="receiver_id" value="<?php echo $user['user_id'] ?>"/>
                        <input type="submit" value="Update Status" class="button" />
                    </ul>
                </form> -->
                <p></p>
                <p></p>

                <div class="todo">

                    <div class="todo-search">
                        <h1>Wall Posts</h1>  
                            <form action="/index.php/message/send" method="POST">
                                <input class="todo-search-field" placeholder="How is <?php echo $user['first_name'];?> feeling?" name="message_text">
                                    <ul>
                                        <input type="hidden" name="sender_id" value="<?php echo $current_user['user_id'] ?>"/>
                                        <input type="hidden" name="receiver_id" value="<?php echo $user['user_id'] ?>"/>
                                    </ul>
                                    <p></p>
                                <input type="submit" value="Update Status" class="btn btn-block btn-lg btn-inverse"/>
                            </form>
                        
                    </div>    
                    <ul>
                        <?php if($messages): ?>
                            <?php foreach($messages as $message): ?>
                              <li class="">
                                <div class="todo-icon fui-user">
                                </div>
                                <div class="todo-content">
                                    <a href="/index.php/welcome/dashboard/<?php echo $message['sender_id']?>"><h4 class="todo-name"><?php echo $message['first_name'] . ' ' . $message['last_name'] ?></h4></a>
                                    <strong><h2 class="todo-name"><?php echo $message['text'] . ' ' . $message['created_time'] ?></h2></strong>
                                </div>
                              </li>
                            <?php endforeach;?>    
                        <?php endif; ?>  
                    </ul>
                    </div>
                </div>
            </div>
        </div>
            <!--/#login.form-action-->
            <div id="friends" class="form-action hide">
            <h1><?php echo $user['first_name'];?>'s Friends</h1>    
                <div class="todo">        
                    <ul>
                        <?php foreach ($friends as $friend): ?>
                        <?php $friend_id = $friend['user_id']; ?>
                            <a href="/index.php/welcome/dashboard/<?php echo $friend_id ?>"><li><h1><?php echo $friend['first_name'] . ' ' . $friend['last_name']; ?></h1></li></a>
                        <?php endforeach; ?>
                    </ul>     
                </div>          
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

