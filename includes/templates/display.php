<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/screenforce.css" type="text/css" media="screen, projection"/>
        <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen, projection"/>
        <!--[if IE]>
       <link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection">
<![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Found <?= $content['plate']; ?>!</title>
    </head>
    <body>
        <div id="master">
            <?= $content['system']?>
            <div id="window">
                <img src="img/van.png" alt="truck"/>
                <div id="breakdown" class="<?= $content['image']; ?>">
                    <h1><?= $content['plate']; ?></h1>
                    <ul class="list">
                        <li>
                            <p>First entered: <?= $content['timestamp']; ?></p>
                        </li><li>
                            <p>Likes: <?= $content['likes']; ?> <a href="<?= $content['plus_link']; ?>">
                                    <img src="img/vote.png" alt="like this driver" title="click to like this driver!"/> </a></p>
                        </li>
                        <li>
                            <p>Fails: <?= $content['fails']; ?> <a href="<?= $content['minus_link']; ?>">
                                    <img src="img/smote.png" alt="fail this driver" title="click to fail this driver!"/> </a></p>
                        </li>
                    </ul>
                    <p>Link to this record: http://saferlanes.com/<?= $content['plate']; ?></p>
                </div>
            </div>
        </div>
    </body>
</html>