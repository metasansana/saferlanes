<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/screenforce.css" type="text/css" media="screen, projection"/>
        <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen, projection"/>
        <!--[if IE]>
       <link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection">
<![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Keep the database fat!</title>
    </head>.
    <body>
        <div id="master">
            <div id="window">
                <img src="img/van.png" alt="truck"/>
                <p>Thank you for taking part, please be aware that Saferlanes is just an experiment at this point and should not be taken too seriously (maybe).</p>
                    <p>None the less please exercise care on the nation's roadways and obey our traffic laws.</p>
                <div id="application">
                    <form name="plate_number" method="POST" action="/post">
                        <?= $content['msg']; ?>
                        <?= $content['plate']; ?>
                        <input id="pnum" class="title" type="text" name="plate" placeholder="Enter a new plate number here.."/>
                        <input hidden  name="csrf_token" value="<?= $content['csrf_token'];?>"/>
                        <input  type="submit" value="go" name="submit" />
                    </form>
                </div>
                <br/>
                <span>Back to <a href="/">search</a>.</span>
            </div>
        </div>
    </body>
</html>
