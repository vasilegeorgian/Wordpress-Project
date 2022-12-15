# Change Log

All notable changes to this project will be documented in this file.
See [Conventional Commits](https://conventionalcommits.org) for commit guidelines.

## 3.4.9 (2022-12-12)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





## 3.4.8 (2022-12-12)


### docs

* update README contributors


### fix

* added google maps compatibility for bricks builder (CU-37qavun)
* compatibility with Event Calendar and downloading ICS file, in general never try to block inline downloads (CU-37wwyu7)
* compatibility with latest Elementor PRO version and Google Maps JetEngine (CU-37wv9wu)
* compatibility with Pixel Manager for WooCommerce plugin (CU-37he9cj)
* do not show REST API notice when offline, hide when route works again and trace log in textarea (CU-37q9evr)
* german texts not shown for some strings (with context) when using TranslatePress (CU-37q61pt)
* improved compatibility with Geo Directory plugin (CU-33z125m)
* show notice for invalid TCF device closure within the vendor configuration (CU-37hg97j)
* tcf vendor with not-existing purpose cannot be added to TCF vendor configuration (CU-37hg97j)


### refactor

* introduce @devowl/api-real-cookie-banner package (CU-33tam4h)





## 3.4.7 (2022-12-05)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





## 3.4.6 (2022-12-02)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





## 3.4.5 (2022-12-01)


### chore

* adjust telemetry data collection (CU-2ufnyc2)
* execute deferred telemetry data transmit (CU-2ufnyc2)
* review 1 (CU-2ufnyc2)
* review 1 (CU-3764wqn)


### fix

* add new TCF vendor leads to JavaScript error when too much are registered (CU-34g9kbw)
* compatibility with Impreza and OpenStreetMap embed (CU-344n7q3)
* compatibility with WP Go Maps and Google Maps embed (CU-37bnu5f)
* improved compatibility with Oxygen youtube embeds (CU-34g8wne)


### style

* use another blur method as it could break absolute positioned menus (CU-3764wqn)





## 3.4.4 (2022-11-24)


### fix

* add notice when plugins are activated/deactivated (CU-2bujq84)
* compatibility with background video in Elementor sections and column (CU-33z36er)
* compatibility with Bold Page Builder and Google Maps embed (CU-33z66qn)
* compatibility with Bold Page Builder and Google Maps embed (CU-33z66qn)
* compatibility with Bold Page Builder and Google Maps embed (CU-33z66qn)
* compatibility with Bold Page Builder and Google Maps embed (CU-33z66qn)
* compatibility with Elementor playlist when loaded deferred (CU-33z3dh8)
* compatibility with Google Maps in GeoDirectory (CU-33z125m)
* compatibility with Impreza WP Bakery Google Maps embed (CU-344n7q3)
* compatibility with LeafLet Map extension plugin (CU-344mvx1)
* compatibility with Mikado Themes and Google Maps (CU-33z1k0n)
* compatibility with Uncode fluid objects not rendering visual content blockers (CU-344p8r3)
* compatibility with Uncode fluid objects not rendering visual content blockers (CU-344p8r3)
* empty form for creating services within content blocker form (CU-32wtxkt)
* improved compatibility with Elementor Pro and lazy loaded scripts (CU-33z3dh8)
* improved compatibility with WP ImmoMakleer plugin (CU-200ykt6)
* introduce new content blocker selector syntax matchUrls to fix false-positive Elementor videos (CU-33z3dh8)
* sometimes visual content blockers did not unblock after page reload when deferred scripts loading too long (CU-33ternv)
* wrong spacing for visual content blocker for WP Bakery video embeds inside columns (CU-33z5vfd)


### test

* error 1 smoke test failing (CU-344wgj9)
* error 2 smoke test failing (CU-344wgj9)
* error 3 smoke test failing (CU-344wgj9)





## 3.4.3 (2022-11-21)


### perf

* speed up saving of consent for the first consent of the day (CU-33yxgb6)





## 3.4.2 (2022-11-18)


### chore

* review 1 (CU-33tcnkj)


### fix

* compatibility with latest Elementor version and no Vimeo playlist visual content blocker (CU-32h6xq0)
* expand header logo with alt text and correct dimensions for SVG file (CU-33t99y8)
* false-positive REST API notice about real-queue/v1 (CU-33tce0y)
* some translations were still in english instead of Swedisch or other incomplete translation (CU-33t8u66)
* user consents are not deleted after x months when there were too many consents (CU-33yxgb6)


### perf

* reduce time to interactive by rendering visual content blockers earlier (CU-33ternv)


### refactor

* rename handleCorruptRestApi function (CU-33tce0y)





## 3.4.1 (2022-11-15)


### fix

* allow to pass class as parameter to shortcodes
* compatibility with Events Manager and Google Maps (CU-33drdw6)
* compatibility with Google Maps in Essential Addons for Elementor plugin (CU-3388522)
* compatibility with Ovatheme and Google Maps (CU-33drbyt)
* do not show notice about missing privacy policy URL when license activation is not yet done (CU-2kpd6z4)
* force to use option home_url and siteurl instead of constants when within subdomain MU (CU-33khexz)
* service code on page load is not executed when Custom CSS is enabled (CU-33khjmy)
* technical definitions cannot be saved because WordPress unslash JSON value in post meta (CU-33km1q9)


### revert

* we still need to scan elementor libraries (CU-332fn7n)





# 3.4.0 (2022-11-09)


### chore

* review 1 (CU-1xgphqf)


### feat

* automatic deletion of consents (CU-1xgphqf)


### fix

* compatibility with blocked content for Jet Smart Filters lazyloading (CU-332jgxy)
* compatibility with Google Maps in Sober theme (CU-332ev4y)
* compatibility with latest version of WPImmomakler
* compatibility with MapPress Google Maps (CU-32wpgv9)
* compatibility with MapsMarkerPro unblocking (CU-32wnjpu)
* compatibility with Vehica theme
* do not show preset check when editing a template in services or content blocker form (CU-2wmf0yr)
* duplicate technical definition in Vimeo and JetPack Site Stats template (CU-32wkt35, CU-332f81e)
* improved compatibility with Elementor and Elementor PRO to block individual widgets (CU-32q09j9)
* listen to elementor init with vanilla JS event listener instead of jQuery (CU-332h9tj)
* skip elementor library and skip in scanner (CU-332fn7n)
* visual content blocker not visible when using content in Kadence Blocks accordion module (CU-32pzryx)


### refactor

* improved compatibility with PHP 8.1 (CU-1y7vqm6)
* static trait access (Assets enqueue features, CU-1y7vqm6)
* static trait access (Assets handles, CU-1y7vqm6)
* static trait access (Assets types, CU-1y7vqm6)
* static trait access (Localization i18n public folder, CU-1y7vqm6)
* static trait access (Localization, CU-1y7vqm6)


### revert

* handle child themes correctly when blocked (CU-32pymrn)


### style

* full width content blocker for elementor widgets





# 3.3.0 (2022-10-31)


### chore

* compatibility with WordPress 6.1 (CU-32bjn2k)
* review 1 (CU-32pvhdp)
* review 1 (CU-yrhr8c)
* review 2 (CU-yrhr8c)
* review 2 (CU-yrhr8c)
* review 3 (CU-yrhr8c)


### feat

* add scan again for individual scan results (CU-yrhr8c)


### fix

* automatically block child theme URLs when using parent slug in content blocker rule (CU-32pymrn)
* compatibility with Elementor PRO video playlists (CU-32h6xq0)
* compatibility with Ezoic CDN and content blocker (CU-32h9k0n)
* compatibility with GDPR mode of Avada theme (CU-2fd0phg)
* compatibility with Magnific Popup (CU-32pvhdp)
* compatibility with The Events Calendar Google Maps embed (CU-32h7mh4)
* compatibility with WooCommerce Point of Sale (CU-32hc0zw)
* list of consents white screen when IPv6 entry is shown (CU-32pvj24)





# 3.2.0 (2022-10-25)


### chore

* add restore option for ignored external URLs (CU-11efdym)
* review 1 (CU-30r534y)
* review 1 (CU-3203uve)
* review 2 (CU-1pbzf97)
* review 2 (CU-3203uve)


### feat

* allow to filter by IP addresses with truncated results in list of consents (CU-3203uve)
* native integration to CMP – Coming Soon & Maintenance Plugin by NiteoThemes (CU-319a6mz)
* native integration to Maintenance plugin by WebFactory Ltd (CU-319a6mz)
* native integration to Website Builder by SeedProd (CU-319a6mz)
* native integration to WP Maintenance Mode & Coming Soon (CU-319a6mz)


### fix

* better explains import/export section (CU-30r534y)
* block Twitter timeline (CU-32be81u)
* compatibility for Directories Pro with Google Maps (CU-31mkbne)
* compatibility with CheckoutWC autocomplete (CU-31zzkuj)
* compatibility with Elementor PRO actions (e.g. YouTube lightbox, CU-3204cj6)
* compatibility with GiveWP stripe gateway plugin (CU-325v56y)
* compatibility with latest Enfold / Avia google maps embed (CU-31mp857)
* compatibility with Salient theme and OpenStreetMap embed (CU-3200g2t)
* compatibility with SiteOrigin Google Maps widget (CU-32044f1)
* configure form content blocker templates as visual by default (CU-31mnthw)
* content blocker not applied with IONOS performance plugin (CU-32003j3)
* license activation error 'Client property value is Emty' (CU-31zz2mk)
* localize original home URL to be not dependent on admin bar when it got removed / disabled (CU-3203g9v)
* white space below footer when Thrive Leads content blocker is created (CU-32be9fh)





## 3.1.7 (2022-10-11)


### build

* add webpack as dependency to make it compatible with PNPM (CU-3rmk7b)


### chore

* add new team member to wordpress.org plugin description (CU-2znqfnu)
* introduce consistent type checking for all TypeScript files (CU-2eap113)
* prepare script management for self-hosted Gitlab migrations (CU-2yt2948)
* rebase conflicts (CU-3rmk7b)
* remove unused dependencies (CU-3rmk7b)
* start introducing common webpack config for frontends (CU-2eap113)
* switch from yarn to pnpm (CU-3rmk7b)


### ci

* make PNPM and our backends work in CI pipeline (CU-3rmk7b)


### fix

* block content in Enfold theme slider (CU-30jdd2j)
* compatibility for new Mailerlite embed (CU-d10rw9)
* compatibility with Avada fusion builder video shortcode (CU-30r31hk)
* compatibility with Divi multi view and allow deeply blocking content in JSON attributes (CU-30jcz089)
* compatibility with Enfold / Avia google maps embed
* compatibility with HivePress and memoize jQuery events with their parameters (CU-30xxbyt)
* compatibility with Impreza + WP Bakery vimeo embed and video thumbnail (CU-2yyye6w)
* compatibility with Neuron themes and their advanced google maps Elementor widget (CU-313bduc)
* compatibility with OnePress maps and jQuery.each hijacking (CU-30cg9tv)
* compatibility with WoodMart themes and Google Maps (CU-30r6bk1)
* create stub for window.consentApi (CU-30xpafq)
* do not find false-positive attributes in HTML strings in JSON attribute (CU-30xnaa3)
* do not find Gravatar when using Elementor Notes module in scanner (false-positive, CU-30jdeqb)
* do not find links in RankMath localized variable and false-positive e.g. YouTube (CU-30cgtat)
* do not scan OMGF inline scripts as Google Fonts (CU-2znv6e2)
* improved UX when configuring Continue without consent and Save button in customizer (CU-2znk1f4)
* show cookie banner on pages selected as Imprint / privacy policy when external page / URL is used (CU-313j6wv)
* show Facebook Page Plugin in scanner when used with Elementor PRO sdk injection
* show Facebook Page Plugin in scanner when used with Elementor PRO sdk injection
* warning when OceanWP is active and trying to add a new menu item in Design > Menu (CU-2znuj8j)


### test

* setup VNC with noVNC to easily create Cypress tests (CU-306z401)





## 3.1.6 (2022-09-21)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





## 3.1.5 (2022-09-21)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





## 3.1.4 (2022-09-20)


### fix

* consent could not be created due to invalid NONCE_SALT (CU-2yypq95)
* google maps content blocker could not be created (CU-2zfw1cy)





## 3.1.3 (2022-09-16)


### chore

* validate service and blocker tempalates for specific rules (CU-2kav8bg)


### fix

* allow to configure essentials button independent of body design
* compatibility for Google Maps via Ultimate Addons for WPBakery Page Builder (CU-2yt24kh)
* compatibility with BeaverBuilder PowerPack videos and overlays (CU-2yyvjag)
* compatibility with Creativo theme by Rockythemes
* compatibility with Oxygen accordion and visual content blockers (CU-2yypktj)
* compatibility with YouTube blocker and Impreza + WP Bakery in lightbox
* make minimal languages work again with legal texts in cookie banner (CU-2yt84ad)
* show correct link when PolyLang / WPML active in banner footer instead of page_id (CU-2yyph19)





## 3.1.2 (2022-09-06)


### fix

* compatibility for Widgets for Google Reviews by Trustindex.io (CU-2wu8qtc)
* compatibility for WP Map Block with Google Maps (CU-2x5p9r8)
* compatibility for WP Map Block with OpenStreetMap (CU-2x5p9r8)
* compatibility with Agile Store Locator (CU-2wu2gjc)
* compatibility with blocked content in Impreza theme popups (CU-2ep5dt0)
* compatibility with Divi video embed, thumbnail overlays and autoplay (CU-2vxpf7d)
* compatibility with Elementor PRO and facebook page widget
* compatibility with Elementor Video API when no script is loaded without consent (CU-2wu8u5j)
* compatibility with Oxygen lightbox and visual content blockers (CU-2x5j0cy)
* compatibility with Ultimate Addons for WPBakery Google Maps widget
* compatibility with wrong margin when embedding video in WP Bakery page builder (CU-2wu94qk)
* correctly copy content when default language differs from setup language in WPML / PolyLang (CU-2x5p7yh)
* do not show notice about privacy policy when not needed
* facebook page plugin content blocker could not be created (CU-2x5j2kg)





## 3.1.1 (2022-08-30)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





# 3.1.0 (2022-08-29)


### chore

* compatibility for JetEngine Google Maps Listing version >= 3.0 (CU-2jzg7yc)
* extract urls from texts for better translatability (CU-2gfbm5v)
* introduce devowl-scripts binary (CU-2n41u7h)
* introduce for non-flat node_modules development experience (CU-2n41u7h)
* optimize explanation texts for EU-wide instead of German consideration (CU-2gfbm5v)
* prepare packages for PNPM isolated module mode (CU-2n41u7h)
* rebase conflicts (CU-2n41u7h)
* reduce bundle size by removing some vendor files (CU-2d8dedh)
* review 1 (CU-20r2upf)
* review 1 (CU-2d8dedh)
* review 1 (CU-d0zyw3)
* show a notice when deactivating animation-in in customizer (CU-2w3br3w)


### ci

* generate webpack json stats and upload to storage-dev (CU-1r55qj4)


### feat

* introduce a more intuitive way updating service templates (CU-d0zyw3)


### fix

* caching issues with consent history dialog (CU-2vqu2gd)
* caching issues with dynamic predecision (GEO restriction, CU-2vqu2gd)
* compatibility with image overlay for Elementor videos (CU-2vxf7tf)
* compatibility with Jupiter X and their Google Web Font Loader (CU-2w90px5)
* compatibility with latest MailerLite version
* compatibility with latest TCF vendor list and additional information (CU-20r2upf)
* compatibility with PHP 7.2.1 (CU-2w38zkr)
* compatibility with Presto Player (CU-2w3au1b)
* compatibility with WP Optimize lazyloading (CU-2w39gdf)
* delete HTTP cookies was called multiple times (CU-2d8dedh)
* remove unnecessery hint for ePrivacy USA setting in customizer (CU-2w3awb1)
* sometimes Custom HTML blocks got no YouTube thumbnail and block iframe onload attribute (CU-2wetw74)
* visual content blockers are rendered 1 second delayed when GTM/MTM is active (CU-2v12m07)


### perf

* drop IE support completely (CU-f72yna)
* permit process.env destructuring to save kb in bundle size (CU-f72yna)


### refactor

* all legal relevant texts put into own context (CU-2uv31dz)
* introduce new admin-UI package to prepare for intuitive service template updates (CU-2d8dedh)
* move blocker list component to @devowl-wp/react-cookie-banner-admin (CU-2d8dedh)
* move components of cookie form to @devowl-wp/react-cookie-banner-admin (CU-2d8dedh)
* move first components of cookie form to  @devowl-wp/react-cookie-banner-admin (CU-2d8dedh)
* move group form component to @devowl-wp/react-cookie-banner-admin (CU-d0zyw3)
* move list component to @devowl-wp/react-cookie-banner-admin (CU-d0zyw3)
* rename meta field codeOptOutDelete to deleteTechnicalDefinitionsAfterOptOut (CU-2d8dedh)
* rename meta field cookies to services (CU-2d8dedh)
* rename meta field criteria cookies to services (CU-2d8dedh)
* rename meta field forceHidden to shouldForceToShowVisual (CU-2d8dedh)
* rename meta field hosts to rules (CU-2d8dedh)
* rename meta field noTechnicalDefinitions to isOnlyEmbeddingExternalResources (CU-2d8dedh)
* rename meta field providerPivacyPolicy to providerPrivacyPolicyUrl (CU-2d8dedh)
* rename meta field sessionDuration to isSessionDuration (CU-2d8dedh)
* rename meta field visual to isVisual (CU-2d8dedh)
* rename meta field visualDarkMode to isVisualDarkMode (CU-2d8dedh)
* rename meta fields for Google/Matomo Tag Manager (CU-2d8dedh)
* rename template field cookies to serviceTemplates (CU-2d8dedh)
* rename template field deactivateAutomaticContentBlockerCreation to shouldUncheckContentBlockerCheckbox (CU-2d8dedh)
* rename template field disableTechnicalHandlingThroughPlugin to shouldRemoveTechnicalHandlingWhenOneOf (CU-2d8dedh)
* restructure template field blockerPresets to contentBlockerTemplates (CU-2d8dedh)
* restructure template field dynamicFields from object to array (CU-2d8dedh)
* use browsers URL implementation instead of url-parse (CU-f72yna)





## 3.0.2 (2022-08-09)


### chore

* add more security hashes for disabled footer (CU-232h7c4)
* compatibility for Themovation Google Maps embeds (CU-2ufxfgv)


### fix

* block content in FacetWP facets html (CU-2r5967v)
* compatibility with Borderland theme and Google Maps embed (CU-2pc4umm)
* compatibility with CMSMasters plugins and jQuery gMap plugin (CU-2tdff1g)
* compatibility with Elementor lightbox links and Vimeo and YouTube content blocker (CU-2uvazkm)
* compatibility with Elementor popup content and content blocker (CU-2uvazkm)
* compatibility with FacetWP inline scripts which hold blocked data (CU-2r5967v)
* compatibility with PremiumAddons for Elementor OffCanvas menu (CU-38kmfgj)
* compatibility with Ultimate Blocks accordion and visual content blockers (CU-2r5ej7e)
* compatibility with vanilla-lazyload used by WP Rocket Lazy Load plugin (CU-2pc568x)
* compatibility with YouTube and Vimeo videos in Avada lightbox (CU-2ufpd83)
* compatibility with YouTube content blocker and jetpack embed
* connect.facebook.com was found as external URL in scanner when using facebook page plugin (CU-2tdfh2z)
* disable content blocker for rendered AMP pages (CU-2uvazv6)
* introduce cookie name version and allow new installations using the cookie path in cookie name (CU-2rb441c)
* powered by link is print on the bottom page instead of in cookie banner (CU-2phzbpj)
* using custom WP_CONTENT_DIR for wp-content/plugins and wp-content/themes blocker rules (CU-2rb3arg)


### style

* cookie banner hidden behind header when positioned on top in Divi theme (CU-2r5evnq)





## 3.0.1 (2022-07-06)


### chore

* send accepted group slugs to consent forwarding endpoints (CU-2mk0wyq)


### fix

* allow to block JSON in inline scripts granularly (e.g. inline translations, CU-2my9x5r)
* compatibility with autoptimize and aggregate inline CSS (CU-2m7jfhg)
* compatibility with Avada Fusion Builder video facade (lite-youtube-embed, CU-2nfkhc3)
* compatibility with Elementor Pro popups and visual content blocker (CU-2kp8vmg)
* compatibility with FacetWP and Maps add-on (CU-2p6az87)
* compatibility with latest Thrive Ledas ribbons
* compatibility with NitroPack (CU-232f9nh)
* compatibility with ProvenExpert badge (CU-2nv12n8)
* compatibility with RankMath SEO and Google Analytics GA4 property (CU-2je6juk)
* exclude rcb-calc-time from scanner result source url (CU-2my9x5r)
* text for list of services not changeable when WPML/PolyLang active (CU-2nfktuh)
* wrong notice in media library about services without privacy policy (CU-2jzg30c)





# 3.0.0 (2022-06-13)


### chore

* add updated blog links to different services (CU-2fjkw82)
* rebase conflicts (CU-2jm1m37)
* remove unnecessery update client third-party scripts in free version (CU-2kat97y)
* update README.txt title and remove WordPress wording (CU-2kat97y)
* update WordPress.org assets (banner, screenshots, CU-2kat97y)


### feat

* provide wizard for v3 features (CU-2fjk49z)


### fix

* compatibility content blocker with latest Typeform embed (CU-2kgpkcb)
* compatibility with Podigee podcast player (CU-2kawh0f)
* sanitize input fields where needed (CU-2kat97y)


### refactor

* remove deprecated renderings and options (CU-2k54e7h)


### BREAKING CHANGE

* we now offer a wizard for all important changes from v2 onwards





## 2.18.2 (2022-06-08)


### chore

* etracker settings moved in their dashboard; adjust notice in service template (CU-2fd0ejp)
* update embera third-party dependency (CU-2d2n29v)


### docs

* clean up changelog (CU-294ugp0)
* update GIFs in wordpress.org product description (CU-2fjkwc6)


### fix

* better error message when TCF GVL could not be downloaded completely (CU-2jm2eb7)
* compatibility with JetEngine Maps Listing component (CU-2jzg7yc)
* compatibility with Thrive Leads ribbons with animations
* compatibility with visual content blocker of play.ht plugin (CU-2jm27t4)
* security vulnerability XSS, could be exploited by logged in administratos (CU-2j8f5fa)
* some PHP notices about missing variables (CU-2j8gba7)


### perf

* introduce new database indexes for large consent database table (CU-2jtrjnz)


### refactor

* extract cookie banner UI to @devowl-wp/react-cookie-banner (CU-2jm1m37)
* use is_multisite instead of function_exists checks (CU-2k54b8m)


### style

* superscript was set too hight (CU-2fcwcx0)





## 2.18.1 (2022-05-24)


### fix

* migrations did not work as expected for newer features and existing users (hotfix, CU-2f1fcfv)





# 2.18.0 (2022-05-24)


### chore

* highlight consent options equally in design presets (CU-20chay0)
* show in-app promo coupons in free version (CU-23tayej)


### docs

* animated banner in wordpress.org product description (CU-237uw9d)
* compatibility with WordPress 6.0 (CU-2e4yvvt)
* mention new features in wordpress.org product description (CU-294ugp0)


### feat

* add optional purpose field to technical definitions (CU-20ch8fp)
* allow to disable the bullet list of groups in customizer (CU-20chd53)
* allow to list all services with their associated groups as superscript in first view (CU-20ch8w2)
* allow to modify the button order in customizer (CU-20chay0)
* allow to use the same styling in customizer of Accept All for Continue without consent and Save button (CU-20chay0)


### fix

* automatically update the privacy policy URL of the RCB service when the privacy policy setting changes (CU-1z4gr4p)
* compatibility with local Windows environment as all templates are shown as free
* compatibility with Rodich theme and their Google Maps shortcode (CU-2eg9czv)
* contact form 7 showed up without any Google reCAPTCHA script (CU-2eghepk)
* correctly reset new feature defaults for existing installations (CU-20ch8be)
* correctly sync Settings > Privacy policy setting in cookie settings (CU-1z4gr4p)
* do not translate texts with placeholder in translation editor (TranslatePress, CU-2f1fcfv)
* facebook pixel enabled all facebook services in scanner (CU-2eghepk)
* make privacy policy required and show notice for already existing services without URL (CU-1z4gr4p)
* no reuse of consent UUID to prevent tracking of consent concatenation on server side (CU-20che0e)
* preview images for youtube-nocookie.com embeds (CU-2f1fcfv)
* show correct status for Content Blocker in admin bar menu (CU-2dz5058)
* update all on-premise / local services with updates privacy policy from Cookies > Settings (CU-1z4gr4p)
* update texts in cookie banner to be compliant with latest law (CU-2cbpypb)
* use range input slider for all PX values in customizer (CU-20chay0)
* use range input with value with unit in customizer (CU-20chay0)


### refactor

* move consent management to @devowl-wp/cookie-consent-web-client
* namings for headless-content-blocker scan options (CU-2eghepk)





## 2.17.3 (2022-05-13)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





## 2.17.2 (2022-05-09)


### fix

* compatibility with Enfold/Avia video embeds and visual content blockers (CU-2e50h21)
* compatibility with OSM - OpenStreetMap plugin (CU-2e512a8)
* compatibility with platform.js and YouTube subscribe embed (CU-2dkvyrh)
* compatibility with WP Download Codes and download files greater than 50 MB (CU-2e51kwj)
* dynamic predecision for GEO-restriction always returned false (CU-2dzb1xr)
* listen to URL changes for custom legal links (CU-2dkw9dk)





## 2.17.1 (2022-04-29)


### fix

* compatibility with Buddyapp theme as banner buttons were not clickable (CU-2chdca5)
* compatibility with BuddyPress and cookie banner not visible (CU-2cx02ch)
* compatibility with CAPI events in Facebook for WordPress plugin (CU-2buj68e)
* compatibility with Essential Addons for Elementor and blocked content in tabs (CU-2d89n4c)
* compatibility with podcaster.de and podcast-player plugin (CU-2d89n4c)
* compatibility with Social Feed Gallery instagram feed (CU-2d8ba1v)
* duplicate rule in Google Analytics content blocker templates (CU-23tdjz8)
* hero visual content blocker is sometimes cut through overflow or too small parent containers (CU-2d89n4c)
* never block any dns-prefetch link tags as they are GDPR compliant without any blocking (CU-22h5xz6)
* service was shown in two groups after it got moved to another group (CU-22h6bee)
* support multisites with more than 100 subsites (CU-2de4am1)
* when changing a post also scan the translated page if WPML, PolyLang or TranslatePress is active (CU-23tehfc)





# 2.17.0 (2022-04-20)


### chore

* add a description to the texts section in customizer (CU-2195q0e)
* block channel embed of Anchor.fm in content blocker (CU-bcwmqj)
* code refactoring and calculate monorepo package folders where possible (CU-2386z38)
* enable media library selection for content blocker image (CU-eb4h2q)
* implement UI for new content blocker visual settings (CU-eb4h2q9)
* introduce predefined images for content blocker content types (CU-1y2d0mb)
* prepare new visual content blockers for lite version (CU-eb4h2q)
* remove React and React DOM local copies and rely on WordPress version (CU-awv3bv)
* store embed thumbnails in a more generic folder in wp-content/uploads (CU-eb4h2q)
* update embera (CU-eb4h2q)


### feat

* allow content blocker with preview images in list of consents (CU-eb4h2q)
* allow to create navgiation / menu links with one click instead of shortcodes (CU-we4qxh)
* allow to export / import visual content blocker settings (CU-eb4h2q)
* implement visual content blocker with visual audio player (CU-eb4h2q)
* introduce new visual settings in Content Blocker form (CU-eb4h2q)


### fix

* better explain the Matomo Tag Manager script URL in service template (CU-2386cvv)
* block 1.gravatar.com in Gravatar content blocker template (CU-2200n8k)
* cleanup code and adjust checklist for legal links (CU-we4qxh)
* compatibility of nav menus with WPML (CU-we4qxh)
* compatibility with customizer theme and disabling the footer link in the customizer (CU-244r9ag)
* compatibility with Gravity Geolocation and Google Maps (CU-23z12mr)
* compatibility with latest version of HappyForms and Google reCAPTCHA (CU-1znd8x2)
* compatibility with TranslatePress Automatic User Language Detection popup and blurred popup (CU-244r841)
* do not show busy indicator in scanner result table when not needed (CU-23tchda)
* download thumbnail in standard format and force 16/9 ratio for YouTube videos (CU-eb4h2q)
* drill down visual thumbnail to nested blocked content when parent gets visual (CU-1z4fxer)
* improved compatibility with Podigee (CU-eb4h2q)
* improved compatibility with WP YouTube Lyte (CU-eb4h2q)
* in multisite environments there could be a wrong WP_COOKIEPATH, respect always the latest in document.cookie (CU-23z12mr)
* provide a grouped admin menu node for all Real Cookie Banner actions (CU-1zad7fx)
* remove duplicate URLs from scanned sitemaps (CU-2200n8k)
* same font size for essential button as default value of accept all button (CU-23kq9gb)
* show busy indicator when unblocking visual content blocker (CU-1z4ndd2)
* show visual content blocker within tab panels (CU-23kq9gb)
* when using animations the header was flickering while scrolling (CU-2c60q8h)


### perf

* lazy load visual content blockers in a more convenient way using idle callbacks (CU-eb4h2q)


### refactor

* extract composer dev dependencies to their corresponding dev package (CU-22h231w)
* move more files to @devowl-wp/headless-content-unblocker
* move wordpress packages to isomorphic-packages (CU-22h231w)
* put composer license packages to @devowl-wp/composer-licenses (CU-22h231w)
* rename wordpress-packages and wordpress-plugins folder (CU-22h231w)
* revert empty commits for package folder rename (CU-22h231w)
* use phpunit-config and phpcs-config in all PHP packages (CU-22h231w)





## 2.16.2 (2022-04-04)


### chore

* add more security hashes for disabled footer (CU-23292y8)


### fix

* better compatibility with Popup Maker and delayed content blocker creation (CU-22pyyhj)
* blocked DNS prefetches were not indicated as Blocked in scanner results (e.g. WordPress Emojis, CU-22h6rp3)
* compatibility with Hero Maps Premium (CU-2202t4e)
* compatibility with JetElements Advanced Maps (CU-22q59y5)
* compatibility with latest Divi version and some unresponsive behavior (CU-20xrmn7)
* compatibility with Widget for Google Reviews (CU-2202q1c)
* compatibility with WP Staging and scanner (CU-1ykd052)
* compatibility with WP Video Lightbox (CU-294vh4j)
* ignoring external URLs did not work in real-time (transient not updated, CU-22wkx1g)


### style

* blurry cookie banner when using Age Gate plugin (CU-22wtfv3)
* history select dropdown wrong color in dark mode (CU-22pyy0u)





## 2.16.1 (2022-03-15)


### chore

* update TCF dependencies to latest version (CU-22bavpa)
* use wildcarded composer repository path (CU-1zvg32c)


### fix

* adjust US data processing consent setting description (CU-20cherc)
* bypass geo-restriction when using Lighthouse page speed score user agent (CU-20chp0h)
* change privacy settings modal did not show accepted visual content blockers (CU-1znufvk)
* compatibility with latest Oxygen page builder version (CU-20crzbn)
* compatibility with SiteGround Optimizer (CU-1znmzvx)
* correctly invalidate scanner query transients for post deletion and when invalidating preset cache (CU-20jc4q1)
* disable animations in Firefox mobile as it breaks the layout (CU-20jbyp5)
* fire OptInAll event after GTM/MTM datalayer pushes (CU-20162wr)
* notice while exporting consent by UUID (CU-2015tvy)
* recommend to use the change privacy preferences shortcode on every page (e.g. footer, CU-20chbhc)
* scanner on recurring exception reruns successful jobs again (CU-20jc0cf)
* show notice when changing the service group for a preset (CU-20ch93c)


### perf

* cache dashboard notice about recommendations to speed up admin load (CU-20jc4q1)
* cache external URL hosts result as it slows down the admin area (CU-20jc4q1)
* use correct grouping for read external URLs (CU-20jc4q1)


### refactor

* make plugin updates independent of single store (CU-1jkmq84)


### style

* no line break in footer when using mobile experience (CU-20jbyp5)
* use correct text align when theme uses justified text align (CU-1znufvk)


### test

* smoke tests





# 2.16.0 (2022-03-01)


### chore

* add links to useful resources and blog posts about specific thematics (CU-1wepcvt)
* additional notice for WordFence template about their IP transmission to the cloud (CU-1y7vxg1)
* block all plugins from Ninja Forms when forms created with Ninja Forms are blocked (CU-1za7zg5)
* block Instagram background images embedded by tagDiv (CU-1ydpf9k)
* content blocker rule to block OpenStreetMap embedded via "Ultimate Maps by Supsystic" (CU-1yyy4ae)
* provide ready promise for OptInAll event (CU-1wernq1)


### ci

* use Traefik and Let's Encrypt in development environment (CU-1vxh681)


### feat

* new customizer setting to only use animations on mobile devices (CU-1xwnv8m)
* new service and content blocker template etracker (CU-1wernq1)
* new service and content blocker template Facebook Graph (CU-1w8rmkp)
* new service and content blocker template Google User Content (CU-1w8rmkp)
* new service and content blocker template trustindex.io (CU-1w8rmkp)


### fix

* allow current language for other blogs in multisite for consent forwarding (CU-1ydjdeg)
* allow to apply code dynamics to code on page load (CU-1wernq1)
* better memory allocation for scanner and persisting found markups to database (CU-1ydq6ff)
* block CSS styles in style-attributes of HTML elements (CU-1ydpqa1)
* compatibility with latest X Pro theme and YouTube embed (CU-1ydp482)
* compatibility with OptimizePress page builder (CU-1ydtzkv)
* compatibility with Thrive Visual Editor and background youtube videos (CU-1yyxmwn)
* compatibility with TinyMCE and OceanWP (CU-cmwwwj)
* compatibility with WP Grid Builder and lazy loading facets (CU-1y25df6)
* compatibility with WP YouTube Lyte (CU-1yyrrw1)
* compatibility with wpDiscuz and Gravatar content blocking (CU-1z4ghy7)
* compatibility with wpDiscuz and Gravatar content blocking when sorting and posting comments (CU-1z4ghy7)
* compatibility with YouTube Embed Plus (CU-1z4gg3k)
* compatibilty with latest Divi video module and overlay (CU-1yyyc2d)
* correctly show blocked URL in scanner results for inline styles (CU-1ydq6ff)
* detect Google Analytics service template without inline script (CU-1yt64aa)
* do migrations also for prerelease versions (CU-1ydq6ff)
* do not anonymouize assets when anti-ad-block system is deactivated (CU-1ydtzkv)
* empty alt text for cookie banner logo (CU-1yduvtv)
* ignore URLs to files while scanning (CU-1za72vj)


### style

* do not break all words in service groups description (CU-1ydutuz)





# 2.15.0 (2022-02-11)


### feat

* new content blocker template Divi Contact form (CU-1wepwec)
* new content blocker template Five Star Restaurant Reservations form with reCAPTCHA (CU-1vqz6f1)
* new service and content blocker template Piwik PRO (CU-1wernc9)


### fix

* allow to determine if preset is active depending on active theme (CU-1wepwec)
* compatibility to WP Grid Builder Map Facet add-on (CU-1y25df6)
* compatibility with MyListing directory theme (CU-1y7v6cm)
* compatibility with Salient theme and Google Maps (CU-1y7xfwx)
* compatibility with tagDiv composer and Vimeo/YouTube playlists (CU-1xwmenz)
* compatibility with tagDiv Composer page builder (CU-1xwmenz)
* compatibility with Ultimate Member logout page as it automatically logout while scanning pages (CU-1xwmc5f)
* compatibility with WooCommerce Google Analytics Pro when using manual tracking ID (CU-1y7vj2j)
* compatiblity with Norebro Theme (CU-1wmhnke)
* warning about enable_local_ga when Perfmatters is active


### perf

* reduce lifecycle rerenderings by moving height calculations to CSS var implentation (CU-1xwnnwu)





## 2.14.3 (2022-02-04)


### chore

* show notice about TCF illegal usage (CU-1wmjkr6)





## 2.14.2 (2022-02-02)


### build

* use correct namespace in ember composer package through custom patch


### fix

* compatibility with Autoptimize when obkiller is active (CU-1weqdr2)
* compatibility with Divi contact forms and Google reCAPTCHA (CU-1wepwec)
* security issue (only as signed-in uses exploitable) as the reset-all action did not have a CSRF token (CU-1werk7m)
* tcf consent is correctly saved, but wrong at time of changing privacy preferences (CU-1w9587v)


### style

* close icon is not clickable when overlay is deactivated
* long links in indivual privacy leads to horizontal overflow (CU-1vxgxxb)





## 2.14.1 (2022-01-31)


### chore

* clean up and refactor coding for image preview / thumbnails (WIP, CU-1w3c9t7)
* introduce plugin to extract image preview / thumbnails from embed URLs (WIP, CU-1w3c9t7)
* new developer API wp_rcb_invalidate_presets_cache (CU-1w93u4z)


### fix

* compatibility with Bridge theme and their Elementor Google Map shortcode (Qode, CU-1vxgywx)
* facebook.com got found as external URL when using noscript-tag (CU-1vqz5av)
* google-analytics.com got found as external URL when using noscript-tag (e.g. PixelYourSite, CU-1vqx293)
* move Already exists tag to own database column (CU-1vqym25)
* native integration for MailChimp for WooCommerce to not set cookies (CU-1y7r3r1)
* provide _dataLocale parameter to all our REST API requests to be compatible with PolyLang / WPML (CU-1vqym25)
* show error message if scanner results coult not be loaded in scanner table (CU-1v6c7nv)
* unify enqueue_scripts hooks to be compatible with AffiliateTheme (CU-1xpm56k)


### style

* overflow on horizontal screen when using Elementor landingpage Hero section (CU-1w3c2v8)





# 2.14.0 (2022-01-25)


### chore

* add more security hashes for disabled footer (CU-1znbady)
* add notice to mobile experience in free version as it is always responsive even in free (CU-2328pwb)
* update Facebook provider to Meta provider for all FB service templates (CU-23kf838)
* update upgrade notice to be more descriptive about update process (CU-23kf838)


### feat

* allow to skip failed jobs (e.g. scan process, CU-1px7fvw)
* introduce new close icon in cookie banner header (CU-22b6qqj)


### fix

* compatibility with latest ExactMetrics Premium version (CU-23keqgb)
* compatibility with ProgressMap (Google Maps, CU-23284bc)
* config page could not be loaded if there is no admin color scheme defined (CU-23djh08)
* reduce required length of Hotjar ID to 5 instead of 7 (CU-23dk3f1)
* shortcode buttons did not work as expected with custom HTML tag (CU-23dmpjf)
* umlauts could not be saved in opt-in scripts (CU-1zb10r8)


### refactor

* extract unblocking mechanism to @devowl-wp/headless-content-unblocker (CU-23dqww5)


### style

* cookie banner had a small gap on the bottom when mobile experience is active (CU-237tnje)





# 2.13.0 (2022-01-17)


### build

* create cachebuster files only when needed, not in dev env (CU-1z46xp8)
* improve build and CI performance by 50% by using @devowl-wp/regexp-translation-extractor (CU-1z46xp8)


### chore

* new developer filter RCB/IsPreventPreDecision (CU-1yk0nxf)
* suppress webpack warnings about @antv/g2 as it does not impact the frontend but disturbs CI and DX (CU-1z46xp8)


### feat

* introduce new mobile experience (CU-nz2k7f)
* new content blocker template HappyForms with Google reCAPTCHA (CU-1znd8x2)
* new service and content blocker template Analytify Google Analytics v4 (CU-qtf2u6)
* new service and content blocker template ExactMetrics Google Analytics v4 (CU-1xgxrnt)
* new service and content blocker template Klaviyo (CU-1x5enat)
* new service and content blocker template Kliken (CU-1x5ejtu)
* new service and content blocker template MonsterInsights Google Analytics v4 (CU-1xgxrnt)
* new service and content blocker template TI WooCommerce Wishlist (CU-1x5e0jt)
* new service and content blocker template WooCommerce Google Analytics Pro (CU-1z4eara)
* simulate viewport in List of consents when viewing a cookie banner (CU-nz2k7f)


### fix

* allow to disable the powered by link via our license server (CU-1znbady)
* compatibility with a3 Lazy Load (CU-22gym0m)
* compatibility with WP Contact Slider (CU-1y7nw9p)
* compatibility with WP ImmoMakler Google Maps (CU-200ykt6)
* compatibility with YouTube + Vimeo + Premium Addons for Elementor (CU-1wecmxt)
* correctly break line for dotted groups in cookie banner on iOS safari (CU-nz2k7f)
* detect more ad blockers in admin page (CU-1znepfw)
* empty external URL shown when plugin disable WordPress Emojis is active (CU-1y7rr78)
* for older WP < 5.4 versions an encodedString was printed to website (CU-1yk0may)
* rule to block Google Maps JS API in content blocker for Levelup theme compatibility (CU-20100kp)
* use anchor-links for shortcodes instead of class so they can be used without shortcodes, too (CU-1z9yf6b)


### refactor

* move scanner to @devowl-wp/headless-content-blocker package (CU-1xw52wt)


### style

* scrollbar did not look pretty in windows together with dialog border radius (CU-1z9yaaq)


### test

* compatibility with Xdebug 3 (CU-1z46xp8)





# 2.12.0 (2021-12-21)


### chore

* show notice in dashboard when using an language which has incomplete translations in RCB (CU-1vc3ya0)


### feat

* introduce minimal translations for frontend: FR, IT, PL, RO, NL, TR, RU, BG, CS, DA, SV, FI, GL, PT, ES (CU-1vc3ya0)
* new service template for WooCommerce Geolocation (CU-1rgeyre)


### fix

* check for consent before doing WooCommerce default customer location (CU-1rgeyre)
* compatibility with Akea theme when shortcode links were not clickable (CU-1y232uq)
* compatibility with customizer and OceanWP (use async wp.customize.control, CU-1vc3y2f)
* compatibility with Elementor Hosted websites (CU-1xw5rqp)
* compatibility with Elementor overlay, the content blocker button was not clickable (CU-1xpm3v3)
* compatibility with Page Links To plugin and plugins overwriting permalinks (avoid scanner takes external URL, CU-1xw95xq)
* compatibility with Ultimate Addons for Elementor and Google Maps (CU-1xpm0ze)
* compatibility with WPForms and Google Maps (CU-1xpm0ze)
* in some edge cases, the own URL was shown as external URL (CU-1xw7bmp)
* return value for jQuery.fn.fitVids (CU-1xw9jnb)


### refactor

* move WordPress scripts to @devowl-wp/wp-docker package (CU-1xw9jgr)





## 2.11.2 (2021-12-15)


### chore

* introduce new filter RCB/SetCookie (CU-1xpffw5)


### fix

* recommended templates are shown as non-existing if already existing in scanner tab (CU-1xpfu3p)





## 2.11.1 (2021-12-15)


### chore

* backwards compatible footer visibility in list of consents table (CU-1vhtwa2)
* cleanup code for scanner (CU-1v6cf91)
* description of the legitimate interest and essential cookies according to the TTDSG concretized (CU-1wejt3d)
* introduce new PHP api wp_rcb_consent_given (CU-1rgeyre)
* introduce plugin and design version for new consents (CU-1vhtwa2)
* introduce query argument validations for scanner (CU-1v6crwz)
* new developer filter RCB/Presets/Cookies/Recommended and RCB/Presets/Blocker/Recommended (CU-1xazcrh)
* remove non-saw-out descriptions from content blocker templates to save space in the content blocker (CU-1vhtwa2)


### docs

* highlight availability of German formal translations in wordpress.org description (CU-1n9qnvz)


### fix

* allow to dismiss the request new consent notice (CU-1wtzm8t)
* apply preset middlewares in correct order (CU-1x5cj8w)
* compatibility with Ark theme and jQuery(window).load (CU-1wznta2)
* compatibility with fitVids when using together with a caching plugin (CU-1wm4u9v)
* compatibility with Journey theme (indieground, CU-1wu21c3)
* compatibility with latest Advanced Ads version and floating tracking (CU-1vxejft)
* compatibility with Plesk security as hosts are not allowed in scanner result URLs (CU-1vxd9gz)
* compatibility with ProvenExpert PRO Seal in ProvenExpert content blocker (CU-1xb3cmd)
* consider empty values for query parameters as optional in scanner (CU-1x5az10)
* do no longer request consent for abandoded TCF vendors (CU-1xaz66y)
* external DNS prefetches should be checked again against known presets (CU-1vxd8qc)
* false-positive when using Google Analytics with googletagmanager.com and gtag directive (CU-1v6crwz)
* find inline scripts semantically loading another script and show as external URL (CU-1v6cf91)
* formal german texts got not updated for new Real Cookie Banner service (CU-1vxdu4n)
* only remove external URLs while scanning when a proper preset was also found (CU-1v6cf91)
* recommened Jetpack Site Stats when module is active (CU-1v6c4da)
* refreshing the settings form with F5 leads to an error (CU-1weh6c2)
* register custom post types and taxonomies earlier (CU-1rgeyre)
* scanner shows Google Trends when using an unknown Google service (CU-1vxd8qc)
* show potential external URL found in inline-script (CU-1v6cf91)
* the new MonsterInsights update could no longer be scanned (missing protocol in script URL, CU-1x5az10)
* unblock attributes also for selector-syntax applied on inline scripts (CU-1xb6wg7)


### refactor

* move mustHosts definitions into scanOptions (CU-1v6crwz)


### style

* content blocker last teaching should be above the link and styled as teaching (CU-1vhtwa2)
* customizer presets should respect hidden powered-by-link
* do not show footer for visual content blockers as not needed (CU-1vhtwa2)
* show USA data processing notice in visual content blocker only when needed (CU-1vhtwa2)





# 2.11.0 (2021-12-01)


### chore

* improving the description of cookies set by Real Cookie Banner (CU-1td2xu0)
* texts for recognized adblocker more clearly expressed (CU-1hwuugw)


### docs

* adjustment of the product description to the new legal situation (CU-1rvxtf1)


### feat

* introduce formal german translations (CU-1n9qnvz)
* new service and content blocker preset Perfmatters Local Analytics (CU-knc88p)
* new service and content blocker template Komoot (CU-1qtja83)
* new service template WP Cerber Security (CU-1qtja83)


### fix

* allow to overwrite attributes when extending from a preset (CU-knc88p)
* automatically update the Real Cookie Banner service for this update (CU-1td2xu0)
* compatibility with latest React v17 version of WordPress 5.9 (CU-1vc94eh)
* compatibility with YouTube inside Ultimate Addons for Elementor (CU-1vqmbh4)
* compatiblity with Thrive Events maps and LeafLet (CU-1vhzm2e)
* compatiblity with WordPress 5.9 (CU-1vc94eh)
* find semantic IIFE scripts which load another external script and show as scanned result (CU-1v6cf91)
* in some cases safari lead to a race condition and some scripts did not correctly load (CU-1ty9n1b)
* introduce new legal basis for Real Cookie Banner service (legal-requirement, CU-1td2xu0)
* truncate service description in list view after three rows (CU-1td2xu0)





## 2.10.1 (2021-11-24)


### chore

* block Google Maps embedded with Premium Addons for Elementor (CU-1u409yv)


### fix

* compatibility with WP Cloudflare Super Page Cache plugin (CU-1uv3wuf)
* consider newly requested consent as no-consent-given in consentApi (CU-qtbjxk)


### perf

* large websites with a lot of external URLs makes the WordPress admin slow (CU-1u9wehh)


### style

* avoid CLS animation warning in Lighthouse when animations are deactivated (CU-1u9xage)





# 2.10.0 (2021-11-18)


### feat

* new content blocker template Elementor Forms with Google reCAPTCHA (CU-nqbu52)


### fix

* add TCF stub to anti-ad-block system (CU-1phrar6)
* compatiblity with Themeco X Pro page builder (CU-11eagky)
* consents could not be given in private wordpress.com sites (CU-1td2p11)
* do not show all Facebook services when only one is found (CU-1nn1qrg)
* missing Linkedin Partner ID in service template for noscript fallback (CU-rga6b3)
* rename some cookies to be more descriptive about their origin (CU-1tjwxmr)
* show a warning in main settings page when the user is using an adblocker (CU-1hwuugw)
* show essential services' labels in content blocker form (CU-p5fgk8)
* show notice if GTM/MTM is not defined as service but setted as manager (CU-z9n7g2)
* with some MySQL database versions the scanner found external URLs are not displayed (CU-1tjtn8q)


### refactor

* save user country in consent itself instead of independent revision (CU-1tjy2nr)





## 2.9.3 (2021-11-12)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





## 2.9.2 (2021-11-11)


### chore

* remove not-finished translations from feature branches to avoid huge ZIP size (CU-1rgn5h3)


### fix

* block Google Analytics embedded via Rank Math as locally hosted gtag (CU-1q2x5pa)
* block Google Maps in Elementor widget
* block gtag events in WooCommerce Enhanced Tracking (CU-1qe7tam)
* compatibility with latest Ninja Forms update (CU-1uf8fq9)
* compatibility with Modern Events Calendar and Google Maps (CU-1qecxy4)
* compatibility with UCSS / CCSS in LiteSpeed Cache plugin (CU-1m1h4mh)
* content blocker for Google Maps in WPResidence theme
* correctly display special characters in page dropdown in settings (CU-1phmb9g)
* correctly filter modified publisher restrictions for TCF purposes (CU-1rarxc7)
* do not block content in script text templates (CU-1qe7t0t)
* filter by URL with more accurate pure referer respecting current permalink settings (CU-ad0gf1)
* redirect back to scanner when creating the WooCommerce service (service without content blocker, CU-1nn08eb)


### refactor

* extract content blocker to own package @devowl-wp/headless-content-blocker (CU-1nfazd0)
* extract HTML-extractor to own package @devowl-wp/fast-html-tag


### style

* line height in header of elementor widget so content blocker text does not overlap





## 2.9.1 (2021-11-03)


### fix

* create visual content blocker within responsive container (like Vimeo, CU-1mju68j)
* do not lazy load Code on page load scripts when WP Rocket is active (CU-1mjk6cn)
* never block inline scripts only holding JSON objects (CU-1mjv9gh)
* try to find possible visual content blockers in hidden modals (CU-1my8az3)
* warning in PHP 8 when creating a new service (CU-1my8zcu)
* warning in PHP 8 when using WP CLI (CU-1my8zcu)





# 2.9.0 (2021-10-12)


### feat

* allow to filter by context, period and URL in list of consents (CU-ad0gf1)
* block Vimeo Showcases in Vimeo content blocker
* new service and content blocker template Taboola (CU-n1bn4x)


### fix

* allow to reset group texts correctly for the current blog language (CU-1k51cgn)
* compatibility with Extension for Elementor plugin (CU-1kvu486)
* compatibility with Meow Lightbox (CU-1m784c9)
* compatibility with WP Google Maps Gold add-on (CU-1kankt3)
* compatiblity with Groove Mneu Plugin (CU-1kgeggn)
* do not allow to import PRO templates in free version as we cannot ensure up-to-date (CU-1bzrthu)
* do not show empty context in context dropdown if there were already consents
* do not try to expose empty hosts / URLs in content blocker settings (CU-1k51ax2)
* remove Google Adsense warnings in console when ads are initialized multiple times (CU-1m7c86a)
* scanner did not found Google reCAPTCHA when used standalone (CU-1kvurfe)
* show fallback language for language context is list of consents
* use correct user locale for REST API requests in admin area when different from blog language (CU-1k51hkh)


### perf

* block very (very) large inline CSS (like fusion builder does) took up to 5 seconds (CU-1kvpuwz)





# 2.8.0 (2021-09-30)


### build

* allow to define allowed locales to make release management possible (CU-1257b2b)
* copy files for i18n so we can drop override hooks and get performance boost (CU-wtt3hy)


### chore

* english translation revision (CU-vhmn9k)
* prepare for continuous localization with weblate (CU-f94bdr)
* remove language files from repository (CU-f94bdr)
* rename 'Statistic' to 'Statistics' (CU-12gwu5r)


### ci

* introduce continuous localization (CU-f94bdr)


### feat

* allow to declare an external URL for imprint and privacy policy page (CU-kv7qu2)


### fix

* allow to translate external URL of imprint and privacy policy page with WPML and PolyLang in customizer (CU-kv7qu2)
* backwards-compatible Statistic cookie group naming for service templates (CU-12gwu5r)
* block content also on pages which got declared as hidden in cookie settings (CU-1jkue32)
* block Google Maps in Adava with Fusion Builder as "Fusion Google Map" (CU-12b2jft)
* content blocker for Google Maps in Avada theme
* custom config for COOKIEPATH never should be empty (CU-1jth67d)
* do not follow CORS redirected URLs in scanner (CU-11m6me9)
* do not show cookie banner in legacy widget preview coming with WP 5.8 (CU-1jdzfnn)
* link for customer center in Licensing tab not present (CU-vhmn9k)
* make animations work again in Divi page builder when a custom link with blocked URL got created (CU-1jz6bgn)
* save job result for cors requests while scanning pages (CU-1je508f)
* scanner threw an error when using WP < 5.5 and deleting a file


### perf

* remove translation overrides in preference of language files (CU-wtt3hy)


### refactor

* grunt-mojito to abstract grunt-continuous-localization package (CU-f94bdr)
* introduce @devowl-wp/continuous-integration
* introduce new command with execa instead of own exec implementation


### style

* do line break content blocker buttons (CU-12b05vm)





# 2.7.0 (2021-09-08)


### chore

* translate new service templates (CU-yrgfkk)


### docs

* mention support for automatic video playback for Dailymotion and Loom at wordpress.org (CU-yrge7n)


### feat

* autoplay for Loom and Dailymotion (CU-yrge7n)
* new service and content blocker template Dailymotion (CU-n1f306)
* new service and content blocker template Giphy (CU-mt8ktd)
* new service and content blocker template LinkedIn Ads (Insight Tag, CU-rga6b3)
* new service and content blocker template Loom (CU-u9fxx7)
* new service and content blocker template OpenStreetMap (CU-pn8mu0)
* new service and content blocker template TikTok Pixel (CU-p1a7av)
* new service and content blocker template WordPress Plugin embed (CU-p382wk)


### fix

* adjust texts for powered-by link (CU-we5cq1)
* allow force hidden also for absolute positioned content like Dailymotion embed
* bypass CMP – Coming Soon & Maintenance Plugin when scanning a site (CU-118ud0m)
* bypass Under Construction by WebFactory plugin when scanning a site (CU-118ud0m)
* compatibility with lazysizes (used e.g. in EWWW, CU-11ehp99)
* content blocker removes inline style in some cases (e.g. when parent is wrapper)
* do not clear cache too often when accesing the Dashboard and no consents are given yet (CU-10huz72)
* extract @font-face CSS rules correctly (Divi latest update, CU-118mpjh)
* php logging Undefined offset: 1 in scanner/Query.php
* server error when content blocker finds CSS style which does not represent an URL (CU-10hruca)
* transmit realCookieBannerOptInEvents and realCookieBannerOptOutEvents variable to GTM/MTM data layer (CU-118ugwy)
* wrong GTM template variables for AddToAny service





## 2.6.5 (2021-08-31)


### fix

* add missing script to be scanned for Google Adsense (CU-yyep3k)
* allow to unblock nested jQuery ready functions (WP Google Maps, CU-wkyk4h)
* compatibility with latest PHP version 8.0.9
* compatibility with latest Thrive Leads plugin version (CU-yrkt9b)
* compatibility with latest Thrive themes & plugins (global CSS variables, CU-wkuq39)
* compatibility with Thrive Quiz Builder (CU-yjt538)
* console warning when google maps is used but jQuery is not yet ready on page load
* decode URLs differently than e.g. JSON attributes when unblocking content (CU-z3zua1)
* do not try to apply content blocker to rewritten endpoints which server downloads / binary data (CU-z9qhnd)
* make CSS functions work when they are blocked via Content Blocker (CU-wkuq39)
* scanner should not find link rel=author links
* with some caching plugins enabled the consent can no longer be saved after x hours (CU-wtj9td)





## 2.6.4 (2021-08-20)


### chore

* update PHP dependencies


### docs

* use redirects for legal documents


### fix

* allow emojis in cookie banner and content blocker (CU-u3xv7j)
* banner not visible for older safari and internet explorer browser (CU-vhq9jn)
* compatibility with latest Avada Fusion Builder (live editor, CU-u9mb2h)
* consider non-WWW host as same host and do not detect as external URL (CU-u9m6rv)
* consider WWW subdomain also for link preconnects and dns-prefetch for the correct template (CU-u9m5e5)
* cookie banner history dropdown gets wrong font color (CU-u9m484)
* do not show content blocker in Fusion Builder live editor (CU-u9mb2h)
* empty Google Analytics 4 opt-in code (CU-w8c0r4)
* false-positive detection of Reamaze in scanner
* modals wrongly titled
* modify composer autoloading to avoid multiple injections (CU-w8kvcq)
* scanner did not find sitemap correctly when WPML is active (CU-vhpgdw)


### style

* delete button in service form in wrong position





## 2.6.3 (2021-08-12)


### chore

* update text when scanner has finished to make clear it is coming from Real Cookie Banner (CU-t1ccx6)


### docs

* enhance wordpress.org product description (CU-rvu601)


### fix

* allow different site and home URL for the scanner to find robots.txt (CU-t1mafb)
* allow optional path to Matomo Host (CU-t1cpvz)
* customizer did not load correctly (CU-u3q46w)
* link to multisite consent forwarding knowledge base article (CU-rg8p46)
* remove React warning in developer console about unique keys (CU-u3q46w)
* scanner compatibility with PHP < 7.3
* www URLs of the same WordPress installations were considered as external URL in scanner (CU-6fcxcr)





## 2.6.2 (2021-08-11)


### fix

* loose sitemap index URLs (CU-rvwmnk)





## 2.6.1 (2021-08-10)


### fix

* link rel blocker should handle subdomains correctly
* userlike blocker should block by their CDN instead of usual URL





# 2.6.0 (2021-08-10)


### chore

* introduce new developer filter RCB/Blocker/IsBlocked/AllowMultiple and RCB/Blocker/ResolveBlockables (CU-7mvhak)
* new developer filter RCB/Blocker/SelectorSyntax/IsBlocked
* update texts for scanner tab (hint, CU-mtddjt)


### docs

* service scanner featured in wordpress.org description (CU-n9cuyh)


### feat

* add 9 new content blockers for existing services (CU-mtdp7v)
* add content blocker for 19 services so the scanner can find it (CU-mtdp7v)
* add new checklist item to scan the website (CU-mk8ec0)
* allow to create a new service from scratch directly within a content blocker form (CU-mk8ec0)
* allow to scan also essential services which could not be blocked (e.g. Elementor)
* automatically rescan updated posts
* block link preconnect's and dns-prefetch's automatically based on URL hosts defined in content blocker (CU-nn7g16)
* handle external URLs popover with Cookie Experts dialog (CU-mk8ec0)
* introduce client worker and localStorage restore functionality (CU-kh49jp)
* introduce functionality to find sitemap or fallback to WP default if not existing (CU-kfbzc6)
* introduce mechanism to scan a site for usable presets and external URLs (CU-kf71p4)
* introduce new package @devowl-wp/sitemap-crawler to parse and crawl a sitemap (CU-kh49jp)
* introduce scanner UI for found presets and external URLs (CU-m57phr)
* introduce UI for scanned markups for predefined presets (CU-m57phr)
* new service and content blocker preset Ad Inserter (plugin, CU-kvcmp7)
* popup notification when scan hast finished and allow to ignore external URLs (CU-m57phr)
* proper error handling with UI when e.g. the Real Cookie Banner scanner fails (CU-7mvhak)
* show global notice when using services without consent
* show recommended services not by content blocker but by dependency (CU-mtdp7v)
* translate scanner into German (CU-n9cuyh)
* use @devowl-wp/real-queue to scan the complete website (CU-kh49jp)


### fix

* add remarketing to Google Ads Conversation Tracking service template (CU-pb9txp)
* allow to block the same element by multiple attributes (CU-p3agpd)
* always save the markup so redundant external URLs can be wiped (CU-mtdp7v)
* automatically start scan process for the first time
* be more loose when getting and parsing the sitemap
* block ad block from Ad Inserter newer than 2.7.2 in content blocker template (CU-kvcmp7)
* change close label text when updating privacy preferences (CU-rgdp01)
* compatibility with Impreza frontend page builder
* compatibility with latest Thrive Architect plugin (CU-p3agpd)
* compatibility with Ultimate Video WP Bakery Page builder add-ons (CU-pd9uab)
* create new service within content blocker shows zero as prefilled group
* do not add duplicate URLs to queue
* do not enqueue real-queue on frontend for logged-in users
* german support link (CU-rg8qrt)
* include all revision data in single consent export
* native integration for Analytify preset (disabled status, CU-n1f1xc)
* native integration for GA Google Analytics preset (disabled status, CU-n1f1xc)
* native integration for MonsterInsights preset (disabled status, CU-n1f1xc)
* native integration for RankMath SEO Google Analytics (install code, CU-n1bd59)
* native integration for WooCommerce Google Analytics preset (disabled status, CU-n1f1xc)
* preset WordPress Emojis should also block the DNS prefetch
* remove extended presets from scan results
* split Google Analytics into two content blockers UA and V4 (CU-nq8c3j)
* tag to fully blocked associated with found count instead of distinct of sites count
* update Facebook Post preset to be compatible with Facebook Video (CU-p1dxwp)
* use correct cookie experts link (CU-mtddaa)


### perf

* speed up scan process by reducing server requests (CU-nvafz0)


### refactor

* introduce new keywords needs for presets (CU-mzf8gj)
* move code dynamic fields to preset attributes (CU-h38crf)
* presets extends should no longer be a class name, instead use identifier (CU-n19da6)
* split i18n and request methods to save bundle size
* use instance for blocked result in RCB/Blocker/IsBlocked filters (CU-nxeknj)


### style

* background color for recommandations admin bar menu
* gray out already existing prestes in service and content blocker template screen
* move Google Ads hint about Adwords ID to the input field





## 2.5.1 (2021-08-05)


### chore

* update TCF dependencies to latest version (CU-pq8wt4)


### fix

* decode and encode HTML attributes correctly and only when needed (CU-q1a82b)
* duplicate external hosts in multisite forwarding leads to invisible banner
* enhance Google Maps Content Blocker to be compatible with WP Store Locator (CU-pkhmqy)
* introduce new unique-write attribute in opt-in field for Google Ads and Google Analytics (CU-raj3eg)
* put powered-by link in banner in same align as the legal links (CU-pn8pcz)
* reload page after consent change (CU-pnbunr)
* reset essential cookies correctly when custom choice is selected


### refactor

* remove TCF global scope coding (CU-pq8wt4)


### style

* make content blocker hosts collapsable instead of showing all (CU-pkhcg8)





# 2.5.0 (2021-07-16)


### chore

* update compatibility with WordPress 5.8 (CU-n9dfx9)


### feat

* new service and content blocker preset Podigee (CU-nzbb2q)


### fix

* assign GetYourGuide preset to Marketing cookie group instead of Functional (CU-nv85ef)
* imported content blockers leads to empty admin page in lite version (CU-nzc6gg)
* regex for Google Ads Conversation Tracking ID too strict





# 2.4.0 (2021-07-09)


### feat

* new cookie and content blocker preset MailPoet (CU-m3dtuf)


### fix

* add EFTA countries to countries where the GDPR applies (CU-mhcqjz)
* compatibility with dynamic modules in Thrive Architect (CU-n9bup4)
* compatibility with Elementor video overlay and lightbox (CU-nkb66n)
* compatibility with Pinterest JavaScript SDK (CU-nkaq8m)
* compatibility with themify.me Builder Maps Pro add-on (CU-nna6bg)
* compatibility with themify.me video modules (CU-nna6bg)
* compatibility with WP Rocket 3.9 (CU-nkav4w)
* cookie groups are sortable again via drag & drop (CU-nhfmkt)
* detect multisite / network wide plugins as active for services (CU-mzb2kw)
* do not block content in Themify.me page builder (CU-nna6bg)
* do not hide blocked elements when they use visual parent from children element
* do not show banner for browsers without cookie support (CU-v77cgg)
* do not stop code execution for opt-in scripts and content blocker when blocked through Ad blocker (CU-ndd0dp)
* explain where to find Google Adwords ID in Google Ads service template (CU-mtav6f)
* lite version dashboard not scrollable (CU-nd8e07)
* recalculate responsive handlers after content got unblocked (CU-nnfb22)
* typo in Google Maps content blocker description





# 2.3.0 (2021-06-15)


### chore

* allow to check for consent with consentApi by post ID (CU-m9e56j)
* introduce new PHP developer API wp_rcb_service_groups() and wp_rcb_services_by_group() (CU-m9e56j)
* simplify text of the age notice (CU-m3a6n2)
* translate new presets (CU-m38dkk, CU-kt8cat, CU-m3dtuf, CU-m15mty)


### feat

* automatically delegate click from content blocker when we unblock a link
* content blocker Google Translate compatible with "Translate WordPress" plugin (CU-m3e1fm)
* define Google Adsense Publisher ID in Google Adsense service template to alloew e.g. auto ads (CU-m7e13d)
* new cookie and content blocker preset Calendly (CU-m38dkk)
* new cookie and content blocker preset MailPoet (CU-m3dtuf)
* new cookie and content blocker preset My Cruise Excursion / meine-landesausflüge (CU-kt8cat)
* new cookie and content blocker preset Smash Balloon Social Photo Feed (CU-m15mty)


### fix

* adjust three customizer presets to be compatible with latest Dr. Schwenke newsletter (Dark patterns, CU-m1e0zn)
* allow service for MailPoet 2 (deprecated plugin, CU-m3dtuf)
* allow window.onload assignments in blocked content (CU-m38dkk)
* block reddit post embed as iframe (CU-m15mty)
* compatibility with Astra theme and hamburger menu (automatically collapse if clicked too early)
* compatibility with BookingKit and blur effect (CU-m1acj0)
* content blocker could not find already existing cookies
* do not show element server-side rendered to improve web vitals (CU-m15mty)
* elementor ready trigger is dispatched too early
* hide Refresh site on consent option as it is not needed (CU-m9dey3)
* load animate.css only when needed (CU-mddt99)
* show warning when accept essentials differs from accept all button type (CU-m1e0zn)


### revert

* disable MailPoet preset as it is not yet ready (https://git.io/JnqoX, CU-m3dtuf)





# 2.2.0 (2021-06-05)


### chore

* clearer differentiation of the plugin's benefits in wordpress.org description (CU-kbaequ)
* translate new cookie and content blocker presets (CU-kt7e5r, CU-kk8gvu, CU-k759kz)
* update Cloudflare service template (CU-ff6vzc)


### feat

* allow match elements by div[my-attribute-exists], div[class^="starts-with-value"] and div[class$="ends-with-value"] (CU-kt829t)
* new content blocker for WordPress login when using e.g. reCaptcha (CU-jqb6y0)
* new cookie and content blocker preset Awin Link and Image Ads (CU-k759kz)
* new cookie and content blocker preset Awin Publisher MasterTag (CU-k759kz)
* new cookie and content blocker preset ConvertKit (CU-kk8gvu)
* new cookie and content blocker preset GetYourGuide (CU-kt829t)
* new cookie and content blocker preset WP-Matomo Integration (former WP-Piwik, CU-kt7e5r)


### fix

* avoid duplicate execution of inline scripts when they take longer than 1 second
* block more JS code in content blocker of "Mailchimp for WooCommerce" template
* compatibility with 'Modern' admin style
* compatibility with Elementor PRO Video API / blocks (CU-kd5nne)
* compatibility with Elementor Video API for Vimeo and YouTube (CU-kd5nne)
* compatibility with Google Maps plugin by flippercode (CU-kn82nw)
* do anonymize localized variables in wp-login.php (CU-jqb6y0)
* do not allow creating a content blocker when you try to assign a cookie to essential group (CU-jqb6y0)
* do not apply content blocker in customizer preview
* page does not get reloaded automatically after consent on safari / iOS (CU-kt8q4n)
* use anti-ad-block system also in login page (CU-kh5jpd)
* use script tag with custom type declaration to be HTML markup compatible (head, CU-kt4njv)





# 2.1.0 (2021-05-25)


### chore

* compatibility with latest antd version
* introduce new developer filter RCB/Misc/ProUrlArgs (CU-jbayae)
* introduce new RCB/Hint section to add custom tiles to the right dashboard section (CU-jbayae)
* migarte loose mode to compiler assumptions
* own chunk for blocker vendors, but still share (CU-jhbuvd)
* polyfill setimmediate only if needed (CU-jh3czf)
* prettify code to new standard
* remove es6-promise polyfill (CU-jh3czn)
* remove whatwg-fetch polyfill (CU-jh3czg)
* revert update of typedoc@0.20.x as it does not support monorepos yet
* upgrade dependencies to latest minor version


### ci

* move type check to validate stage


### docs

* highlight that not all service templates are free in wordpress.org plugin description


### feat

* allow to block content in login page (e.g. using Google reCaptcha, CU-jqb6y0)
* new service and content blocker preset Sendinblue (CU-k3cf3r)
* new service and content blocker preset Xing Events (CU-k3cfab)


### fix

* allow visual parent by children selector (querySelector on blocked content, CU-k7601j)
* block new elements of Popup Maker in content blocker template
* compatibility with Astra theme oEmbed container (CU-k18eqe)
* compatibility with Dynamic Content for Elementor plugin (CU-k7601j)
* compatibility with elementor widgets when they are directly blocked (CU-k7601j)
* do not content block when elementor preview is active
* do not rely on install_plugins capability, instead use activate_plugins so GIT-synced WP instances work too (CU-k599a2)
* padding of content blocker parent got reset
* support for @font-face directive when blocking inline style (CU-k3cf3r)
* visual parent does not work for custom elementor blocker (CU-k7601j)
* when an inline script creates a new DOM element it is sometimes invisible (CU-k3cf3r)
* white screen when searching for duplicate content blockers


### refactor

* move compatibility code to own folder
* own function to override native addEventListener functionality
* style classes to functions for tree shaking (CU-jh75eg)


### revert

* own vendor bundle for blocker


### style

* pro dialog (CU-jbayae)


### test

* make window.fetch stubbable (CU-jh3cza)





## 2.0.3 (2021-05-14)


### fix

* customizer does not work when WP Fastest Cache is active (CU-jq9aua)
* multilingual plugins like Weglot and TranslatePress should show more options in Consent Forwarding setting





## 2.0.2 (2021-05-12)


### fix

* compatibility with PixelYourSite Facebook image tag (pixel)
* compatibility with WP Rocket lazy loading scripts (CU-jq4bhw)





## 2.0.1 (2021-05-11)


### docs

* update README typos


### fix

* new cookie presets are not visible for Weglot users (CU-hk3jfn)





# 2.0.0 (2021-05-11)


### build

* allow to patch scoped build artifact to fix unicode issues (CU-80ub8k)
* allow to set config name for yarn dev
* consume TCF CMP ID via environment variable (CU-h15h9f)
* own JS bundle for TCF banner and enqueue stub (CU-fk051q)
* update wordpress.org screenshot assets (CU-gf917p)
* wrong refernce to PSR-4 namespace


### chore

* add screenshots for TCF compatibility and Geo-restriction (CU-gf917p)
* core features description text (CU-gf7dnf)
* deactivate option to resepect Do Not Track by default (CU-gx1m76)
* increase minimum PHP version to 7.2 (CU-fh3qby)
* introduce new filter to disable setting the RCB cookie via RCB/SetCookie/Allow
* minimum required version of PHP is 7.2
* name cookie designs consistently (CU-g779gw)
* remove classnames as dependency
* rename "cookies" to "services" for consistent wording (CU-f571nh)
* sharp terms of buttons and labels in cookie banner
* update @iabtcf packages to >= 1.2.0 to support TCF 2.1 (CU-h539k3)
* update @iabtcf packages to stable version (CU-g977x9)
* update texts to be more informative about legal basis and print text for Consent Forwarding if active (respects also TCF global scope) (CU-cq1rka)
* use more normal style to be independent from formal/informal language (CU-f4ycka)


### docs

* wordpress.org description revised (CU-gf7dnf)


### feat

* add contrast ratio validator and call-to-action adjustments for TCF compatibility (CU-cq25hu)
* add GVL instance to all available banner contexts (CU-fjzcd8)
* allow to customize the text of the powered-by link (CU-f74d53)
* allow to define a list of countries to show only the banner to them e.g. only EU (Country Bypass, CU-80ub8k)
* allow to export and import TCF vendor configurations (CU-ff0yvh)
* allow to forward TCF consent with Consent Forwarding (CU-ff10cy)
* allow to reset all settings to default in Settings tab (CU-8extcg)
* automatically refresh GVL via button and periodically (CU-63ty1t)
* calculate suitable stacks and add them to revision (CU-fh0bx6)
* compatibility of TCF vendors with ePrivacy USA functionality (CU-h57u92)
* compatibility with TCF v2.1 (device storage disclosures, CU-h74vna)
* complement translations for English and German (CU-ex0u4a)
* completion of English and German translations (CU-ex0u4a)
* completion of English and German translations (CU-ex0u4a)
* contrast ratio warning for non-TCF users, opt-in cookie banner activation through popconfirm (CU-j78m3t)
* create content blockers for TCF vendor configurations (CU-gv58rr)
* download and normalize Global Vendor List for TCF compatibility (CU-63ty1t)
* eight new cookie banner presets (CU-g779gw)
* introduce Learn More links to different parts of the UI (CU-gv58rr)
* introduce new service field to allow opt-out based on legal basis (CU-ht2zwt)
* introduce origin of business entity field for TCF integration (CU-g53zgk)
* introduce revision for TCF vendors and declarations (CU-ff0zhy)
* introduce settings tab for TCF compatibility in Cookies > Settings (CU-cq29n2)
* introduce so-called Custom Bypass so developers can dynamically set a predecision and hide the banner automatically (e.g. Geolocation, CU-80ub8k)
* introduce UI to create a TCF vendor configuration and create TCF vendor configuration REST API (CU-crwq2r)
* introduce UI to edit a TCF vendor configuration (CU-crwq2r)
* native compatibility with preloading and defer scripts with caching plugins (CU-h75rh2)
* new cookie presets for Ezoic (CU-ch2rng)
* new customizer control to adjust the opacity of box shadow color (CU-cz1d9t)
* persist TCF strings for proof of consent and dispatch to CMP API (CU-ff0z49)
* properly replace non-javascript ad tags with current TC String (CU-ct1gfd)
* provide a migration wizard for v2 in the dashboard (CU-g75t1p)
* register new Custom Post Type for TCF vendor configurations (CU-crwq2r)
* show and allow to customize TCF stacks (CU-cq1rka)
* show TCF vendors and declarations (purposes, special purposes, ...) in second view of cookie banner (CU-ff0yvh)
* translate backend into German (CU-ex0u4a)
* translate frontend into German (CU-ex0u4a)
* when navigating to /tcf-vendors/new show a list of all available vendors (CU-crwq2r)


### fix

* add custom bypasses to the DnT stats pie chart (CU-gf4egf)
* add United Kingdom (GB) as default to Country Bypass list (CU-hz8rka)
* assign cookie groups and cookies to correct source language after adding a new language to WPML (CU-hz3a83)
* automatically clear page caches after license activation / deactivation (CU-jd7t87)
* automatically deactivate option to respect DnT header when activating TCF for the first time
* compatibility TCF and WPML / PolyLang
* compatibility with Customizer checkbox values and Redis Object Cache (CU-jd4662)
* cookie history could not be closed when no consent given
* do not output RCB settings as base64 encoded string (CU-gx8jkw)
* first review with Advanced Ads (Pro, CU-g9665t)
* localize stacks correctly and sort by score (CU-ff0zhy)
* make consentAPI available in head scripts
* make group description texts resettable (CU-gf3dew)
* notices thrown when no vendor given (CU-ff0yvh)
* output UUID on legal sites, too (CU-jha8xc)
* show vendor ID in list table of TCF vendors (CU-gf8h2g)
* show vendor list link for TCF banner in footer (CU-g977x9)
* the Lighthouse crawler is not a bot (CU-j575je)
* translate "legitimate interest" always with "Berechtigtes Interesse" (CU-ht31w2)
* translate footer text correctly for TranslatePress / Weglot (CU-ht82qm)
* usage with deferred scripts and content blocker (DOM waterfall, CU-gn4ng5)


### perf

* avoid catastrophal backtracing and speed up regular expression for inline scripts/styles by 90% (CU-j77a9g)
* combine vendor modules to a common chunk for both TCF and non-TCF
* introduce deferred and preloaded scripts for cookie banner (CU-gn4ng5)
* remove TCF CmpApi from non-TCF bundle


### refactor

* create wp-webpack package for WordPress packages and plugins
* introduce bundleAnalyzerOptions in development package
* introduce eslint-config package
* introduce new grunt workspaces package for monolithic usage
* introduce new package to validate composer licenses and generate disclaimer
* introduce new package to validate yarn licenses and generate disclaimer
* introduce new script to run-yarn-children commands
* make content blocker independent of custom post type
* make Vimeo and SoundCloud to Pro presets (CU-gf49yy)
* move build scripts to proper backend and WP package
* move jest scripts to proper backend and WP package
* move PHP Unit bootstrap file to @devowl-wp/utils package
* move PHPUnit and Cypress scripts to @devowl-wp/utils package
* move special blocker PHP classes in own namespace
* move technical doc scripts to proper WP and backend package
* move WP build process to @devowl-wp/utils
* move WP i18n scripts to @devowl-wp/utils
* move WP specific typescript config to @devowl-wp/wp-webpack package
* remove @devowl-wp/development package
* split stubs.php to individual plugins' package


### style

* improve Web Vitals by setting a fixed width / height for the logo (CU-j575je)
* refactor all banner presets (CU-fn68er)


### test

* fix failing smoke test for Real Cookie Banner Lite


### BREAKING CHANGE

* please upgrade your PHP version to >= 7.2





## 1.14.1 (2021-04-27)


### ci

* push plugin artifacts to GitLab Generic Packages registry (CU-hd6ef6)


### fix

* compatibility with Lite Speed Cache; white screen in customizer
* introduce new filter RCB/Blocker/InlineScript/AvoidBlockByLocalizedVariable and fix copmatibility with EmpowerWP/Mesmerize (CU-hb8v51)
* notice array_walk_recursive() expects parameter 1 to be array, integer given
* output buffer callback should be called always and cannot be removed by third parties


### refactor

* use shorter function to get cookie by name (CU-hv8ypq)


### revert

* output buffer callback should be called always and cannot be removed by third parties





# 1.14.0 (2021-04-15)


### chore

* translate new cookie and content blocker presets (CU-h158p2)


### feat

* new cookie and content blocker preset Metricool (CU-gz7ptb)
* new cookie and content blocker preset Popup Maker (CU-gt22gk)
* new cookie and content blocker preset RankMath Google Analytics (CU-gh4gcw)
* new cookie and content blocker preset Thrive Leads (CU-gh4qgh)


### fix

* allow to Add Media in banner description
* allow to extract blocked inline style to own style HTML block (CU-gk0d9a)
* allow to granular block urls in inline CSS (CU-gk0d9a)
* allow to set privacy policy URL per language (WPML, PolyLang, CU-gq33k2)
* avoid catasrophical backtrace when blocking an inline style (CU-gh964b)
* compatibility with LiteSpeed cache buffer
* compatibility with MailerLite content blocker and Thrive Archtiect page builder (CU-gh4hr5)
* compatibility with Ultimate Video (CU-fz6gxc)
* consentSync API returned the wrong found cookie when two cookies use same technical definitions - introduced relevance scoring
* usage with PolyLang with more than two languages and copy automatically to new languages (CU-gt3kam)





## 1.13.1 (2021-03-30)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





# 1.13.0 (2021-03-23)


### chore

* translate and register new presets (CU-fn1j8z, CU-c6vmwh)


### docs

* new compatibilities in wordpress.org description (CU-fk068g)


### feat

* new cookie and content blocker preset Bloom (CU-fn1j8z)
* new cookie and content blocker preset Typeform (CU-c6vmwh)


### fix

* calculate rendered height for banner footer to gain better edge smoothing
* compatibility of content blocker with TranslatePress and Weglot (CU-fz6gxc)
* compatibility with Ultimate Video (CU-fz6gxc)
* export of consents contained notices in some PHP environments (CU-ff0z49)
* show notice for frontend banner if no license is active (CU-fyzukg)
* use the correct permalinks in the banner footer (CU-e8x3em)





# 1.12.0 (2021-03-10)


### build

* plugin tested for WordPress 5.7 (CU-f4ydk2)


### chore

* register and translate new presets (CU-eyzegt, CU-f4yzpm)


### feat

* new cookie and content blocker preset Yandex Metrica (CU-f4yzpm)
* new cookie preset for Bing Ads (Microsoft UET) (CU-eyzegt)
* new cookie preset found.ee (CU-f97ady)


### fix

* more granular translation for TranslatePress for blockers, cookie group, cookies and banner texts





# 1.11.0 (2021-03-10)


### chore

* hide some notices on try.devowl.io (CU-f53trz)


### feat

* added ability to auto play videos if they got unblocked (Divi Page Builder, CU-f51p51)
* added ability to auto play videos if they got unblocked (JetElements for Elementor, CU-f51p51)
* autoplay YoutTube and Vimeo videos after unblocking through content blocker (CU-f558r1)


### fix

* compatibility with Combine JavaScript in WP Rocket (CU-f35k4j)
* compatibility with Divi videos (e.g. YouTube) when using an overlay
* compatibility with JetElements for Elementor Video Player (CU-f51p51)
* compatibility with lazy loaded scripts e.g. WP Rocket when they are present in the configuration list (CU-f35k4j)
* in some cases the blocked content was still display:none after unblocking (e.g. GTranslate, CU-f35k4j)





# 1.10.0 (2021-03-02)


### chore

* update german text for privacy settings history dialog title (CU-ev2070)


### feat

* allow to customize more texts for content blocker (CU-ev2070)
* new cookie preset (CU-ev6jyb)


### fix

* allow HTML formatting in content blocker accept info text (CU-ev2070)
* compatibility with Thrive Architect embeds
* compatibility with Thrive Archtitect Custom HTML block
* do not allow cookie duration greater than 365 (CU-cpyc46)
* do not override position:relative for content blocker





# 1.9.0 (2021-02-24)


### chore

* drop moment bundle where not needed (CU-e94pnh)
* introduce new JavaScript API window.consentApi.consentSync


### docs

* rename test drive to sanbox (#ef26y8)


### feat

* new cookie banner preset 'Ronny's Dialog'
* new customizer option in Body > Accept all Button > Align side by side (CU-cv0d8g)


### fix

* compatibility with X Theme and Cornerstone
* content blocker containers may also have an empty style
* content blocker for JetPack Site Stats too aggressive when using together with wordpress.com
* content blocking for Quform in some cases to aggressive (#ejxq3b)
* do not annonymously server when SCRIPT_DEBUG is active
* do not apply style to parent containers if no style was previously present
* do not show cookie banner when editing in Divi and Beaver Builder page builder
* illegal mix of collations (CU-ef1dtp)
* in some cases the original iframe was blocked, but not completely hidden
* when a profile deactivate syntax highlighting, the cookie form did not work (CU-en3mxa)





# 1.8.0 (2021-02-16)


### chore

* register and translate new cookie and content blocker presets
* show notice for Quform cause content blocker is not necessery (CU-cawja6)


### feat

* allow to apply content blockers to JSON output of e.g. REST services
* improve English translation (#devznm)
* new cookie and content blocker preset Issuu (CU-e14yht)
* new cookie and content blocker preset Pinterest Tag (CU-eb3wu9)
* new cookie and content blocker preset Quform (CU-cawja6)
* new cookie preset Klarna Checkout for WooCommerce (CU-e2z7u7)
* new cookie preset TranslatePress (CU-e14nf6)


### fix

* compatibility Instagram blocker with WoodMart theme
* compatibility with Elementor inline styles
* compatibility with TranslatePress (CU-cew7v9)
* do not block links without class and external URLs
* do not output calculated time for blocker when not requested; compatibility with Themebeez Toolkit
* show correct tooltip when Google / Matomo Tag Manager template can not be created (CU-e6xyc5)





## 1.7.3 (2021-02-05)


### docs

* update README to be compatible with Requires at least (CU-df2wb4)


### fix

* in some edge cases the wordpress autoupdater does not fire the wp action and dynamic javascript assets are not generated





## 1.7.2 (2021-02-05)


### chore

* show notice after one week when setup not yet completed (CU-djx8ga)


### fix

* deliver anonymous assets like JavaScripts files correctly (CU-dgz2p9)
* remove anonymous javascript files on uninstall (CU-dgz2p9)





## 1.7.1 (2021-02-02)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





# 1.7.0 (2021-02-02)


### chore

* allow to edit custom post types and taxnomies to be edited via native UI for debug purposes
* remove limit for cookies and content blockers (CU-d6z2u6)


### docs

* improved product description for wordpress.org (#d6z2u6)


### feat

* new cookie and content blocker preset MailerLite (CU-d10rw9)
* new cookie preset CleanTalk Spam Protection (CU-d93t70)
* new cookie preset WordFence (CU-dcyv72)


### fix

* allow to block inline styles by URL (CU-d10rw9)
* compatibility with Custom Facebook Feed Pro v3.18 (CU-cwx3bn)
* compatibility with FooBox lightbox (CU-dczh1k)
* compatibility with TranslatePress to avoid flickering (CU-dd4a3q)
* compatibility with Uncode Google Maps block (CU-d12m5q)
* content blocker should also execute window 'load' event after unblock (CU-d12m5q)
* do correctly find duplicate content blockers and avoid them (CU-d10rw9)
* do not block twice for custom element blockers (CU-d10rw9)
* translated page in footer is not shown in PolyLang correctly (CU-d6wumw)





# 1.6.0 (2021-01-24)


### chore

* register new cookie and content blockers and update README (CU-cwx3bn)


### feat

* allow to make customizer fields resettable with a button (CU-crwyqn)
* new banner preset in customizer 'Clean Dialog'
* new content blocker preset CleverReach with Google Recaptcha (CU-cryuv0)
* new cookie and content blocker preset Custom Twitter Feeds (Tweets Widget) (CU-cwx3bn)
* new cookie and content blocker preset Feeds for YouTube (CU-cwx3bn)
* new cookie and content blocker preset FontAwesome (CU-cx067u)
* new cookie and content blocker preset Smash Balloon Social Post Feed (CU-cwx3bn)
* preset extends middleware now supports extendsStart and extendsEnd for array properties (CU-cwx3bn)


### fix

* allow all URLs for affiliates in PRO version (CU-cyyh2z)
* compatibility with CloudFlare caches; nonce is no longer needed as we have rate limit in public APIs (CU-cwvke2)
* compatibility with Impreza lazy loading grid (CU-94w719)
* improve UX when creating Content Blocker and open the Add-Cookie form in a modal instead of new tab (CU-cz12vj)
* review 1 (CU-cz12vj)
* wrong character encoding for VG Wort preset


### refactor

* remove unused classes and methods


### revert

* always show recommened cookies in content blocker select (CU-cwx3bn)


### style

* do not break line in cookie preset selector description
* use flexbox instead of usual containers for banner buttons (CU-cv0ff2)





# 1.5.0 (2021-01-18)


### chore

* introduce new developer filters RCB/Blocker/KeepAttributes and RCB/Blocker/VisualParent (CU-cn0wvd)
* new Consent API function consentApi.consent() and consentApi.consentAll() to wait for consent
* presets can no be extended by a parent class definition
* register new cookie and content blockers and update README (CU-cewwda)
* translate new presets, update README


### feat

* new content blocker preset Google Analytics (CU-cewwda)
* new cookie and content blocker preset Analytify (CU-cewwda)
* new cookie and content blocker preset ExactMetrics (CU-cewwda)
* new cookie and content blocker preset Facebook For WooCommerce (CU-cewwda)
* new cookie and content blocker preset GA Google Analytics (CU-cewwda)
* new cookie and content blocker preset Mailchimp for WooCommerce (CU-cn234z)
* new cookie and content blocker preset Matomo WordPress plugin (CU-ch3etd)
* new cookie and content blocker preset MonsterInsights (CU-cewwda)
* new cookie and content blocker preset WooCommerce Google Analytics Integration (CU-cewwda)
* new cookie preset Lucky Orange (CU-ccwj8v)
* new cookie preset WooCommerce Stripe (CU-cn232u)
* recommend MonsterInsights content blocker in Google Analytics cookie preset (CU-cewwda)


### fix

* automatically invalidate preset cache after any plugin activated / deactivated
* compatibility with FloThemes embed codes and blocks (CU-cn0wvd)
* do not show footer links when label is empty (CU-cjwyqw)
* do not show hidden or disabled content blocker presets in cookie form
* extended presets can disable technical handling through compatible plugin (CU-cewwda)
* footer not shown when imprint empty in PRO version
* include description in preset search index
* overcompressed logo
* review 1 (CU-cewwda)


### refactor

* presets gets more and more complex, let's simplify with a middleware system


### style

* gray out disabled cookie and content blocker presets
* gray out plugin-specific cookie and content blocker presets
* show a tooltip when a preset is currently disabled





## 1.4.2 (2021-01-11)


### fix

* in some edge cases WP Rocket does blockage twice (CU-ccvvdn)





## 1.4.1 (2021-01-11)


### fix

* hotfix to make presets available again





# 1.4.0 (2021-01-11)


### build

* reduce javascript bundle size by using babel runtime correctly with webpack / babel-loader


### chore

* translate new cookie and blocker presets and register
* **release :** publish [ci skip]
* **release :** publish [ci skip]


### ci

* automatically activate PRO version in review application (CU-hatpe6)


### docs

* update README (CU-bevae9)


### feat

* new cookie and content blocker preset ActiveCampaign forms and site tracking (CU-bh04kz)
* new cookie and content blocker preset Discord (CU-c6vmgg)
* new cookie and content blocker preset MyFonts.net (CU-cawhga)
* new cookie and content blocker preset Proven Expert (Widget) (CU-cawhfp)
* new cookie preset Elementor (CU-cawhdk)
* new cookie preset Mouseflow (CU-cawj3n)
* new cookie preset Userlike (CU-cawhr3)


### fix

* apply gzip compression on the fly to the anti-ad-block system (CU-bx0am1)
* compatibility with All In One WP Security & Firewall (CU-bh08zp)
* compatibility with Facebook for WooCommerce plugin (CU-bwwwrt)
* compatibility with Meks Easy Photo Feed Widget Instagram feed (CU-bx0wd7)
* compatibility with Oxygen page builder
* compatibility with video and audio shortcode (CU-bt21kd)
* compatibility with youtu.be domain in YouTube content blocker preset (CU-bt21hp)
* compatiblity with WP Rocket lazy loading inline scripts (CU-bwwwrt)
* compatiblity with WP Rocket lazy loading YouTube videos (CU-byw6ua)
* content blocker for video and audio tags in some edge cases
* cookie preset selector busy indicator (CU-a8x3j0)
* generate dependency map for translations
* jquery issue when not in use (jQuery is now optional for RCB)
* use correct stubs for PolyLang


### perf

* preset PHP classes are only loaded when needed (CU-a8x3j0)
* speed up caching of presets (CU-a8x3j0)


### style

* input text fields in config page (CU-a8x3j0)





# 1.3.0 (2020-12-15)


### chore

* introduce custom powered-by link in PRO version (CU-b8wzqu)


### feat

* introduce rcb-consent-print-uuid shortcode (CU-bateay)
* new cookie and content blocker preset AddThis (CU-beva7q)
* new cookie and content blocker preset AddToAny (CU-beva7q)
* new cookie and content blocker preset Anchor.fm (CU-beva7q)
* new cookie and content blocker preset Apple Music (CU-beva7q)
* new cookie and content blocker preset Bing Maps (CU-beva7q)
* new cookie and content blocker preset reddit (CU-beva7q)
* new cookie and content blocker preset Spotify (CU-beva7q)
* new cookie and content blocker preset TikTok (CU-beva7q)
* new cookie and content blocker preset WordPress Emojis (CU-beva7q)


### fix

* block sandbox attribute for iframes (CU-beva7q)
* compatibility with WP External Links icon in banner and blocker footer (CU-bew81p)
* dashboard in lite version scrolls automatically to bottom (CU-bez8qn)
* list of consents does not expand if not initially saved settings once before
* memory error while reading the consent list (CU-9yzhrr)
* show ePrivacy and age notice even without description in visual content blocker (CU-beurgy)


### refactor

* introduce code splitting to reduce config page JavaScript assets (CU-b10ahe)





## 1.2.4 (2020-12-10)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.2.3 (2020-12-09)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.2.2 (2020-12-09)


### build

* use correct pro folders in build folder (CU-5ymbqn)


### chore

* update to cypress v6 (CU-7gmaxc)
* update to webpack v5 (CU-4akvz6)
* updates typings and min. Node.js and Yarn version (CU-9rq9c7)


### fix

* anonymous localized script settings to avoid incompatibility with WP Rocket lazy execution (CU-b4rp51)
* automatically deactivate lite version when installing pro version (CU-5ymbqn)
* compatibility with WP External Links (CU-b8w6yv)
* validate cookie host according to RFC 1123 instead of RFC 952 (CU-b31nf0)


### test

* smoke tests for Real Cookie Banner PRO





## 1.2.1 (2020-12-05)


### fix

* sometimes the privacy and imprint link are not correctly redirected (CU-b2x8wp)





# 1.2.0 (2020-12-01)


### chore

* translate new presets
* update dependencies (CU-3cj43t)
* update major dependencies (CU-3cj43t)
* update to composer v2 (CU-4akvjg)
* update to core-js@3 (CU-3cj43t)
* update to TypeScript 4.1 (CU-3cj43t)


### feat

* new cookie preset Zoho Forms and Zoho Bookings (CU-awy9wa)


### refactor

* enforce explicit-member-accessibility (CU-a6w5bv)





## 1.1.3 (2020-11-26)


### fix

* compatibility with WebFontLoader for Google Fonts and Adobe Typekit (CU-aq01tu)
* never block codeOnPageLoad scripts of cookies (introduce consent-skip-blocker HTML attribute, CU-aq01tu)





## 1.1.2 (2020-11-25)


### fix

* code on page load should be execute inside head-tag (CU-aq01tu)
* consent does not get saved in development websites (CU-aq0tbk)
* wrong link to consent forwarding in german WordPress installation





## 1.1.1 (2020-11-24)


### fix

* compatibility with RankMath SEO
* do not block content in beaver builder edit mode (CU-agzcrp)
* do not output rcb calc time in json content type responses (Beaver Builder compatibility, CU-agzcrp)





# 1.1.0 (2020-11-24)


### docs

* add MS Clarity in README


### feat

* new cookie preset Google Trends (CU-ajrchu)
* new cookie preset Microsoft Clarity (#a8rv4x)


### fix

* allow document.write for unblocked scripts (#ajrchu)
* compatibility with upcoming WordPress 5.6 (CU-amzjdz)
* decode HTML entities in content blocker scripts, e.g. old Google Trends embed (#ajrchu)
* ensure banner overlay is always a children of document.body (CU-agz6u3)
* ensure banner overlay is always a children of document.body (CU-agz6u3)
* modify Google Trends to work with older embed codes (CU-ajrchu)
* modify max index length for MySQL 5.6 databases so all database tables get created (CU-agzcrp)
* multiple content blockers should be inside a blocking wrapper (CU-ajrchu)
* order with multiple content blocker scripts (#ajrchu)
* typo in german translation (CU-agzcrp)
* update Jetpack Site Stats and Comments content blocker (CU-amr3f1)
* use no-store caching for WP REST API calls to avoid issues with browsers and CloudFlare (CU-agzcrp)
* using multiple ads with Google Adsense (CU-ajrcn2)
* wrong cookie count for first time usage in dashboard (CU-agzcrp)





## 1.0.4 (2020-11-19)

**Note:** This package (@devowl-wp/real-cookie-banner) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.0.3 (2020-11-18)


### fix

* add Divi maps block to Google Maps content blocker
* banner not shown up in Happy Wedding Day theme
* compatibility with Divi Maps block





## 1.0.2 (2020-11-17)


### fix

* do not show licensing tab in free test drive (#acypm6)





## 1.0.1 (2020-11-17)


### ci

* wrong license.devowl.io package.json


### docs

* wordpress.org README


### fix

* remove unnecessary dependency (composer) package (#acwy1g)





# 1.0.0 (2020-11-17)


### chore

* initial release (#4rruvq)


### test

* fix lite version smoke tests
* fix smoke test
* fix smoke tests for lite version
* fix typo in lite smoke test


* chore!: remove early access notice for newer updates (#4rruvq)
* feat!: use new license server (#4rruvq)
* ci!: release free version to wordpress.org automatically (#4rruvq)


### BREAKING CHANGE

* we are live!
* if you were a early access user, please upgrade to the initial version
* you need to enter your license key again to get automatic updates
* download initial version now here: https://wordpress.org/plugins/real-cookie-banner
