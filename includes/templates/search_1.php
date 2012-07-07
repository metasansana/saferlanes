<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen, projection"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title><?= $content['title']; ?></title>
    </head>
    <body>
        <div id="master">
            <div id="window">
                <img src="img/van.png" alt="truck"/>
                <h1>Saferlanes</h1>
                <p>Ever wanted to get a general opinion of your driving?</p>
                <p>Saferlanes is a web application that aggregates votes on local drivers based on their licence plate numbers.</p>
                <p>The votes are basically 'likes' or 'fails' in relation to your repuatation on the nation's roadways</p>
                <p>Enter a plate number below to see what has been collected so far.</p>
                <p>Do you want to add a plate number? Use <a href="/post">this</a> link.</p>
                <div id="application">
                    <form name="plate_number" method="POST" action="/">
                        <?= $content['msg']; ?>
                        <?= $content['plate']; ?>
                        <input id="pnum" class="title" type="text" name="plate" placeholder="Driver search"/>
                        <input  type="submit" value="go" name="submit"  />
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
