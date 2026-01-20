# Development Process

## Overview
This project converts the provided Figma design into a custom WordPress theme. The focus is on design fidelity, responsive layout, and maintainable content editing through ACF and custom post types.

## Approach
1. **Theme scaffold**: Built a custom theme with reusable template parts (header, footer, hero, cards).
2. **Data model**: Added Custom Post Types for Services and Properties. ACF fields power flexible content inputs and tags for properties.
3. **Layout**: Implemented the Figma layout in HTML/CSS with grid and flexbox, then tuned spacing and typography for the dark theme.
4. **Responsiveness**: Added media queries to ensure the UI adapts cleanly for mobile and tablet.

## WordPress Architecture
- **Templates**: Dedicated page templates for Home, Services, Contact, and Properties.
- **Template parts**: Hero, service card, property card for reusability.
- **CPTs**: `service` and `property` for scalable content.
- **ACF**: Field groups for page content and property tags.

## SEO
Basic SEO tags and Open Graph metadata are output in `wp_head`, along with JSON‑LD for Organization and Website schemas.

## Performance
- Added native `loading="lazy"` to non-hero images.
- `decoding="async"` for images where possible.
- Preconnect hints for Google Fonts.

## Accessibility
- Semantic HTML and clear focus states.
- Visible skip link for keyboard navigation.
- Form inputs include labels/aria labels.
- Reduced motion support using `prefers-reduced-motion`.

## How to Run Locally
1. `docker compose up -d` from `C:\Interview`
2. Open `http://localhost:8080` and complete setup.
3. Activate **Interview Theme**.
4. Install **ACF** and add content for Services/Properties.

## Tools / Plugins
- Advanced Custom Fields (free)
- Optional contact form plugin (Contact Form 7)
