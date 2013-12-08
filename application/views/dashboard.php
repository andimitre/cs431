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

    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

    <div class="container">
        <div class="">
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
                <h4>Welcome "<?php $username ?>"</h4>
                <img src="smiley.gif" alt="Smiley face" height="42" width="42">
                <p>
                    Wall Posts:
                </p>
                <form action="/index.php/welcome/login" method="POST">
                    <ul>
                        
                            <input type="text" placeholder="How is "<?php $username ?>" feeling?" name="username"/>
                            <input type="submit" value="Update Status" class="button" />
                        
                    </ul>
                </form>
            </div>
            
            <!--/#login.form-action-->
            <div id="friends" class="form-action hide">
                <h4></h4>
                <p>
                    Here's all your friends "<?php $username ?>"
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
        </div>
    </div>
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
</html>


