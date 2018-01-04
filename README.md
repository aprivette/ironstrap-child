# IronStrap
*A modern, flexible, and responsive WordPress framework built with the Bootstrap grid*

**Created by Adam Privette**

## Golden Rules of IronStrap
1. Never edit the parent theme or anything under node_modules.
2. Always install dependencies via NPM if they are available.
3. Always use gulp for compiling assets.

## Getting Started
### Setup
1. Use iron-composer or set up theme manually with Visual Composer and ACF Pro installed.  This theme will run without ACF, however to enable full functionality it needs to be installed.  If you're not an Ironistic employee, you can find ACF Pro [here](https://github.com/wp-premium/advanced-custom-fields-pro).  If you want to use Visual Composer you'll have to purchase a copy.
2. Open the terminal and cd to ironstrap-child.  Then, run `npm install` to install Bootstrap, FontAwesome, Smooth Scroll, and Gulp utilities.

### Working in IronStrap
- After setting up your installation, thoroughly look through the IronStrap Options page and populate relevant fields.
- Read up on the Bootstrap grid system.
- site.min.css and site.min.js are automatically enqueued. Use gulp to add new scripts and styles.  If you need to enqueue a script separately for some reason, use the following code in the child theme.

```php
add_action('wp_loaded', function ()
{
    $scripts = [
        [
            "name" => "script",
            "path" => "/path/to/script.js",
            "dep" => ["jquery"],
            "footer" => true
        ]
    ];
    $assets = new IronStrap_Assets($scripts);
    $assets->load_js();
}, 11);
```

### Gulp
Gulp is a terminal utility for automating front-end tasks. Running `gulp` in the child theme directory will do the following tasks. There are 3 main commands you may run.

1. `gulp` // Compiles Sass, concatenates JS, and copies FontAwesome assets to the fonts directory.
2. `gulp watch` // Watches the `sass`, `js`, and `node_modules/font-awesome/fonts` directories for changes.  If changes have been made to a file in any of these directories, the respective gulp task is run.
3. `gulp --production` // Specifies that changes are ready for production. CSS and JS will be minified / uglified.

#### Gulp Tasks
- **Sass:** Compiles site.scss to `css/min/site.min.css`. Using the production flag `gulp --production` minifies the contents of site.min.css.  All Sass compiled with gulp will automatically include relevant browser prefixes, so there is no need to add webkit, moz, or ms prefixes to your styles.
- **Javascript:** Concats all .js files in the js directory to site.min.js. global.js is given priority.
- **Fonts:** Copies font assets from NPM packages to the fonts directory in the child theme.

## Dependency Information
### Plugin Dependencies
- Advanced Custom Fields Pro

### What's Included
- **Visual Composer Elements**
    - IronStrap Retina Image // Uses javascript to situationally display retina images.
