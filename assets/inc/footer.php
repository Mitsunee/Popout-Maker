<p>Also check out:<br>
<?php
if($self!="index") echo '<a href="/" style="font-size:0.9em;">Popout Maker</a><br>';
if($self!="youtube") echo '<a href="/youtube" style="font-size:0.9em;">Popout Maker - <span style="font-weight:500;">You<span class="Tube">Tube</span></span></a><br>';
if($self!="twitch") echo '<a href="/twitch" style="font-size:0.9em;">Popout Maker - <span style="font-weight:700;color:#6441a5 !important;">Twitch</span></span></a><br>';
if($self=="twitch") {
	echo '<a href="http://nowlivebot.com" style="font-size:0.9em;"><img src="/assets/-nl';
	if(mt_rand(0,100)==42) echo "p";
	echo '.png" style="position:relative;top:6px;"> Now Live <span style="font-size:0.8em">(Stream announcing bot for Discord)</span></a>';
}
?></p>
<p class="note" style="font-size:14px !important">Tip: Try using an external program, to make your popout windows 'always on top'.</p>
</main>
<footer>Made by <a href="http://www.mitsunee.com">Mitsunee</a><span style="float:right;"><a href="https://github.com/Mitsunee/Popout-Maker">About</a> | Version: 1.1 (<a href="https://github.com/Mitsunee/Popout-Maker/commits/master">changelog</a>)</span></footer>
</body></html>