<img src="https://raw.githubusercontent.com/Mitsunee/Popout-Maker/master/assets/icon64.gif" align="right">

# Changelog

The full list of individual commits can be seen [here](https://github.com/Mitsunee/Popout-Maker/commits/master)

## Contents

- [Version 1.1 - Twitch Update](#twitch-update)

<a name="#twitch-update"></a>
## Version 1.1 - Twitch Update

> This update brought Twitch Popouts, lots of small and large design changes and moved the About and Changelog pages to github

- Internal and global stuff
	- *Internal*: Parts of the header, navigation and footer are now automatically included via PHP
	- *YT*: Watch Later support was removed due to YouTube deleting the old embed player. The new player still doesn't support this feature. If it returns, it will automatically work like a normal playlist.
	- Form elements are now stylized
	- Added an alert to show if no link was entered
	- Added an alert to show if javascript is disabled
	- Switched to HTML5 semantic elements
	- The header bar now shows the respective icon and logo
	- Converted the forms to complete HTML forms, so you can now submit your input directly by pressing Enter in the input text field
	- A new navigation was added to replace the cheap text links under the form
	- The *About* page was moved to github
		- added a little github icon to the link
	- The *Changelog* page is now continued on github, the old changelog page is still available for archiving purposes
- Twitch
	- The new Twitch Popouts are now available  
	Twitch Popouts use a special `frame.htm` page that optionally allows to embed the chat in addition to the actual stream. Which side is your choice. The only required input is the channel name of the channel you want in your popout.