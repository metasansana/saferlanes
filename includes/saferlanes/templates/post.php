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
    </head>
    <body>
        <div id="master">
            <div id="window">
                <img src="img/van.png" alt="truck"/>
                <p>Post a new plate number here.</p>
                <h3>Disclaimer</h3>
                <p>At this point saferlanes is an experiment and as such the information collected may be destroyed without warning or notice. </p>
                <p>The developer of saferlanes does not claim ownership over any of the plates stored in the database and you cannot either. If you would like to remove your registration from the database, please email <a href="/contact">this</a> address and we will be happy to remove it once you can prove you are not trolling. </p>
                <div id="application">
                    <form name="plate_number" method="POST" action="/post">
                        <?= $page->get('msg'); ?>
                        <?= $page->get('plate'); ?>
                        <input id="pnum" class="title" type="text" name="plate" placeholder="Enter a new plate number here.."/>
                        <input hidden  name="csrf_token" value="<?= $page->get('csrf_token');?>"/>
                        <input  type="submit" value="go" name="submit" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
