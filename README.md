<img src="http://popoutmaker.mitsunee.com/assets/icon64.gif" align="right">

# Popout-Maker

> Utility to generate custom Popout Windows with any browser

Popout-Maker is a small utility I made to have an easy way to open a page inside of a popup window.

## Contents

- [What are popup windows?](#what-are-popups)
- [Popout-Maker YouTube](#youtube-popout)
- [Popout-Maker Twitch](#twitch-popout)
- [Current Status](#status)
- [Current Goals](#goals)
- [Changelog](#changelog)

<a name="what-are-popups"></a>
## What are popup windows?

Popup windows are smaller browser windows that are intentionally missing some features like toolbars, status bars. This makes them very useful for saving space on your screen.

### Example

> This is a standard Google Chrome browser window showing google.de. Notice how it shows the list of tabs and icons in and around the adress bar. Usually there'd also be a row of bookmarks below that.
![Standard Browser Window Screenshot](http://popoutmaker.mitsunee.com/assets/gitimg1.png)

> Here's the popup window version of google.de in the very same browser. The tab row and icons around the adress bar are gone. Some browsers will even go as far as hiding the adress bar as well. Of course the bookmarks are also hidden (this is the case in any browser).
![Popup Browser Window Screenshot](http://popoutmaker.mitsunee.com/assets/gitimg2.png)

<a name="youtube-popout"></a>
## YouTube Popouts

There is also dedicated pages for YouTube and Twitch popouts. The YouTube-version automatically converts video page and or playlist links to embed links, so only the actual video is visible in the popout.  
![YouTube Popout Screenshot](http://popoutmaker.mitsunee.com/assets/gitimg3.png)
> Only the actual video is in the popout.

<a name="twitch-popout"></a>
## Twitch Popouts

The Twitch-version instead takes only the channel name and opens a similar popout that optionally also includes the chat:  
![Twitch Popout Screenshot](http://popoutmaker.mitsunee.com/assets/gitimg4.png)
> The chat can be seen on the right side next to the stream. Names were censored for this screenshot.

<a name="status"></a>
## Current status:

This version (1.1) is a recent release, it brought the Twitch-version and better styling.  
Should any problems arise that didn't show up in testing, please open an Issue on Github.

<a name="goals"></a>
## Current goals:

next version:  
- Using PHP to allow presets via GET variables
- Adding buttons to copy or bookmark a preset-link
- A small wiki showcasing all preset variables and a general guide for all 3 versions
- redo this file (again)

<a name="changelog"></a>
## Changelog

- [Changelog](https://github.com/Mitsunee/Popout-Maker/blob/master/CHANGELOG.md)
- The old beta-version changelog can be found [here](http://popoutmaker.mitsunee.com/changelog)