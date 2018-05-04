<?php
    require_once "visao/cabec.php";
?>
<script>


    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState(x) {
        FB.login(function(response) {
            if (response.authResponse) {
                // usuario aceitou o app
                testAPI();
            }
        }, {
            scope: 'email, publish_actions,user_photos'
        });

    }

    window.fbAsyncInit = function()
    {
        FB.init({
            appId      : '268114497045176',
            cookie     : true,  // enable cookies to allow the server to access
                                // the session
            xfbml      : true,  // parse social plugins on this page
            version    : 'v2.2' // use version 2.2
        });

        // Now that we've initialized the JavaScript SDK, we call
        // FB.getLoginStatus().  This function gets the state of the
        // person visiting this page and can return one of three states to
        // the callback you provide.  They can be:
        //
        // 1. Logged into your app ('connected')
        // 2. Logged into Facebook, but not your app ('not_authorized')
        // 3. Not logged into Facebook and can't tell if they are logged into
        //    your app or not.
        //
        // These three cases are handled in the callback function.

        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });

    };
    // Load the SDK asynchronously
    (function(d, s, id)
    {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }
    (document, 'script', 'facebook-jssdk'));

    // Here we run a very simple test of the Graph API after login is
    // successful.  See statusChangeCallback() for when this call is made.
    function testAPI() {

        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', {fields: 'email, gender, name, id'}, function(response) {
            console.log('Successful login for: ' + response.name);
            document.getElementById('email').innerHTML = 'e-Mail =  ' +
                response.email;
            document.getElementById('sexo').innerHTML = 'Sexo = ' +
                response.gender;
            document.getElementById('id').innerHTML = 'ID = ' +
                response.id;
            document.getElementById('foto').innerHTML = '<img src="http://graph.facebook.com/' + response.id + '/picture" />';
            document.getElementById('title').style.display = "none";
            document.getElementById('btn').style.display = "none";
            document.getElementById('sair').style.display = "block";
        });
    }
    function logout()
    {
        FB.logout(function(response) {
            // Person is now logged out
        });
        document.getElementById('email').innerHTML = "";
        document.getElementById('sexo').innerHTML = "";
        document.getElementById('id').innerHTML = "";
        document.getElementById('foto').innerHTML ="";
        document.getElementById('title').style.display = "block";
        document.getElementById('btn').style.display = "block";
        document.getElementById('sair').style.display = "none";
    }
</script>
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
        <link rel="stylesheet" href="css/login.css" />
    </head>
    <body>
        <!--hero section-->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 col-sm-12 col-xs-12">
                        <div class="card border-none">
                            <div class="card-block">
                                <p class="mt-4 text-white lead text-center">
                                    Faça o login para realizar seus pedidos
                                </p>
                                <div class="mt-4">
                                    <form class="text-center" method="POST" action="#" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="senha" placeholder="Senha">
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Entrar"/>
                                    </form>
                                    <div class="clearfix"></div>
                                    <p class="content-divider center mt-4"><span>OU</span></p>
                                </div>
                                <p class="text-center">
                                    Ainda não possui uma conta?  <a id="cadastrar" href="index.php?controle=loginControle&metodo=registrar">Cadastre-se agora!</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12 mt-5 footer">
                        <p class="text-white small text-center">
                            &copy; 2017 .<a href="https://jg-front.github.io/">Jonathan Gomes</a>.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
