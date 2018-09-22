# Beavertron
Starter Theme for Beaver Builder.

This a starter child theme that requires the parent Beaver Builder Theme.

### WordPress Head Clean Up
Several unecessary scripts including emoji styles have been removed

### Child Theme Class - FLChildTheme
- */classes/class-fl-child-theme.php* contains all CSS files for inclusion, added version and other default parameters for child theme stylesheet

### Folder Structure - includes-child
At the top of functions.php there a number of include files that you can comment/uncomment for adding functionality. The folder they are pulled from is *includes-child* as the *includes* folder is only used for parent theme overrides
- */includes-child/beaverbuilder.php* BeaverBuilder plugin functionality, includes a font stack added, a filter for global BB settings, change media break points to be over 767px medium and over 1200px large, filter to remove lightbox.
- */includes-child/client-file.php* a miscellaneous area for things like client logo for login
- */includes-child/customizer.php* contains all the Customizer options.
- */includes-child/gravity.php* Gravity forms functionality
- */includes-child/mobile-menu-removal.php* remove default mobile menu 
- */includes-child/output.php* renders the Customizer options CSS
- */includes-child/woocommerce/woocommerce.php* contains all the woocommerce functionality, commented out snippets included - only enabled if WooCommerce plugin is active
- */includes-child/woocommerce/customize-woo.php* all the Woo customizer fields
- */includes-child/woocommerce/woo.css* WooCommerce CSS


### Folder Structure - includes
These are straight parent theme overrides
- */includes/copyright.php* override copyright credit line
- */includes/post-bottom-meta.php* removed comments from bottom meta, added span tags around cats and tags with CSS classes for more control over styling
- */includes/post-top-meta.php* removed author data and comment fontawesome icon
- *index.php* has been overridden and sits in the Child Theme root - difference being it has the numeric WordPress pagination in use - ref - https://wpbeaches.com/add-numeric-pagination-accessibility-beaver-builder-theme/ also the **archive_page_header** function has been moved to inside the main content block.
- */includes/archive-header.php* will output category/tag description if it exists.


### Images
- Added a 'blog-feature' image at 300x200
- Override default medium image with a hard crop
- Added filter to allow Beaver Builder recognise added custom image sizes
- Removed default WordPress 'medium_large' image size - other defaults can be removed by uncommenting
- Function added to allow SVG image uploads to Media Library.


### Custom Logo
- Custom Logo is supported via the Customizer in the panel Settings > Site Identity > Logo, default size is 300x100px which you can change in the *add_theme_support('custom-logo')* array in *functions.php*
- The logo can support the SVG format.
- SVGs are set to be allowed for upload by the constant 'ALLOW_UNFILTERED_UPLOADS' declared in *functions.php*
- The main purpose of the Custom Logo is to allow for its use via a header created with Beaver Themer - if you are using the Beaver Theme to create the header then the default Header panel > Header Logo section is preferred to use.

More info here - https://wpbeaches.com/add-custom-logo-schema-beaver-themer-header-layout/


### Customizer
- Extra WooCommerce settings for button and alert colors have been added to the default WooCommerce panel, they only appear if WooCommerce is active.
- Button color and background and hover colors appear in panel General > Buttons
- Additional Customizer settings are output via wp_add_inline_style to the parent theme CSS 'fl-automator-skin' this can be changed to the child theme CSS.
- Added panel 'Featured Images' with 'Hero Background' field - not actively used.
- List of all Panels and Sections which can be removed from view by uncommenting the code in the **customizer.php** file.
- Added a custom preset 'BT Preset' to illustrate how it is done.
- Removed all other presets.
- Added a filter to change the defaults for the default preset 'fl_default_theme_mods'
- Body font and headings set in Customizer with a font system stack similar to Github.
- Same above system font stack available from within BB modules font dropdowns.


### CSS
The CSS is currently in a state of flux as I work out how I want it structured, so more commits here will be happening.
- style.css
- Beaver Builder button snippet
- Meta styling with Dashicons
- Sticky Footer styling with flexbox - also have the BB knowledgebase one which is commented out.
- Pagination CSS for numeric style as used in child theme **index.php**



### Miscellaneous
- PHP is enabled to execute in widget areas
- Shortcode enabled in widget areas
- Author name removed in Post Meta for posts
- Meta has default icon styling
- Styling for [Business Profile plugin](https://wordpress.org/plugins/business-profile/)


## Change the Theme Name
- Find in files and replace `Beavertron`, `beavertron` and `bt_` with your name and prefix.

Download the zip rename the theme '**beavertron**' - place this theme in your WordPress installation **"/wp-content/themes/"** and activate in WordPress Dashboard


![Beavertron Child Theme](https://wpbeaches.com/images/beavertron-theme.png)


![Additional Customizer controls when WooCommerce is active](https://wpbeaches.com/images/beavertron-theme-woocommerce.png)

Additional Customizer controls when WooCommerce is active


