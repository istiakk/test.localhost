<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html dir='ltr' xmlns='http://www.w3.org/1999/xhtml'>
    <head>
        <title><?php echo $cfg['site']['title']; ?></title>
        <meta http-equiv="Content-Type" content="Type=text/html; charset=utf-8" />
        <link href='/test.localhost/public/themes/main.css' rel='stylesheet' type='text/css'/>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script>
            var isMobile = function () {
                return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
            };

            $(document).ready(function () {
                if (!isMobile()) {
                    $('#main').css('display', 'none');
                    $('#main').fadeIn(1000);
                }
            });
        </script>
        <?php $this->renderSection('head'); ?>
    </head>
    <body>
        <!-- Header -->
        <div id="header">
            <div class="content">
                <div style="width:550px;">
                    <h1 style="font-size:30px;"><?php echo $cfg['site']['name']; ?></h1>
                </div>
                <div class="menu">
                    <?php include(MyHelpers::UrlContent('~/views/shared/_menuPart.php')); ?>
                </div>
            </div>
        </div>	
        <!-- Main -->
        <div id="main">
            <?php $this->renderBody(); ?>
        </div>
        <!-- Footer -->
        <div id="footer">
            <div class="content">
                <div class="col">
                    <h2>Email</h2>
                    <?php include(MyHelpers::UrlContent('~/views/shared/_email.php')); ?>
                </div>
                <div class="col">
                    <h2>Mobile</h2>
                    <div class="contact">
                        <?php include(MyHelpers::UrlContent('~/views/shared/_phone.php')); ?>
                    </div>
                </div>
            </div>
            <div class="content">
                <div id='copyright'>
                    <p>
                        <span>
                            Copyright &#169; 
                            <script type='text/javascript'>
                                var creditsyear = new Date();
                                document.write(creditsyear.getFullYear());
                            </script>
                            <a href='<?php echo $cfg['site']['address']; ?>'>
<?php echo $cfg['site']['owner']; ?>
                            </a>
                        </span>
                    </p>
                </div>			
            </div>
        </div>

    </body>
</html>