# WordPress MU-Plugins

A collection of single-file must-use plugins we install on most of the WordPress sites we build and maintain. Each file does exactly one thing: cleans up header output, closes off a feature the site will never use, tightens a security default, or smooths over a small admin irritation.

Full write-up, with the reasoning behind each one: **[A Collection of Useful WordPress Must-Use (MU) Plugins](https://www.wpexplorer.com/wordpress-mu-plugins/)**

## Installation

Copy the files you want into `wp-content/mu-plugins/`. That is the whole process — there is nothing to activate.

These also work as regular plugins (added in a folder with the same name as the file), or you can paste the code (minus the plugin header) into a child theme's `functions.php` or a code snippets plugin.

## What's included

### Cleanup and performance

| File | What it does |
| --- | --- |
| `clean-head.php` | Removes the RSD link, generator tag, shortlinks, oEmbed discovery and other unused `wp_head` output |
| `disable-wp-emoji-support.php` | Removes the emoji script, styles, resource hint and editor plugin |
| `disable-attachment-pages.php` | Redirects attachment pages to the parent post, or the homepage |
| `disable-image-sizes.php` | Stops generation of intermediate image sizes ⚠️ |
| `limit-post-revisions.php` | Caps stored revisions at five per post |

### Privacy and third-party requests

| File | What it does |
| --- | --- |
| `disable-ai.php` | Turns off core AI features plus Jetpack and Elementor AI |
| `disable-avatars.php` | Disables avatars so nothing is requested from Gravatar |
| `disable-yoast-dashboard-widget.php` | Removes the Yoast dashboard widget and its assets, stopping the request to yoast.com on every dashboard load |

### Security and hardening

| File | What it does |
| --- | --- |
| `disable-user-enumeration.php` | Closes username leaks via sitemaps, the REST API, author archives and login errors |
| `disable-xmlrpc.php` | Disables XML-RPC, the pingback methods and the `X-Pingback` header |
| `disable-application-passwords.php` | Turns off application passwords ⚠️ |
| `disable-file-editor.php` | Disables the built-in plugin and theme file editors |
| `disable-user-registration.php` | Forces user registration off regardless of the stored setting |

### Comments and spam

| File | What it does |
| --- | --- |
| `disable-comments.php` | Blocks new comment submissions while leaving existing comments visible |
| `disable-trackbacks.php` | Closes trackbacks and pingbacks |
| `obfuscate-email-shortcode.php` | Provides `[obfuscate_email]` for publishing an address as HTML entities |

### Admin experience

| File | What it does |
| --- | --- |
| `disable-admin-bar.php` | Hides the admin toolbar on the frontend |
| `disable-wp-events-news-dashboard-widget.php` | Removes the WordPress Events and News dashboard widget |
| `hide-admin-notices.php` | Hides admin notices from users who cannot manage options ⚠️ |
| `media-library-file-size.php` | Adds a file size column to the Media Library |

### Staging and demo sites

| File | What it does |
| --- | --- |
| `disable-emails.php` | Blocks all outgoing email ⚠️ |
| `disable-password-reset.php` | Disables password reset requests and hides the lost password link ⚠️ |

## ⚠️ Read before deploying

A few of these are intentionally aggressive. They are the right call in the environment they are meant for and a problem elsewhere.

- **`disable-emails.php`** — blocks password resets, order emails, contact form submissions and admin notifications, silently. Staging and local only.
- **`disable-password-reset.php`** — a genuine lockout risk. Only use it where you have another way in.
- **`disable-image-sizes.php`** — with no intermediate sizes there is no `srcset`, so visitors download full-resolution originals. Only sensible when an image CDN or offloading service handles resizing.
- **`disable-application-passwords.php`** — mobile apps, headless frontends, deployment scripts and some backup plugins authenticate this way. Check before disabling.
- **`hide-admin-notices.php`** — uses `remove_all_actions()`, so legitimate notices disappear along with the spam. Test against what your editors actually use.

`disable-yoast-dashboard-widget.php` depends on Yoast internals (a meta box ID and three asset handles) that can change between releases. If the widget reappears after an update, check them against the current version.

## Requirements

WordPress 6.0 or later for `media-library-file-size.php`, which reads a value core did not store before then. `disable-ai.php` needs WordPress 7.0 for the core filter, though the third-party filters work on earlier versions. Everything else is broadly version-agnostic.

## Contributing

Issues and pull requests are welcome. If you keep something in your own mu-plugins folder that is not in here, open a PR.

Two things to keep in mind: one file per plugin, doing one thing, and a proper plugin header on every file so it shows up with a name under **Plugins → Must-Use**.

## License

GPL-2.0-or-later, the same as WordPress.
