# WordPress Docker + Custom Theme

This project includes a Docker-based WordPress setup and a custom theme that matches the provided PNG designs for Home, Services, Contact, and Properties pages.

## Quick Start (Docker)
1. From `C:\Interview`, run:
   - `docker compose up -d`
2. Open `http://localhost:8080` and complete the WordPress installer.
3. In the admin dashboard, go to **Appearance → Themes** and activate **Interview Theme**.

## Required Plugin
- Install and activate **Advanced Custom Fields (ACF)** (free version is fine).
  - The theme includes local JSON field groups in `wp-content/themes/interview-theme/acf-json/`.

## Page Setup
Create the following pages and assign templates:
- **Home** → `Home Page`
- **Services** → `Services Page`
- **Contact** → `Contact Page`
- **Properties** → `Properties Page`

Set the Home page as the front page in **Settings → Reading**.

## Menus
Create menus in **Appearance → Menus** and assign:
- **Primary Menu**
- **Footer Menu**

## Custom Post Types
The theme registers:
- **Services** (`service`)
- **Properties** (`property`)

Add items under **Services** and **Properties** in the dashboard. These appear on the Home, Services, and Properties templates automatically. If none exist, the page-level ACF repeaters will be used as a fallback.

## Contact Form
Add a form plugin (e.g., Contact Form 7) and paste its shortcode into the **Contact Page** ACF field **Form Shortcode**.

## Files of Interest
- `docker-compose.yml` – WordPress + MySQL setup (port `8080`)
- `wp.env` – DB credentials for Docker
- `wp-content/themes/interview-theme/` – Custom theme files
- `wp-content/themes/interview-theme/assets/reference/` – PNG design references

## Notes
- If you prefer different DB credentials, update `wp.env` and restart the containers.
- Use standard WordPress image optimization or a plugin for production.
