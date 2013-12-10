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
            <a href="/index.php/welcome/dashboard/<?php echo $current_user['user_id'] ?>"><li>Home</li></a><li>
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
            <a href="/index.php/welcome/logout"><li>Logout</li></a><li>
            
        </ul>

        <div id="wall" class="form-action show">
            <div class="six columns">
                <h1><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h1>
                <img class="round" src="http://lorempixel.com/200/200/people" alt="photos">
                <p></p>
                <form action="/index.php/welcome/friend" method="POST">
                    <input type="hidden" value="<?php echo $user['user_id']?>" name="friend_id">
                    <input type="hidden" value="<?php echo $current_user['user_id']?>" name="user_id">

                    
                </form>
            </div>
            <p></p>
            <div class="six columns move">
                <form>
                    <?php if($user['hometown_city']): ?>
                        <h2>Hometown: <?php echo $user['hometown_city'] . ', ' . $user['hometown_state']; ?></h2>
                    <?php endif; ?>
                    <?php if($user['current_city']): ?>
                        <h2>Current: <?php echo $user['current_city'] . ', ' . $user['current_state']; ?></h2>
                    <?php endif; ?>
                    <p></p>
                    

                    <button type="submit" class="btn btn-block btn-lg btn-inverse ">Add Friend</button>
                </form>
            </div>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
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
                                    <a href="/index.php/welcome/dashboard/<?php echo $message['sender_id']?>"><h1><?php echo $message['first_name'] . ' ' . $message['last_name'] ?></h1></a>
                                    <strong><h2 class="todo-name"><?php echo $message['text']?></h2></strong>
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
            <!--/#photos.form-action-->
            <div id="photos" class="form-action hide">
                <h1><?php echo $user['first_name'];?>'s Photos</h1>    
                <div class="todo">        
                    <ul>
                        <?php if($photos): ?>
                            <?php foreach ($photos as $photo): ?>
                                <ul>
                                    <li><img src="<?php echo $photo['url']; ?>"></img> </li>
                                    <h1><?php echo $photo['caption'] ?></h1>

                                </ul>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>     
                </div> 
                
            </div>
            <!--/#events-->
            <div id="events" class="form-action hide">
                <h1><?php echo $user['first_name'];?>'s Events</h1>    
                <div class="todo">        
                    <ul>

                        <ul>
                            <li>
                                <h1>Njit Holiday Party</h1>
                                <h3 class="event_text">Status: Attending</h3>
                                <h3 class="event_text">Date: 12/20/2013 at 5:00pm</h3>
                                <h3 class="event_text">Location: 500 Park Ave. New York, NY 01064</h3>
                            </li>
                            <li>
                                <h1>Andi's Birthday party</h1>
                                <h3 class="event_text">Status: Not Attending</h3>
                                <h3 class="event_text">Date: 1/12/2014 at 3:00pm</h3>
                                <h3 class="event_text">Location: Chuckie Cheese, 241 Central Ave. Nutley NJ 07011</h3>
                            </li>
                        </ul>
       
                    </ul>     
                </div> 

            </div>
        </div>
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script class="cssdeck" src="/assets/js/cssdashboard.js"></script>
</body>

</html>

