HRLR
===

This is a theme for the website of the Columbia Human Rights Law Review (HRLR).

This theme is designed to work with Wordpress version 5.2.3.

Developing Locally
-----------
In order to develop for this theme, you must have Wordpress and SASS installed.

We use [Local by Flywheel](https://localbyflywheel.com) for local Wordpress development.

Create a local site using local, then clone the repo into the `/themes` directory of the site.

In order to make CSS changes, the sass files must be compiled.

1. Set up [Homebrew](https://brew.sh/).
2. In a terminal: `brew install sass/sass/sass`
3. To compile: `sass --watch -I sass sass/style.scss style.css`

Note that Homebrew and SASS only need to be installed to recompile the CSS. To deploy the theme, SASS and Homebrew are not required.

The HRLR theme requires specialized content, plugins, and taxonomies in order to work properly. See the next section for those instructions.


Setting up Wordpress and Deploying the Theme
--------------------

In order to support the theme, the plugins, taxonomies, and content must all be in place.

### Plugins

Install the following plugins.

- Wordpress Importer (0.6.4)
- Mammoth .docx converter (1.14.0)
- Custom Post Type UI (1.6.2)
- Advanced Custom Fields (5.8.5)

The version number after the plugin is the version number the site was developed with.

### Content

Save an archive of the current site before overwriting it with new information.

Disable any active plugins besides the ones we're currently using.

Move all of the current pages and posts to the trash.

Use the Wordpress importer to import the new content. This will require using an export from a recent install of the site. Note: the pdf versions of the articles will need to be uploaded separately and relinked.

### Activate the theme

Activate the HRLR theme to complete the transition.
