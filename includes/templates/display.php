                <div id="breakdown" class="<?= @$page['image']; ?>">
                    <h1><?= @$page['plate']; ?></h1>
                    <ul class="list">
                        <li>
                            <p>First entered: <?= @$page['timestamp']; ?></p>
                        </li><li>
                            <p>Likes: <?= @$page['likes']; ?> <a href="<?= @$page['plus_link']; ?>">
                                    <img src="img/vote.png" alt="like this driver" title="click to like this driver!"/> </a></p>
                        </li>
                        <li>
                            <p>Fails: <?= @$page['fails']; ?> <a href="<?= @$page['minus_link']; ?>">
                                    <img src="img/smote.png" alt="fail this driver" title="click to fail this driver!"/> </a></p>
                        </li>
                    </ul>
                </div>
               <br/>
               <span><a href="/">Search</a> | <a href="/post">Post</a></span>
