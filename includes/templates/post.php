                <img src="img/van.png" alt="truck"/>
                <p>Use this form to add a plate number to the database.</p>
                <p>Note 1: Saferlanes is an experiment.</p>
                <p>Note 2: Please drive responsibly.</p>
                <p>Note 3: Slow down at <a href="http://bit.ly/MyZalQ" title="Seriously, do people still know what those stripes mean?">pedestrian crossings</a>.</p>
                <div id="application">
                    <?=@$page['msg'];?>
                    <form name="plate_number" method="POST" action="/post">
                        <input id="pnum" class="title" type="text" name="plate" placeholder="Enter a new plate number here.."/>
                        <input  type="submit" value="go" name="submit" />
                   </form>
                </div>
                <br/>
                <span>Back to <a href="/">search</a></span>