- **Shortcodes**
	- ironstrap_btn // A button shortcode without styling.  See parameters below.
		- text
		- link (defaults to '#'
		- target (defaults to '_self')
		- classes
- **NPM Packages**
    - Gulp Sass, Javascript, and font utilities
    - FontAwesome
    - Bootstrap 4 Beta
- **Sass**
    - Bootstrap 4 grid, reboot, display, flex, and visibility components via NPM
    - FontAwesome via NPM
    - Sass mixins
        - image-retina($file, $type, $width, $height) // Retina image generator for divs.
- **Utility Functions**
	- ACF Proxies // These functions make sure ACF Pro is installed before calling get_field or the_field. This is ideal so the website won't crash if ACF is deactivated.
		- `ironstrap_the_field($field, $post = null, $default = null)` // Mimics the_field, but also includes a default value parameter.
		- `ironstrap_get_field($field, $post = null, $default = null)` // Mimics get_field, but also includes a default value parameter.

### What isn't Included
- **Javascript libraries**
    - Including sliders and other javascript libraries should be done on a per site basis via NPM if possible. Recommended slider is Slick Slider.  You can install by running `npm install --save slick-carousel`.
    - The exception to this is Smooth Scroll, a small library for enabling smooth scrolling to anchors.  It can be enabled in IronStrap Options.

### Installing NPM Packages
Almost all reputable frontend packages can be installed with NPM.  If the dependency is only required in development, run `npm install --save-dev package-name`.  For instance, Bootstrap 4 Beta is in dev packages because it is compiled into CSS during development.  Run `npm install --save package-name` for packages required in production.

## Built in ACF Options
### Theme Options
- Global (Security and speed related toggles)
    - Defer Javascript // Speed
    - Disable Versioning // Speed
    - Hide Author Usernames // Security
    - Remove Meta from Head // Security
    - Disable XMLRPC // Security
    - Enable Smooth Scroll // Enables smooth scroll to anchors
	    - Sticky Header Offset Height // Offset smooth scroll by height of sticky header
    - Hide YouTube related videos // Automatically adds rel=0 URL parameter to YouTube embeds
- Header
    - Logo // Header logo
    - Logo Width // Width of the logo in pixels
    - Logo Height // Height of the logo in pixels
    - Retina Logo // Logo for retina screens with 2x resolution
    - Sticky Logo // Sticky header logo
    - Sticky Logo Width // Sticky header logo width for retina screens with 2x resolution
    - Sticky Logo Height // Sticky header logo height for retina screens with 2x resolution
    - Retina Sticky Logo // Sticky header logo for retina screens with 2x resolution
    - Top Header Sidebars // Number of sidebars to enable above the header
	    - Top Header Sidebars Breakpoint // Bootstrap breakpoint for top headers sidebars
- Footer
    - Top Footer Sidebars // Number of sidebars to enable in the footer
	    - Top Footer Sidebars Breakpoint // Bootstrap breakpoint for top footer sidebars
    - Bottom Footer Sidebars // Number of sidebars to enable below the footer
	    - Bottom Footer Sidebars Breakpoint // Bootstrap breakpoint for bottom footer sidebars
- Error
    - 404 Content // 404 editor for PMs
- Sidebars
    - Create Sidebars // Create sidebars for specific pages
    - Left Sidebar Width // Define width of left-aligned sidebars
    - Right Sidebar Width // Define width of right-aligned sidebars
    - Reverse Column Wrap On Mobile // Reverses the stacking of the sidebars and main content.  Useful when a left sidebar needs to collapse to the bottom of the page instead of the top.
    - Sidebar Column Breakpoint // Bootstrap breakpoint for sidebars
- Text Editor Styles
    - Editor Styles // Create styles which hook into the WordPress text editor (TinyMCE) and assign CSS classes to them.
- Javascript
	- Header Javascript // Append JS to the header
	- Footer Javascript // Append JS to the footer
- Redirects
	- Page // Page to redirect
	- External // Specifies an external link
	- Redirect Type // HTTP redirect code
	- Redirect Page or Redirect URL // Where to redirect to
- Favicons
	- Favicon // Generates different sizes of favicons for different devices
	- Theme Color // Defines the primary color of the site - used largely for >= Windows 8 metro grid.
	- Facebook Share Image // Defines an Open Graph image for Facebook
	- LinkedIn Share Image // Defines an Open Graph image for LinkedIn
	- Twitter Share Image // Defines an image for Twitter shares
- Robots.txt
	- Additional Robots.txt Rules // Appends rules to the WordPress generated robots.txt
- WordPress REST API
    - Require Auth for WordPress REST API // Security
    - Expose ACF Fields // Exposes ACF data on specified post types
- Structured Data
	- Options panel for generating structured data for search engines. See [http://schema.org](http://schema.org) for more information.
- Social
	- Social Media // Field for listing social media links with links and icons.  This isn't used anywhere by default in IronStrap.

### Page Options
- Sidebar
	- Enable Sidebar // Enables a sidebar on the page and displays the following options
	- Sidebar Type // The name of a sidebar created in the options page
	- Sidebar Orientation // Right or left
	- Force Child Sidebars // Force the sidebar to display on all children. Can be overridden by children.

### Page and Post Options
- Social Options
	- Facebook Share Image // Defines an Open Graph image for Facebook. Overrides the global IronStrap option.
	- LinkedIn Share Image // Defines an Open Graph image for LinkedIn. Overrides the global IronStrap option.
	- Twitter Share Image // Defines an image for Twitter shares. Overrides the global IronStrap option.
- Structured Data
	- Options panel for generating structured data for search engines. See [http://schema.org](http://schema.org) for more information.

## Contributing
### Rules & Philosophy
1. **Choose your Dependencies Wisely:** Dependencies are great because other people maintain them for us. That being said, use vetted, highly maintained dependencies only to ensure future support. At the time of writing, IronStrap's only dependencies are Bootstrap 4 and Advanced Custom Fields Pro, both of which are fairly ubiquitous.
2. **Minimalism is Key:** Bloat is the enemy here. Don't add features or code that isn't going to be utilized in almost every site we build. No built in shortcodes please. If it's that important, make a plugin.
3. **Keep it Clean:** The aim is for this to be an ongoing project. If you add something make it known and update the README. Comment your code religiously. Also, this project loosely adheres to PSR-2, so make sure you don't stray too far from it.

### Potential Changes
- Add option to change default sidebar breakpoint.
- Add flex-flow reverse option for left-aligned sidebars, making them break to the bottom of the page after the main content.

### License
IronStrap and IronStrap Child are licensed under GPL2, which is more or less required of any WordPress theme.

### Ideas or Questions
Talk to Adam Privette.