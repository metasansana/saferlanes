<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/screenforce.css" type="text/css" media="screen, projection"/>
        <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen, projection"/>
        <!--[if IE]>
       <link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection">
<![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Found <?= $page['plate']; ?>!</title>
    </head>
    <body>
        <div id="master">
            <div id="window">
                <img src="img/van.png" alt="truck"/>
                <div id="breakdown" class="<?= $page['image']; ?>">
                    <h1><?= $page['plate']; ?></h1>
                    <ul class="list">
                        <li>
                            <p>First entered: <?= $page['timestamp']; ?></p>
                        </li><li>
                            <p>Likes: <?= $page['likes']; ?> <a href="<?= $page['plus_link']; ?>">
                                    <img src="img/vote.png" alt="like this driver" title="click to like this driver!"/> </a></p>
                        </li>
                        <li>
                            <p>Fails: <?= $page['fails']; ?> <a href="<?= $page['minus_link']; ?>">
                                    <img src="img/smote.png" alt="fail this driver" title="click to fail this driver!"/> </a></p>
                        </li>
                    </ul>
                    <p>Link to this record: http://sl.trinistorm.org/<?= $page['plate']; ?></p>
                </div>
            </div>
        </div>
    </body>
</html>