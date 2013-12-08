<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Flat Login</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->
  <link rel="stylesheet" type="text/css" href="/assets/Flat-UI-master/css/flat-ui.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/cssdeck.css">

    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

    <div class="container">
        <div class="flat-form">
            <ul class="tabs">
                <li>
                    <a href="#login" class="active">Login</a>
                </li>
                <li>
                    <a href="#register">Register</a>
                </li>
            </ul>
            <div id="login" class="form-action show">
                <h1>Login on webapp</h1>
                <p>
                    Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                    Maecenas sed diam eget risus varius bladit sit amet non
                </p>
                <form action="/index.php/welcome/login" method="POST">
                    <ul>
                        <li>
                            <input type="text" placeholder="Username" name="username"/>
                        </li>
                        <li>
                            <input type="password" placeholder="Password" name="password"/>
                        </li>
                        <li>
                            <input type="submit" value="Login" class="button" />
                        </li>
                    </ul>
                </form>
            </div>
            <!--/#login.form-action-->
            <div id="register" class="form-action hide">
                <h1>Register</h1>
                <p>
                    You should totally sign up for our super awesome service.
                    It's what all the cool kids are doing nowadays.
                </p>
                <form action="/index.php/welcome/register" method="POST">
                    <ul>                       
                        <li><input type="text" name="username" placeholder="Username" /> </li>                     
                        <li><input type="text" name="firstname" placeholder="First Name" />  </li>                     
                        <li><input type="text" name="lastname" placeholder="Last Name" />    </li>                   
                        <li><input type="text" name="email" placeholder="Email"></li>
                        <li><input name="password" type="password" placeholder="Password" />                 </li>       
                        <li><input type="submit" value="Sign Up" class="button" /></li>
                        
                    </ul>
                </form>
            </div>
            <!--/#register.form-action-->
        </div>
    </div>
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script class="cssdeck" src="/assets/js/cssdeck.js"></script>
</body>
</html>


