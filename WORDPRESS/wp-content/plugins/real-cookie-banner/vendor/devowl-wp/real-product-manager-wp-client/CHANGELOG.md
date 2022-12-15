# Change Log

All notable changes to this project will be documented in this file.
See [Conventional Commits](https://conventionalcommits.org) for commit guidelines.

# 1.14.0 (2022-12-12)


### chore

* review 1 (CU-aux3m0)


### feat

* allow to deactivate license in deactiation feedback modal dialog (CU-aux3m0)





## 1.13.18 (2022-12-02)


### fix

* do not send empty telemetry data (CU-37hc4hh)
* do not send telemetry data after deactivation of license (CU-37hc4hh)
* log invalid map data in telemetry job and map empty strings to correct bool zero string (CU-37hc4hh)





## 1.13.17 (2022-12-01)


### chore

* adjust telemetry data collection (CU-2ufnyc2)
* execute deferred telemetry data transmit (CU-2ufnyc2)


### fix

* decouple license activation from plugin update mechanism (CU-2ufrate)
* do not automatically deactivate license for compute.amazonaws.com (CU-30ch2z7)





## 1.13.16 (2022-11-18)

**Note:** This package (@devowl-wp/real-product-manager-wp-client) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.13.15 (2022-11-15)


### fix

* add a button to enter PRO license and redirct to kb-article in free version (CU-30db841)
* force to use option home_url and siteurl instead of constants when within subdomain MU (CU-33khexz)





## 1.13.14 (2022-11-09)


### refactor

* static trait access (setupConstants, CU-1y7vqm6)





## 1.13.13 (2022-10-31)

**Note:** This package (@devowl-wp/real-product-manager-wp-client) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.13.12 (2022-10-25)


### fix

* license activation error 'Client property value is Emty' (CU-31zz2mk)





## 1.13.11 (2022-10-11)


### build

* add webpack as dependency to make it compatible with PNPM (CU-3rmk7b)


### chore

* introduce consistent type checking for all TypeScript files (CU-2eap113)
* prepare script management for self-hosted Gitlab migrations (CU-2yt2948)
* rebase conflicts (CU-2eap113)
* start introducing common webpack config for frontends (CU-2eap113)


### fix

* do not automatically deactivate license for compute-amazonaws.com (CU-30ch2z7)
* do not show hint about missing license activation when license is active (CU-2znup7h)





## 1.13.10 (2022-09-21)

**Note:** This package (@devowl-wp/real-product-manager-wp-client) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.13.9 (2022-09-21)

**Note:** This package (@devowl-wp/real-product-manager-wp-client) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.13.8 (2022-09-20)

**Note:** This package (@devowl-wp/real-product-manager-wp-client) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.13.7 (2022-09-16)


### fix

* do not validate new host when request gets redirected (CU-2z4dheb)





## 1.13.6 (2022-09-06)

**Note:** This package (@devowl-wp/real-product-manager-wp-client) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.13.5 (2022-08-29)


### chore

* introduce devowl-scripts binary (CU-2n41u7h)
* introduce for non-flat node_modules development experience (CU-2n41u7h)
* introduce new command @devowl-wp/grunt-workspaces/update-local-versions (CU-2n41u7h)
* prepare packages for PNPM isolated module mode (CU-2n41u7h)
* rebase conflicts (CU-2n41u7h)


### perf

* drop IE support completely (CU-f72yna)
* permit process.env destructuring to save kb in bundle size (CU-f72yna)





## 1.13.4 (2022-07-06)


### fix

* better error handling when REST API is not available in license modal (CU-2kgpv68)
* php error in Announcement.php when announcements are deactivated (CU-2md9j0g)





## 1.13.3 (2022-06-13)


### fix

* sanitize input fields where needed (CU-2kat97y)





## 1.13.2 (2022-06-08)


### fix

* compatibility with licensing when WPTimeCapsule is activ (CU-2jm2ha5)
* do not create license instances too early (CU-2gfcmjv)
* some PHP notices about missing variables (CU-2j8gba7)


### refactor

* use is_multisite instead of function_exists checks (CU-2k54b8m)


### style

* form checkboxes were overriden by global style (CU-2jm244h)





## 1.13.1 (2022-05-13)


### fix

* free version could not be activated with a free license (CU-2evtdgf)





# 1.13.0 (2022-05-09)


### feat

* allow no-usage licensing within multisite with multiple licenses (CU-22bghnd)


### fix

* remove path from thematic connected host names and always use the host name (CU-2dkvrnw)





## 1.12.4 (2022-04-29)


### fix

* patch hostname correctly when syncing with remote within multisite (CU-2chc0vt)
* respect connected thematic hosts also for invalidating the license for new found host (CU-2de0bqb)
* support multisites with more than 100 subsites (CU-2de4am1)





## 1.12.3 (2022-04-20)


### ci

* make build wp package jobs more generic without wp (CU-22h231w)


### fix

* do not invalidate the license for EC2 IP domains (CU-2cbneq2)
* ignore other EC2 and compute units for license deactivation (CU-2cbneq2)


### refactor

* extract composer dev dependencies to their corresponding dev package (CU-22h231w)
* put composer license packages to @devowl-wp/composer-licenses (CU-22h231w)
* rename wordpress-packages and wordpress-plugins folder (CU-22h231w)
* use phpunit-config and phpcs-config in all PHP packages (CU-22h231w)





## 1.12.2 (2022-04-04)


### chore

* simplified consents for license activation (CU-1zg282b)
* translation hungary (CU-21999nd)





## 1.12.1 (2022-03-15)


### chore

* review 1 (CU-1jkmq84)
* review 2 (CU-1jkmq84)
* use wildcarded composer repository path (CU-1zvg32c)


### fix

* use correct link for Learn more in license dialog for CodeCanyon products (CU-1jkmq84)


### refactor

* make plugin updates independent of single store (CU-1jkmq84)





# 1.12.0 (2022-01-25)


### feat

* allow to programmatically activate license through WordPress hook (CU-kbaqat)





# 1.11.0 (2022-01-17)


### build

* create cachebuster files only when needed, not in dev env (CU-1z46xp8)
* improve build and CI performance by 50% by using @devowl-wp/regexp-translation-extractor (CU-1z46xp8)


### chore

* sync client properties WP version with each update check (CU-1znbady)


### feat

* allow to get received data from license server for activation (CU-1znbady)


### test

* compatibility with Xdebug 3 (CU-1z46xp8)





# 1.10.0 (2021-12-01)


### feat

* introduce formal german translations (CU-1n9qnvz)





## 1.9.1 (2021-11-11)


### chore

* remove not-finished translations from feature branches to avoid huge ZIP size (CU-1rgn5h3)





# 1.9.0 (2021-10-12)


### feat

* send product version and name to deactivation feedback (CU-12b0yg1)





# 1.8.0 (2021-09-30)


### build

* allow to define allowed locales to make release management possible (CU-1257b2b)
* copy files for i18n so we can drop override hooks and get performance boost (CU-wtt3hy)


### chore

* english translation revision (CU-vhmn9k)
* introduce new developer filter DevOwl/RealProductManager/HostMap/ConnectThematic (CU-1jkutcv)
* prepare for continuous localization with weblate (CU-f94bdr)
* refactor texts to use ellipses instead of ... (CU-f94bdr)
* remove language files from repository (CU-f94bdr)
* review english texts (CU-12w4012)


### ci

* introduce continuous localization (CU-f94bdr)


### feat

* translation into Russian (CU-10hyfnv)


### fix

* enqueue license dialog also in network plugins list (CU-1jz73cx)


### perf

* remove translation overrides in preference of language files (CU-wtt3hy)


### refactor

* grunt-mojito to abstract grunt-continuous-localization package (CU-f94bdr)
* introduce @devowl-wp/continuous-integration





## 1.7.8 (2021-08-31)


### fix

* only validate new hosts when in admin area (CU-yjzbgt)





## 1.7.7 (2021-08-20)


### chore

* update PHP dependencies
* updated PuC





## 1.7.6 (2021-08-10)


### chore

* translations into German (CU-pb8dpn)


### refactor

* split i18n and request methods to save bundle size





## 1.7.5 (2021-07-09)


### fix

* consider port 80 and 443 not as new host for license invalidation
* do not invalidate license in some rare cases





## 1.7.4 (2021-06-05)


### chore

* skip validate hosts in some cases


### fix

* allow hidden IP address to be valid for license activation (CU-kk4dd7)





## 1.7.3 (2021-05-25)


### chore

* compatibility with latest antd version
* migarte loose mode to compiler assumptions
* prettify code to new standard
* upgrade dependencies to latest minor version


### fix

* do not rely on install_plugins capability, instead use activate_plugins so GIT-synced WP instances work too (CU-k599a2)
* output validate hint after custom help (object destructuring, CU-kb6jyc)
* validate current host with parse_url to avoid some strange scenarios





## 1.7.2 (2021-05-14)


### fix

* sometimes the modal is not shown due to race condition with mobx.configure isolate global state





## 1.7.1 (2021-05-11)


### fix

* automatically refetch announcments for updates (CU-jn95nz)





# 1.7.0 (2021-05-11)


### feat

* introduce Learn More links to different parts of the UI (CU-gv58rr)
* translate frontend into German (CU-ex0u4a)


### fix

* automatically clear page caches after license activation / deactivation (CU-jd7t87)
* ignore IP hostname + port  while validating a new host (CU-j93gd2)
* ignore IP hostnames while validating a new host (CU-j93gd2)
* show notice about email checkbox in feedback formular when note has more than 4 words (CU-gd0zw3)
* usage with deferred scripts and content blocker (DOM waterfall, CU-gn4ng5)
* wrong announcment state directly after first license activation


### refactor

* create wp-webpack package for WordPress packages and plugins
* introduce eslint-config package
* introduce new grunt workspaces package for monolithic usage
* introduce new package to validate composer licenses and generate disclaimer
* introduce new package to validate yarn licenses and generate disclaimer
* introduce new script to run-yarn-children commands
* move build scripts to proper backend and WP package
* move jest scripts to proper backend and WP package
* move PHP Unit bootstrap file to @devowl-wp/utils package
* move PHPUnit and Cypress scripts to @devowl-wp/utils package
* move WP build process to @devowl-wp/utils
* move WP i18n scripts to @devowl-wp/utils
* move WP specific typescript config to @devowl-wp/wp-webpack package
* remove @devowl-wp/development package





## 1.6.3 (2021-04-27)


### fix

* compatibility with WP_SITEURL PHP constant (CU-hd6ntd)
* do not validate new host names in WP CLI and WP Cronjob
* do not validate new hosts for free licenses





## 1.6.2 (2021-04-15)


### chore

* show old and new hostname after license deactivation


### fix

* compatibility with WPML and PolyLang when using different domains (CU-h79b76)





## 1.6.1 (2021-03-30)


### chore

* update text to explain the installation type (CU-g57mdw)


### fix

* group licenses by hostname of each blog instead of blog (CU-g751j8)


### refactor

* use composer autoload to setup constants and package localization





# 1.6.0 (2021-03-23)


### chore

* max. activations per license explain in more detail when limit reached and link to customer center (CU-fn1k7v)


### feat

* allow to migrate from older license keys (CU-fq1kd8)


### fix

* allow to only get the href for the plugin activation link and make API public (CU-fq1kd8)
* consider allow autoupdates as true if previously no auto updates exist (CU-fq1kd8)
* do not deactivate license when saving new URL through General > Settings (CU-g150eg)
* in a multisite installation only consider blogs with Real Cookie Banner active (CU-fyzukg)
* plugin could not be installed if an older version of PuC is used by another plugin
* prefill code from warning / error hint and allow 32 char (non-UUID) format codes (CU-fq1kd8)
* switch to blog while validating new hostname for license (CU-fyzukg)





## 1.5.5 (2021-03-10)


### chore

* hide some notices on try.devowl.io (CU-f53trz)
* update texts (CU-f134wh)


### fix

* automatically deactivate license when migrating / cloning the website and show notice (CU-f134wh)





## 1.5.4 (2021-03-02)


### chore

* highlight "Skip & Deactivate" button in feedback form when deactivating plugin (CU-ewzae8)


### fix

* filter duplicates in deactivation feedback and show error message (CU-ewzae8)
* filter spam deactivation feedback by length, word count and email address MX record (CU-ewzae8)
* use site url instead of home url for activating a license (CU-f134wh)
* use whitespace and refactor coding (review 1, CU-ewzae8)





## 1.5.3 (2021-02-24)


### chore

* drop moment bundle where not needed (CU-e94pnh)





## 1.5.2 (2021-02-16)


### fix

* warning (PHP) when previously no autoupdates exist





## 1.5.1 (2021-02-02)


### chore

* hotfix remove function which does not exist in < WordPress 5.5





# 1.5.0 (2021-02-02)


### feat

* introduce new checkbox to enable automatic minor and patch updates (CU-dcyf6c)





## 1.4.5 (2021-01-24)


### fix

* avoid duplicate feedback modals if other plugins of us are active (e.g. RML, CU-cx0ynw)





## 1.4.4 (2021-01-11)


### build

* reduce javascript bundle size by using babel runtime correctly with webpack / babel-loader


### chore

* **release :** publish [ci skip]





## 1.4.3 (2020-12-09)


### chore

* update to webpack v5 (CU-4akvz6)
* updates typings and min. Node.js and Yarn version (CU-9rq9c7)


### fix

* add hint for installation type for better explanation (CU-b8t6qf)





## 1.4.2 (2020-12-01)


### chore

* update dependencies (CU-3cj43t)
* update to composer v2 (CU-4akvjg)


### refactor

* enforce explicit-member-accessibility (CU-a6w5bv)





## 1.4.1 (2020-11-26)


### chore

* **release :** publish [ci skip]


### fix

* show link to account page when max license usage reached (CU-aq0g1g)





# 1.4.0 (2020-11-24)


### feat

* add hasInteractedWithFormOnce property of current blog to REST response (CU-agzcrp)


### fix

* license form was not localized to german (CU-agzcrp)
* use no-store caching for WP REST API calls to avoid issues with browsers and CloudFlare (CU-agzcrp)





## 1.3.4 (2020-11-19)


### fix

* deactivation feedback wrong REST route





## 1.3.3 (2020-11-18)


### fix

* deactivation feedback modal





## 1.3.2 (2020-11-17)


### fix

* duplicate error messages (#acypm6)





## 1.3.1 (2020-11-17)


### fix

* correctly show multisite blogname (#acwzpy)





# 1.3.0 (2020-11-03)


### feat

* allow to disable announcements (#9jwehz)
* translation (#8mrn5a)





# 1.2.0 (2020-10-23)


### feat

* route PATCH PaddleIncompleteOrder (#8ywfdu)


### fix

* typing


### refactor

* use "import type" instead of "import"





# 1.1.0 (2020-10-16)


### build

* use node modules cache more aggressively in CI (#4akvz6)


### chore

* introduce Real Product Manager WordPress client package (#8cxk67)
* update PUC (#8cxk67)
* update PUC (#8cxk67)


### feat

* add checklist in config page header (#8cxk67)
* announcements (#8cxk67)
* introduce feedback modal (#8cxk67)


### fix

* enable old auto updater instead of new one for EA (#8cxk67)
* review 1 (#8cxk67)
* review 2 (#8cxk67)
* review 3 (#8cxk67)
* review 4 (#8cxk67)
* validate response in PUC (#8cxk67)





# 1.1.0 (2020-10-16)


### build

* use node modules cache more aggressively in CI (#4akvz6)


### chore

* introduce Real Product Manager WordPress client package (#8cxk67)
* update PUC (#8cxk67)
* update PUC (#8cxk67)


### feat

* add checklist in config page header (#8cxk67)
* announcements (#8cxk67)
* introduce feedback modal (#8cxk67)


### fix

* enable old auto updater instead of new one for EA (#8cxk67)
* review 1 (#8cxk67)
* review 2 (#8cxk67)
* review 3 (#8cxk67)
* review 4 (#8cxk67)
* validate response in PUC (#8cxk67)
