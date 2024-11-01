=== Plugin Name ===
Contributors: danlong, crearegroup
Donate link: https://www.creare.co.uk/
Tags: body class, custom class, christmas class, seasonal class, theme switcher
Requires at least: 3.0.1
Tested up to: 3.5.2
Stable tag: 0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WP Christmas Class allows you to dynamically add a custom CSS class to your body tag during a date range of your choosing.

== Description ==

Using WP Christmas class, you can easily define a date range which will add a custom class to your body tag. Using this custom class you can use simple CSS to change the entire look and feel of your website during the festive season. An option is available to make your date range automatically update for the following year.

As the date ranges can be picked by yourself, this is not restricted to just the Christmas period, but also can be used throughout the year ( e.g. Easter, Promotional periods, Summer, Spring, Autumn etc).

* Specify date range - use a simple datepicker to select your active from and to date ranges.
* Add your own class name - this is applied to the body tag.
* Repeat every year - check the option to enable automatic yearly updates.

== Installation ==

Installing and using WP Christmas Class could not be simpler:

1. Upload `/wp-christmas-class/` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Simply control all features from the Administrator Dashboard via 'Settings > WP Christmas Class'

== Frequently Asked Questions ==

= Why is my body class not showing during the active date range? =

Please check to make sure the 'body_class()' function is still on your theme's body tag (this is normally found in header.php). If it does not exist, follow the example on the WordPress Codex page when searching for the 'body_class' function.

= Why are my custom class styles not having an effect? =

When adding your custom class styles to the stylesheet, bare in mind that these are over-riding styles and therefore should be added to the end of the stylesheet. You must also take into account stylesheet specificity hierarchy.

= How do I disable my custom body class? =

To remove the body class, simply disable the plugin or set the date range in the past without the repeat checkbox ticked.

== Screenshots ==

1. This shows the WP Christmas Class settings page.
2. Here shows the custom body class being applied to your theme.
3. An example of how the custom body class can change the style of the website.

== Changelog ==

= 0.2 =

* Plugin core updates.

= 0.1 =

* Initial release.

== Upgrade Notice ==

= 0.1 =

* No upgrades are currently available as this is the initial release.

