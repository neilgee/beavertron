# Beavertron
Starter Child Theme for Beaver Builder Theme 1.7.

(Previous Starter for 1.6 available [here](https://github.com/neilgee/beavertron/archive/v1.6.0.zip) )

This is a starter child theme that requires the parent Beaver Builder Theme.

### WordPress Head Clean Up
Several WordPress unecessary scripts including emoji styles have been removed

### Child Theme Class - FLChildTheme
- */classes/class-fl-child-theme.php* contains all CSS and Javascript files for enqueing, some are enqueued others are commented out, here is where you add all the styles and scripts.

### Cache Buster - FLCache
- */classes/class-fl-builder-cache-helper.php* upcoming BB code to purge all the popular caches when saving layouts and templates in BB/Themer.

### Folder Structure - includes-child
At the top of _functions.php_ there a number of include files that you can comment/uncomment for adding functionality. The folder they are pulled from is *includes-child* as the *includes* folder is only used for parent theme overrides
- */includes-child/beaverbuilder.php* BeaverBuilder plugin functionality:
   * includes a font system stack, there is one already in the theme - this is for the BB plugin., 
   * a filter for global BB settings, change media break points to be  767px small, 1024px medium and 1200px large, 
   * filter to remove lightbox. 
   * filter to remove empty field connections, filters to disable inline-editing and BB notifications.
   * filter for adding colour presets to Customizer and BB plugin color pickers.


- */includes-child/client-file.php* a miscellaneous area for things like:
    * client logo for login
    * removing Dashboard widgets including Gutenberg nags
    * add ACF Pro license

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
- Re-added Medium 300x300 with hard crop
- Added filter to allow Beaver Builder recognise added custom image sizes
- Removed default WordPress 'medium_large' image size - other defaults can be removed by uncommenting
- Function added to allow SVG image uploads to Media Library.
- Image uploads add their file name as alt and title attributes


### Custom Logo
- Custom Logo is supported via the Customizer in the panel Settings > Site Identity > Logo, default size is 300x100px which you can change in the *add_theme_support('custom-logo')* array in *functions.php*
- The logo can support the SVG format.
- SVGs are set to be allowed for upload by the constant 'ALLOW_UNFILTERED_UPLOADS' declared in *functions.php*
- The main purpose of the Custom Logo is to allow for its use via a header created with Beaver Themer - if you are using the Beaver Theme to create the header then the default Header panel > Header Logo section is preferred to use.

More info here - https://wpbeaches.com/add-custom-logo-schema-beaver-themer-header-layout/


### Customizer
- Extra WooCommerce settings for button and alert colors have been added to the default WooCommerce panel, they only appear if WooCommerce is active.
- Button Hover Color added panel *General > Buttons*
- Additional Customizer settings are output via wp_add_inline_style to the child theme CSS 
- Added panel 'Featured Images' with 'Hero Background' field - not actively used.
- List of all Panels and Sections which can be removed from view by uncommenting the code in the **customizer.php** file.
- Added a custom preset 'BT Preset' this is the preferred and only preset.
- BT Preset is set as always active with _set_theme_mod_ this can be removed from _includes-child/customizer.php_
- Removed all other presets.
- Set Preset defaults in _includes-child/customizer-filter.php_
- Added a filter to change the values for the 'BT Preset' 'fl_default_theme_mods'
- Body font and headings set in Customizer with a default font system stack similar to Github.
- Same above system font stack available from within BB modules font dropdowns.


### CSS
Including
- Beaver Builder button snippet
- Meta styling with FontAwesome 5
- Sticky Footer styling with flexbox - also have the BB knowledgebase one which is commented out.
- Pagination CSS for numeric style as used in child theme **index.php**
- Various CSS snippets



### Miscellaneous
- PHP is enabled to execute in widget areas
- Shortcode enabled in widget areas
- Author name removed in Post Meta for posts
- Meta has default icon styling
- Separate CSS Styling for [Business Profile plugin](https://wordpress.org/plugins/business-profile/)
- FontAwesome 5 enabled
- Select2 JS and CSS files included, uncomment in _classes/class-fl-child-theme.php_
- Remove Dashboard Widgets in Admin 


## Change the Theme Name
- Find in files and replace `Beavertron`, `beavertron` and `bt_` with your name and prefix.

Download the zip rename the theme '**beavertron**' - place this theme in your WordPress installation **"/wp-content/themes/"** and activate in WordPress Dashboard


![Beavertron Child Theme](https://wpbeaches.com/images/beavertron-theme.png)


![Additional Customizer controls when WooCommerce is active](https://wpbeaches.com/images/beavertron-theme-woocommerce.png)

Additional Customizer controls when WooCommerce is active


