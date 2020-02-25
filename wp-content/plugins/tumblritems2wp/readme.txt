=== SharedItems2WP ===
Contributors: pmnordkvist, world_eggplant, jardenberg, fridholm
Author: Per-Mattias Nordkvist
Author URI: http://www.improove.se/
Plugin URI: http://www.improove.se/tumblritems2wp
Tags: tumblr , shareditems, shared-items, automatic, feed, feeds, rss, post
Requires at least: 2.8
Tested up to: 2.8.4
Stable tag: trunk

== Description ==

This is a simple fork of SharedItems2WP that instead reads links from a Tumblr RSS feed. When Google killed the "Share note" feature in Google Reader I needed a new way of posting recommended links to Wordpress. This fork of the old plugin assumes that you are using the Share on Tumblr booklet and post items as links. This plugin then uses the Tumblr RSS-feed to parse for new links and bundles them in a wordpress post with draft status. 

How to use:

   1. Enter the url to your Tumblr RSS. Example: http://pmnordkvist.tumblr.com/tagged/shared/rss
   1. Select ”Run Now”
   1. Edit post template using simple elements
   1. Set default Author, Category and Tags
   1. There’s no step five…
   1. more info on [jardenberg.se](http://jardenberg.se/shareditems2wp)


Credits:

* Jonas Skovmand [world_eggplant](http://twitter.com/world_eggplant)
* Marcus Fridholm [scatcat](http://twitter.com/scatcat)

== Installation ==

This plugin follows the [standard WordPress installation method]:

1. Upload `TumblrItems2WP` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Edit your settings, It should be pretty much self-explanatory

[standard WordPress installation method](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

== Changelog ==

= 1.0 =
* First version that tested with current Tumblr feeds. 
