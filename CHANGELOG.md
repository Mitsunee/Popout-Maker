<img src="http://popoutmaker.mitsunee.com/assets/icon64.gif" align="right">

# Changelog

The full list of individual commits can be seen [here](https://github.com/Mitsunee/Popout-Maker/commits/master)

## Contents

- [Version 1.2 - Preset Update](#preset-update)
- [Version 1.1 - Twitch Update](#twitch-update)

<a name="#preset-update"></a>
## Version 1.2 - Preset Update

> This update brought Presets with a basic link based API

- Internal and global stuff
	- *Internal*: Added a variable that can be set to prevent search engine indexing. This is used wherever a link-based API was used.
- Website Link Preset API
	- The Preset API for standard links can be called by using `/link/` and appending **at least** a valid website-URL using either `http://` or `https://`
	- URLs can't use double-quotation-marks `"` using the API, for security reasons.
	- Width and Height are specified by adding `{width}/{height}/` after `/link`. You have to set either both or neither.
	- Scrollbars can be disabled by adding `noscroll/` before the URL
	- *Examples*:  
	`/link/http://www.mitsunee.com` = a popout with `www.mitsunee.com` and no special settings  
	`/link/640/400/http://www.mitsunee.com` = a 640x400px sized popout with `www.mitsunee.com` and scrollbars  
	`/link/noscroll/http://www.mitsunee.com` = a popout with `www.mitsunee.com` and no scrollbars  
	`/link/640/400/noscroll/http://www.mitsunee.com` = a 640x400px sized popout with `www.mitsunee.com` and no scrollbars
- YouTube Link Preset API
	- This API works very similar to the Website Link Preset API. Again, **at least** the link is required and resolution can be set like above. The new thing is the *advanced options* parameter (which also includes the playlist option).
	- The advanced options parameter goes before the URL. You can put the following letters in this order:
		- ``A`` to disable Autoplay
		- ``i`` to disable Annotations (i because it's called ``iv_load_policy`` in the embed URL)
		- ``P`` to enable playlists. Note that if the scripts finds no video-ID, but does find a playlist-ID, it will automatically enable playlists even when this letter isn't in the parameter!
		- ``L`` to enable Looping.
	- *Examples*:  
	`/youtube/http://www.youtube.com/watch?v=videovideo` = a popout with a video and default settings  
	`/youtube/730/420/http://youtube.com/watch?v=videovideo` = a 730x420px sized video popout  
	`/youtube/iL/http://gaming.youtube.com/watch?v=videovideo` = a video popout with annotations disabled and looping on  
	`/youtube/730/420/i/http://youtube.com/playlist?list=playlistplaylist` = a 730x420px sized video popout with a playlist and annotations disabled. The playlist option is turned on by default, because no video-ID was given.
- Twitch Preset API
	- This API always starts with a channel name. It **cannot** be used without it. The channel name may be followed by a desired window height or chatside choice. The order of these two optional elements doesn't matter. The window width is calculated automatically to match a 16:9 aspectratio.
	- *Examples*:  
	`/twitch/mitsunee_/540` = the channel `mitsunee_` in a window with a 540px height.  
	`/twitch/mitsunee_/nochat/1080` = the channel `mitsunee_` in a window with a 1080px height and no chat.

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
- Update 1.1.1
	- *Internal*: Removed slashes in all `require`s. They weren't finding their files, because Popout-Maker isn't in the root directory on the live server.
	- *Internal*: Images in README.md and CHANGELOG.md are now hosted on the live server.
	- *Fixed*: The Github icon was clipping out of view in Firefox
	- *Fixed*: A few things weren't valid HTML
	- *Github*: Added a few badges and removed the quote marks in `README.md`