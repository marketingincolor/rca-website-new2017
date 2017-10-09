# sharpspring-wordpress

Customize your Wordpress site for each visitor by showing personalized content based on their profile in SharpSpring.

**Description**

This plugin lets you (1) add SharpSpring tracking code to Wordpress and (2) pull contact data from SharpSpring and customize your Wordpress site accordingly.

It uses Shortcodes, which let you put content in your pages without any coding knowledge. Anyone who knows how to use SharpSpring can use this plugin, no coding required!

**List of shortcodes you can use:**

- Show contact field value if it exists *(e.g. Hi John!)*
- Show content if contact field is equal to VALUE
- Show content if contact field is EMPTY
- Show content if contact field is NOT EMPTY
- Show content if contact exists
- Show content if contact DOES NOT exist

*Contact fields are things like name, email, industry, country, etc. Instructions on how to use these shortcodes are in the Documentation page when you install the plugin.*

**How is it different from using JavaScript and SharpSpring's Dynamic Content API directly?**

- No coding required
- Every time a contact record changes, the plugin caches the contact's data so it is loaded into the page before the page loads (as opposed to being added after the page loads, which is what SharpSpring's API does). TL;DR - Better user experience.

Yes! You can include these functions in your template files using Wordpress' do_shortcode() function.

**Installation**

1. Download the plugin and upload it to your wp-content/plugins/ directory or install through the Wordpress Plugins page

2. Activate the plugin

3. Go to SharpSpring > Settings and enter your SharpSpring API credentials and tracking code

4. To use shortcodes/custom content, refer to the guide in SharpSpring > Documentation

**Frequently Asked Questions**

**Who made this plugin?**
[Accel Web Marketing](https://www.accelweb.ca). This plugin is not made or maintained by SharpSpring.

**Where can I get support, report a bug or request a feature?**

The best way to do it is through the Support tab for the plugin on Wordpress.org

**How is this plugin different from using JavaScript and SharpSpring's Dynamic Content API directly?**
* No coding required
* Every time a contact record changes, the plugin caches the contact's data so it is loaded into the page before the page loads (as opposed to being added after the page loads, which is what SharpSpring's API does). TL;DR - Better user experience.

**Why isn't a shortcode working as I expected!?**

The number 1 issue is incorrectly entering contact field names in the shortcodes. For a list of common SharpSpring contact field names, see SharpSpring > Field Names in the Wordpress admin.

**Can I include these shortcodes in my template files?**

Yes! Use Wordpress' [do_shortcode()](https://developer.wordpress.org/reference/functions/do_shortcode/) function.
