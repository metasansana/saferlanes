                <img src="img/van.png" alt="truck"/>
                <h1>Saferlanes</h1>
                <p>The online road reputation tracker for Trinidad and Tobago.</p>
                <p>See what the rest of the country thinks about your driving!</p>
                <div id="application">
                    <?= @$page['msg']; ?>
                    <form name="plate_number" method="POST" action="/search">
                        <input id="pnum" class="title" type="text" name="plate" placeholder="Driver search"/>
                        <input  type="submit" value="go" name="submit"  />
                    </form>
                </div>
                <br/>
                <span>Got a number to add? Click <a href="/post">here</a>.</span>
                <br/>
                <br/>