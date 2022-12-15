# Change Log

All notable changes to this project will be documented in this file.
See [Conventional Commits](https://conventionalcommits.org) for commit guidelines.

## 1.12.25 (2022-12-12)


### fix

* allow absolute wpApiSettings.root without host (CU-382pbvy)
* do not show REST API notice when offline, hide when route works again and trace log in textarea (CU-37q9evr)





## 1.12.24 (2022-11-18)


### fix

* false-positive REST API notice about real-queue/v1 (CU-33tce0y)
* false-positive REST API notice about real-queue/v1 in firefox (CU-33tce0y)


### refactor

* rename handleCorruptRestApi function (CU-33tce0y)





## 1.12.23 (2022-11-15)


### fix

* use POST method to recreate new nonce instead of GET to avoid CDN cache issues (CU-33dwm27)





## 1.12.22 (2022-11-09)


### fix

* show corrupt-REST-API-notice also for network-specific errors like active ad-blockers (CU-332eevg)


### refactor

* improved compatibility with PHP 8.1 (CU-1y7vqm6)
* static trait access (Assets enqueue features, CU-1y7vqm6)
* static trait access (Assets handles, CU-1y7vqm6)
* static trait access (Assets types, CU-1y7vqm6)
* static trait access (Localization i18n public folder, CU-1y7vqm6)
* static trait access (Localization, CU-1y7vqm6)
* static trait access (PluginReceiver class constants, CU-1y7vqm6)
* static trait access (PluginReceiver, CU-1y7vqm6)





## 1.12.21 (2022-10-31)


### chore

* add WP REST API Controller as REST-blocker plugin in notice (CU-32h6uzz)





## 1.12.20 (2022-10-25)


### fix

* correctly parse 204 No Content response type without error (CU-31evrq5)





## 1.12.19 (2022-10-11)


### build

* add webpack as dependency to make it compatible with PNPM (CU-3rmk7b)


### chore

* introduce consistent type checking for all TypeScript files (CU-2eap113)
* prepare script management for self-hosted Gitlab migrations (CU-2yt2948)
* start introducing common webpack config for frontends (CU-2eap113)
* switch from yarn to pnpm (CU-3rmk7b)


### ci

* correctly detect when files should be staged in postversion lifecycle event when releasing (CU-30cg3q4)


### fix

* broken built URLs when using location' path with query arguments (CU-313en7w)
* compatibility with LiteSpeed delay JS functionality (CU-313j15z)





## 1.12.18 (2022-09-21)


### fix

* cmpatibility with WP Rocket and anonymous localized scripts when Delay JS is active (CU-2znjn1p)
* compatibility with WP Fastest Cache, eliminate render-blocking and anonymous scripts (CU-2znjn1p)





## 1.12.17 (2022-09-21)


### fix

* cookie banner not visible with WP Fastest Cache and LiteSpeed Defer JS option (CU-2znjn1p)





## 1.12.16 (2022-09-20)


### refactor

* false-positive of malware scanner, refactor localized variable to valid text/plain variables (CU-2zabfnw)





## 1.12.15 (2022-09-06)


### fix

* url builder did not work when overriding query parameters (CU-2wmg9xv)





## 1.12.14 (2022-08-29)


### chore

* introduce devowl-scripts binary (CU-2n41u7h)
* introduce for non-flat node_modules development experience (CU-2n41u7h)
* prepare packages for PNPM isolated module mode (CU-2n41u7h)
* reduce bundle size by removing some vendor files (CU-2d8dedh)


### fix

* caching issues with consent history dialog (CU-2vqu2gd)


### perf

* drop IE support completely (CU-f72yna)
* permit process.env destructuring to save kb in bundle size (CU-f72yna)


### refactor

* use browsers URL implementation instead of url-parse (CU-f72yna)





## 1.12.13 (2022-08-09)


### fix

* do not defer stylesheets as this is not valid HTML (CU-2rwa0c3)





## 1.12.12 (2022-06-13)


### chore

* update Stable tag in README.txt to current plugin version (CU-2kat97y)





## 1.12.11 (2022-06-08)


### fix

* do not create license instances too early (CU-2gfcmjv)





## 1.12.10 (2022-04-29)


### fix

* link preload's need to be self-closing (CU-2cwz5v4)





## 1.12.9 (2022-04-20)


### chore

* code refactoring and calculate monorepo package folders where possible (CU-2386z38)
* remove React and React DOM local copies and rely on WordPress version (CU-awv3bv)


### ci

* make build wp package jobs more generic without wp (CU-22h231w)


### refactor

* extract composer dev dependencies to their corresponding dev package (CU-22h231w)
* put composer license packages to @devowl-wp/composer-licenses (CU-22h231w)
* remove PHPUnit and PHPCS from @devowl-wp/utils completely (CU-22h231w)
* rename wordpress-packages and wordpress-plugins folder (CU-22h231w)
* revert empty commits for package folder rename (CU-22h231w)
* use phpunit-config and phpcs-config in all PHP packages (CU-22h231w)





## 1.12.8 (2022-03-15)


### chore

* do not rely on compose mounted volume to determine local env (CU-1zvg32c)
* grunt task to build install files for composer should be more generic (CU-1zvg32c)


### fix

* sometimes the wordpress admin dashboard was unresponsive and caused high CPU load





## 1.12.7 (2022-03-01)


### ci

* use Traefik and Let's Encrypt in development environment (CU-1vxh681)


### fix

* do migrations also for prerelease versions (CU-1ydq6ff)
* warning about open base dir





## 1.12.6 (2022-02-11)


### style

* sometimes the WP REST API notice was shown in plugin settings pages (WP External Links)





## 1.12.5 (2022-01-31)


### fix

* provide _dataLocale parameter to all our REST API requests to be compatible with PolyLang / WPML (CU-1vqym25)
* unify enqueue_scripts hooks to be compatible with AffiliateTheme (CU-1xpm56k)





## 1.12.4 (2022-01-25)

**Note:** This package (@devowl-wp/utils) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.12.3 (2022-01-17)


### build

* create cachebuster files only when needed, not in dev env (CU-1z46xp8)
* improve build and CI performance by 50% by using @devowl-wp/regexp-translation-extractor (CU-1z46xp8)
* remove webpack assets before building the plugin itself to avoid outdated files


### chore

* reduce bundle size by removing unnecessary POT and PO files for frontend (CU-1z46xp8)


### fix

* reorder arguments for _nx function to be compatible with @devowl-wp/regexp-translation-extractor (CU-1z46xp8)
* use new chunk map generation and remove the old one (CU-1z46xp8)


### refactor

* use webpack plugin instead of grunt task to create dependency-map.json


### test

* compatibility with Xdebug 3 (CU-1z46xp8)





## 1.12.2 (2021-12-21)


### fix

* clean local language folder for production build (CU-1vc3ya0)





## 1.12.1 (2021-12-15)


### build

* copy JavaScript libraries for Webpack plugin build (CU-1wzqjg7)


### fix

* compatibility with latest WordPress 5.9 beta version (https://git.io/JDL3e, CU-1wzt14u)
* compatibility with Requests v2.0 (CU-1wzt14u)





# 1.12.0 (2021-12-01)


### feat

* introduce formal german translations (CU-1n9qnvz)


### fix

* compatibility with latest Requestes library of WordPress 5.9 (CU-1vc94eh)





## 1.11.4 (2021-11-18)


### fix

* automatically refresh rest nonce if it got invalid (CU-8cu90g)
* compatibility with wordpress.com private sites (CU-1td2p11)





## 1.11.3 (2021-11-11)


### chore

* remove not-finished translations from feature branches to avoid huge ZIP size (CU-1rgn5h3)





## 1.11.2 (2021-11-03)

**Note:** This package (@devowl-wp/utils) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.11.1 (2021-10-12)


### chore

* always pull translations from remote repository
* translate plugin meta data correctly (plugin description, ..., CU-1kvxtge)


### fix

* use correct user locale for REST API requests in admin area when different from blog language (CU-1k51hkh)





# 1.11.0 (2021-09-30)


### build

* allow to define allowed locales to make release management possible (CU-1257b2b)
* copy files for i18n so we can drop override hooks and get performance boost (CU-wtt3hy)
* dependency map also gets generated even languages folder does not exist
* do not build development and production webpack concurrently to avoid OOM
* finalize mojito import, push and pull (CU-f94bdr)
* revert version in package.json to keep webpack cache intact (CU-qtd0c9)


### chore

* initial commit for @devowl-wp/grunt-mojito
* introduce weblate as continuous localization platform (CU-f94bdr)
* make build of plugins work together with Composer InstalledVersions fix
* no longer generate i18n files while development
* prepare for continuous localization with weblate (CU-f94bdr)
* refactor texts to use ellipses instead of ... (CU-f94bdr)
* remove language files from repository (CU-f94bdr)


### ci

* introduce continuous localization (CU-f94bdr)
* make continuous localization cache depending on current branch name (CU-1257b2b)


### feat

* translation into Russian (CU-10hyfnv)


### fix

* cache busting chunk translation files in frontend (CU-f94bdr)
* correctly load translation file from frontend folder (CU-wtt3hy)


### perf

* introduce un-prerelease mechanism instead of building the whole plugin again (CU-11eb54a)
* remove translation overrides in preference of language files (CU-wtt3hy)


### refactor

* grunt-mojito to abstract grunt-continuous-localization package (CU-f94bdr)
* introduce @devowl-wp/continuous-integration
* introduce new command with execa instead of own exec implementation





## 1.10.10 (2021-08-31)


### build

* generate i18n files correctly for bundled WP packages


### fix

* allow composer-patches for plugins (CU-wkuq39)





## 1.10.9 (2021-08-20)


### build

* introduce new grunt script to update all composer packages across monorepo
* scope composer files more accurate


### fix

* error Composer InstalledVersions class was declared twice and lead to fatal error (CU-w8kvcq)





## 1.10.8 (2021-08-10)


### chore

* translations into German (CU-pb8dpn)


### fix

* review 1 (CU-mtdp7v, CU-n1f1xc)
* review 2 (CU-7mvhak)
* review 3 (CU-7mvhak)





## 1.10.7 (2021-08-05)


### fix

* mixed languages in cookie settings dashboard when using formal germany language (CU-pzazqj9)





## 1.10.6 (2021-07-16)


### fix

* avoid to check for absolute pathes in Localization overwrites to avoid open_basedir issues (CU-nnff7m)





## 1.10.5 (2021-06-05)


### fix

* use priority language files over wp-content/languages (CU-ktatf6)





## 1.10.4 (2021-05-25)


### chore

* enqueue wp-polyfill for our utils; until we drop support for IE (CU-jh3cza)
* migarte loose mode to compiler assumptions
* polyfill setimmediate only if needed (CU-jh3czf)
* prettify code to new standard
* remove whatwg-fetch polyfill (CU-jh3czg)
* revert update of typedoc@0.20.x as it does not support monorepos yet
* update cypress@7
* update dependencies for safe major version bumps
* update immer@9
* upgrade dependencies to latest minor version





## 1.10.3 (2021-05-14)


### fix

* compatibility with Perfmatters users when delay JS is active (CU-jq8hzf)





## 1.10.2 (2021-05-12)


### fix

* compatibility with WP Rocket new DeferJS method since v3.9 (CU-jq4bhw)





## 1.10.1 (2021-05-11)


### fix

* automatically refetch announcments for updates (CU-jn95nz)
* **hotfix :** translations are not correctly updated (CU-jf8acx)





# 1.10.0 (2021-05-11)


### chore

* remove classnames as dependency
* **release :** publish [ci skip]


### feat

* native compatibility with preloading and defer scripts with caching plugins (CU-h75rh2)
* save previous versions of installed plugin in database for migrations (CU-g75t1p)


### fix

* allow to defer loading MobX and run configuration correctly (CU-j575je)
* compatibility with wp-json-less URLs and plain permalink settings (CU-j93mr8)
* do not output RCB settings as base64 encoded string (CU-gx8jkw)
* use updated link in REST API notice when not reachable


### perf

* introduce deferred and preloaded scripts for cookie banner (CU-gn4ng5)


### refactor

* create wp-webpack package for WordPress packages and plugins
* introduce eslint-config package
* introduce new grunt workspaces package for monolithic usage
* introduce new package to validate composer licenses and generate disclaimer
* introduce new package to validate yarn licenses and generate disclaimer
* introduce new script to run-yarn-children commands
* move build scripts to proper backend and WP package
* move jest scripts to proper backend and WP package
* move PHP CodeSniffer configuration to @devowl-wp/utils
* move PHP Unit bootstrap file to @devowl-wp/utils package
* move PHPUnit and Cypress scripts to @devowl-wp/utils package
* move technical doc scripts to proper WP and backend package
* move WP build process to @devowl-wp/utils
* move WP i18n scripts to @devowl-wp/utils
* move WP specific typescript config to @devowl-wp/wp-webpack package
* remove @devowl-wp/development package





## 1.9.4 (2021-03-23)


### fix

* add password-protected plugin as security plugin which blocks REST API (CU-g14ub7)





## 1.9.3 (2021-03-02)


### chore

* **release :** publish [ci skip]
* **release :** publish [ci skip]


### fix

* no longer markup plugin to avoid issues with quotes (wptexturize)


### test

* update tests for wptexturize bugfix





## 1.9.2 (2021-01-24)


### fix

* make restNonce option optional for public APIs (CU-cwvke2)





## 1.9.1 (2021-01-11)


### build

* reduce javascript bundle size by using babel runtime correctly with webpack / babel-loader


### chore

* **release :** publish [ci skip]


### fix

* caching issues with new versions in settings page
* compatibility with combine JS in newest WP Rocket update (CU-c11w2c)
* generate dependency map for translations
* wrong language for duplicated cookie when using PolyLang default language in admin dashboard





# 1.9.0 (2020-12-15)


### feat

* introduce code splitting with chunked translations (CU-b10ahe)





## 1.8.1 (2020-12-10)


### chore

* export sprintf as i18n method





# 1.8.0 (2020-12-09)


### feat

* more customizable multipart requests (CU-80q24e)





# 1.7.0 (2020-12-09)


### chore

* update to webpack v5 (CU-4akvz6)
* updates typings and min. Node.js and Yarn version (CU-9rq9c7)
* **release :** publish [ci skip]


### feat

* allow uploading files via commonRequest (CU-80q24e)
* introduce code splitting functionality to plugins (CU-b10ahe)


### fix

* anonymous localized script settings to avoid incompatibility with WP Rocket lazy execution (CU-b4rp51)





## 1.6.3 (2020-12-01)


### chore

* update dependencies (CU-3cj43t)
* update to composer v2 (CU-4akvjg)
* update to core-js@3 (CU-3cj43t)
* **release :** publish [ci skip]


### refactor

* enforce explicit-member-accessibility (CU-a6w5bv)





## 1.6.2 (2020-11-24)


### fix

* modify max index length for MySQL 5.6 databases so all database tables get created (CU-agzcrp)
* use no-store caching for WP REST API calls to avoid issues with browsers and CloudFlare (CU-agzcrp)





## 1.6.1 (2020-11-12)


### fix

* allow DELETE and PUT verbs to get empty response





# 1.6.0 (2020-10-23)


### feat

* add function getExternalContainerUrl to get backend URLs for frontend
* route PATCH PaddleIncompleteOrder (#8ywfdu)


### fix

* correctly detect usage of _method parameter


### refactor

* use "import type" instead of "import"





# 1.5.0 (2020-10-16)


### chore

* rename folder name (#94xp4g)


### feat

* announcements (#8cxk67)





## 1.4.7 (2020-10-09)


### fix

* delete requests to REST API does no longer set Content-Type (#90vkd5)





## 1.4.6 (2020-10-08)


### chore

* **release :** version bump





## 1.4.5 (2020-09-29)


### build

* backend pot files and JSON generation conflict-resistent (#6utk9n)


### chore

* introduce development package (#6utk9n)
* move backend files to development package (#6utk9n)
* move grunt to common package (#6utk9n)
* move packages to development package
* move packages to development package (#6utk9n)
* move some files to development package (#6utk9n)
* prepare package grunt scripts (#6utk9n)
* update dependencies (#3cj43t)





## 1.4.4 (2020-09-22)


### fix

* do not use encodeURIComponent as it is supported by url-parse by default
* import settings (#82rk4n)
* truncate -lite and -pro from REST service (#82rgxu)





## 1.4.3 (2020-08-26)


### ci

* install container volume with unique name (#7gmuaa)


### perf

* remove transients and introduce expire options for better performance (#7cqdzj)


### test

* fix ExpireOptionTest::testSet





## 1.4.2 (2020-08-17)


### ci

* prefer dist in composer install





## 1.4.1 (2020-08-11)


### chore

* backends for monorepo introduced





# 1.4.0 (2020-07-30)


### feat

* introduce dashboard with assistant (#68k9ny)
* WordPress 5.5 compatibility (#6gqcm8)





# 1.3.0 (2020-07-02)


### chore

* allow to define allowed licenses in root package.json (#68jvq7)
* update dependencies (#3cj43t)


### feat

* use window.fetch with polyfill instead of jquery (#5whc2c)





# 1.2.0 (2020-06-17)


### feat

* email input (with privacy checkbox) (#5ymj7f), 'none' option (#5ymhx1), reason note required (#5ymhjt)





# 1.1.0 (2020-06-12)


### chore

* i18n update (#5ut991)


### ci

* use hot cache and node-gitlab-ci (#54r34g)


### feat

* add abstract post and category REST model (#5phrh4)





## 1.0.8 (2020-05-20)


### chore

* move plugin/rcb branch to develop


### fix

* add PATCH to available HTTP methods (#5cjaau)
* remove ~ due to G6 blacklist filtering (security plugins, #5cqdn0)





## 1.0.7 (2020-05-12)


### build

* cleanup temporary i18n files correctly


### fix

* correctly enqueue dependencies (#52jf92)
* improvement speed up in admin dashboard (#52gj39)
* install database tables after reactivate plugin (#52k7f1)
* use correct assets class





## 1.0.6 (2020-04-27)


### chore

* add hook_suffix to enqueue_scripts_and_styles function (#4ujzx0)
* **release :** publish [ci skip]


### fix

* cronjob URL not working with plain permalink setting (#4pmk26, #4ar47j)





## 1.0.5 (2020-04-16)


### build

* move test namespaces to composer autoload-dev (#4jnk84)
* optional clean:webpackDevBundles grunt task to remove dev bundles in build artifact (#4jjq0u)
* scope PHP vendor dependencies (#4jnk84)


### chore

* create real-ad package to introduce more UX after installing the plugin (#1aewyf)
* rename real-ad to real-utils (#4jpg5f)


### ci

* correctly build i18n frontend files (#4jjq0u)
* run package jobs also on devops changes


### docs

* broken links in developer documentation (#5yg1cf)


### style

* reformat php codebase (#4gg05b)


### test

* fix typo in test files





## 1.0.4 (2020-03-31)


### chore

* update dependencies (#3cj43t)
* **release :** publish [ci skip]
* **release :** publish [ci skip]
* **release :** publish [ci skip]
* **release :** publish [ci skip]


### ci

* use concurrency 1 in yarn disclaimer generation


### test

* configure jest setupFiles correctly with enzyme and clearMocks (#4akeab)
* generate test reports (#4cg6tp)





## 1.0.3 (2020-03-05)


### build

* chunk vendor libraries (#3wkvfe) and update antd@4 (#3wnntb)


### chore

* update dependencies (webpack, types)
* **release :** publish [ci skip]





## 1.0.2 (2020-02-26)


### build

* migrate real-thumbnail-generator to monorepo


### fix

* usage of React while using Divi in dev environment (WP_DEBUG, #3rfqjk)
* use own wp_set_script_translations to make it compatible with deferred scripts (#3mjh0e)





## 1.0.1 (2020-02-13)


### fix

* do not load script translations for libraries (#3mjh0e)
