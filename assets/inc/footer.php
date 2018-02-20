<p class="note" style="font-size:14px !important">Tip: Try using an external program, to make your popout windows 'always on top'.</p><?php
if($self=="twitch") {
	echo '<p><a href="http://nowlivebot.com" style="font-size:0.9em;"><img src="/assets/-nl';
	if(mt_rand(0,100)==42) echo "p";
	echo '.png" style="position:relative;top:6px;" alt="Now Live"> Now Live <span style="font-size:0.8em">(Stream announcing bot for Discord)</span></a></p>'.PHP_EOL;
}
?></main>
<label for="darkmode" id="darkmode-selector" class="shadow-on-hover">Enable Darkmode<br><input type="checkbox" id="darkmode" onchange="ToggleDarkmode();"></label>
<footer>Made by <a href="http://www.mitsunee.com">Mitsunee</a></footer>
</body></html>