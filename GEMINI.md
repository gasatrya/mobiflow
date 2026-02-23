# Mobile CTA Bar - Project Context

## Project Overview
**Mobile CTA Bar** is a lightweight, performance-optimized WordPress plugin designed to add a sticky floating "Call to Action" (CTA) button to websites, specifically for mobile devices. It aims to solve "lead leaks" for local businesses (clinics, restaurants, law firms) by ensuring a primary contact action (Call, WhatsApp, Booking URL, or Smooth Scroll) is always within thumb-reach as a user scrolls.

- **Primary Goal:** Increase mobile conversions by providing a permanent, high-visibility CTA.
- **Key Features:** Click-to-call, WhatsApp integration with pre-filled messages, smooth scroll to anchor IDs, custom styling (colors, sizes, icons), and page-level exclusion rules.
- **Performance:** Sub-5kb total asset size, zero external dependencies, and dual-layer (CSS + JS) mobile-only enforcement.

## Core Tech Stack
- **PHP:** 7.4+ (Standard WordPress plugin architecture).
- **WordPress:** 5.9+ (Requires `wp_enqueue_scripts`, `admin_init`, `register_setting`).
- **JavaScript:** Vanilla ES6 (No jQuery, No React).
- **CSS:** Vanilla CSS3 (Flexbox for positioning, CSS variables for dynamic styling).
- **Composer:** Used for development dependencies (Linting/WPCS).

## Architecture & Directory Structure
The project follows a modular, object-oriented approach with a manual PSR-4 autoloader.

- `mobile-cta-bar.php`: Main plugin entry point, metadata, and autoloader registration.
- `includes/`: Core logic and classes.
    - `Core.php`: Singleton coordinator that initializes Admin and Frontend components.
    - `Admin/Settings.php`: Handles the WordPress Settings API, sanitization, and the admin UI with Live Preview.
    - `Frontend/Renderer.php`: Manages frontend HTML injection into the footer and dynamic asset enqueuing.
- `assets/`: Frontend and Admin assets.
    - `css/`: `mobile-cta-bar.css` (Floating button styles) and `admin-settings.css`.
    - `js/`: `mobile-cta-bar.js` (Visibility logic and entrance animation) and `admin-settings.js` (Live preview logic).
- `phpcs.xml.dist`: Configuration for WordPress Coding Standards.

## Building and Running
As this is a WordPress plugin, it requires a local WordPress environment (e.g., LocalWP, DevKinsta, or a manual LAMP/LEMP stack).

### Development Setup
```bash
# Install development dependencies (PHPCS, WPCS)
composer install
```

### Linting & Quality Control
```bash
# Run PHP CodeSniffer (WordPress Coding Standards)
composer run phpcs

# Automatically fix linting issues
composer run phpcbf
```

## Development Conventions
- **WordPress Coding Standards (WPCS):** Strictly followed for PHP (indentation with tabs, spacing, naming).
- **Security:** All outputs must be escaped (`esc_html`, `esc_attr`, `esc_url`). All inputs must be sanitized (`sanitize_text_field`, `absint`). Use nonces for admin actions.
- **No jQuery:** JavaScript must remain dependency-free to ensure maximum performance and compatibility.
- **Namespacing:** All PHP classes are under the `MobileCtaBar` namespace.
- **Autoloading:** Manual PSR-4 implementation in the main plugin file; avoid manual `require_once` for class files.

## Key Files & Symbols
- `MobileCtaBar\Core`: Main instance controller.
- `MobileCtaBar\Admin\Settings`: Registration of `mobile_cta_bar_options`.
- `MobileCtaBar\Frontend\Renderer`: Logic for `should_render()` and SVG icon definitions.
- `mctaSettings`: Global JS object localized from PHP to pass settings (like `delay`) to the frontend.
