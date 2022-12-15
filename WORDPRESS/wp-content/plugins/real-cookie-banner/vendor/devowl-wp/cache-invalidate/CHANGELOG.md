# Change Log

All notable changes to this project will be documented in this file.
See [Conventional Commits](https://conventionalcommits.org) for commit guidelines.

## 1.11.3 (2022-12-12)

**Note:** This package (@devowl-wp/cache-invalidate) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.11.2 (2022-11-18)

**Note:** This package (@devowl-wp/cache-invalidate) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.11.1 (2022-11-15)

**Note:** This package (@devowl-wp/cache-invalidate) has been updated because a dependency, which is also shipped with this package, has changed.





# 1.11.0 (2022-11-09)


### feat

* introduce BunnyCDN cache invalidation (CU-3193kqb)


### fix

* also flush object cache when invalidating all caches (CU-332f81e)


### refactor

* static trait access (PluginReceiver, CU-1y7vqm6)





## 1.10.1 (2022-10-31)

**Note:** This package (@devowl-wp/cache-invalidate) has been updated because a dependency, which is also shipped with this package, has changed.





# 1.10.0 (2022-10-25)


### feat

* automatically clear cache for IONOS performance plugin (CU-32003j3)





## 1.9.4 (2022-10-11)


### build

* add webpack as dependency to make it compatible with PNPM (CU-3rmk7b)


### chore

* introduce consistent type checking for all TypeScript files (CU-2eap113)
* prepare script management for self-hosted Gitlab migrations (CU-2yt2948)
* rebase conflicts (CU-2eap113)
* start introducing common webpack config for frontends (CU-2eap113)





## 1.9.3 (2022-09-21)

**Note:** This package (@devowl-wp/cache-invalidate) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.9.2 (2022-09-21)

**Note:** This package (@devowl-wp/cache-invalidate) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.9.1 (2022-09-20)

**Note:** This package (@devowl-wp/cache-invalidate) has been updated because a dependency, which is also shipped with this package, has changed.





# 1.9.0 (2022-09-16)


### feat

* raidboxes.io cache implementation (CU-2yyvu2t)





## 1.8.2 (2022-09-06)

**Note:** This package (@devowl-wp/cache-invalidate) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.8.1 (2022-08-29)


### chore

* introduce devowl-scripts binary (CU-2n41u7h)
* introduce for non-flat node_modules development experience (CU-2n41u7h)
* introduce new command @devowl-wp/grunt-workspaces/update-local-versions (CU-2n41u7h)
* prepare packages for PNPM isolated module mode (CU-2n41u7h)
* rebase conflicts (CU-2n41u7h)


### fix

* automatically exclude inline scripts in Swift Performance (CU-2vcf9nh)


### perf

* drop IE support completely (CU-f72yna)





# 1.8.0 (2022-08-09)


### feat

* one.com Performance Cache compatibility (CU-2rgx0hm)





# 1.7.0 (2022-07-06)


### feat

* cloudflare plugin (CU-2mrhgt4)


### fix

* compatibility with NitroPack (CU-232f9nh)





# 1.6.0 (2022-05-24)


### feat

* themify cache (CU-2egfddt)





## 1.5.1 (2022-04-20)


### ci

* make build wp package jobs more generic without wp (CU-22h231w)


### refactor

* extract composer dev dependencies to their corresponding dev package (CU-22h231w)
* put composer license packages to @devowl-wp/composer-licenses (CU-22h231w)
* rename wordpress-packages and wordpress-plugins folder (CU-22h231w)
* use phpunit-config and phpcs-config in all PHP packages (CU-22h231w)





# 1.5.0 (2022-03-15)


### chore

* use wildcarded composer repository path (CU-1zvg32c)


### feat

* compatibility with Merge + Minify + Refresh plugin (CU-20r15y0)


### fix

* fatal error with PHP 8.1 and SiteGround Optimizer plugin (CU-1znn0kh)





## 1.4.11 (2022-01-25)

**Note:** This package (@devowl-wp/cache-invalidate) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.4.10 (2022-01-17)


### build

* create cachebuster files only when needed, not in dev env (CU-1z46xp8)
* improve build and CI performance by 50% by using @devowl-wp/regexp-translation-extractor (CU-1z46xp8)


### test

* compatibility with Xdebug 3 (CU-1z46xp8)





## 1.4.9 (2021-11-18)


### fix

* compatibility with Swift Performance (CU-m17wmf)





## 1.4.8 (2021-11-11)


### chore

* remove not-finished translations from feature branches to avoid huge ZIP size (CU-1rgn5h3)





## 1.4.7 (2021-09-30)


### build

* allow to define allowed locales to make release management possible (CU-1257b2b)


### chore

* prepare for continuous localization with weblate (CU-f94bdr)
* remove language files from repository (CU-f94bdr)


### ci

* introduce continuous localization (CU-f94bdr)


### refactor

* grunt-mojito to abstract grunt-continuous-localization package (CU-f94bdr)
* introduce @devowl-wp/continuous-integration





## 1.4.6 (2021-09-08)


### fix

* use non-CLI command API function to purge cache for WP Optimize (CU-10huz72)





## 1.4.5 (2021-08-31)


### fix

* exclude assets for WP Optimize (CU-raprnr)





## 1.4.4 (2021-08-20)


### chore

* update PHP dependencies





## 1.4.3 (2021-08-10)

**Note:** This package (@devowl-wp/cache-invalidate) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.4.2 (2021-07-09)


### fix

* compatibility with WP Rocket 3.9 (CU-nkav4w)





## 1.4.1 (2021-05-25)


### build

* migrate loose to compiler assumptions (babel)


### chore

* prettify code to new standard





# 1.4.0 (2021-05-11)


### feat

* native compatibility with preloading and defer scripts with caching plugins (CU-h75rh2)


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





## 1.3.3 (2021-01-11)


### build

* reduce javascript bundle size by using babel runtime correctly with webpack / babel-loader





## 1.3.2 (2020-12-09)


### chore

* update to webpack v5 (CU-4akvz6)
* updates typings and min. Node.js and Yarn version (CU-9rq9c7)





## 1.3.1 (2020-12-01)


### chore

* update to composer v2 (CU-4akvjg)





# 1.3.0 (2020-10-23)


### feat

* route PATCH PaddleIncompleteOrder (#8ywfdu)





## 1.2.2 (2020-10-08)


### chore

* **release :** version bump





## 1.2.1 (2020-09-29)


### build

* backend pot files and JSON generation conflict-resistent (#6utk9n)


### chore

* introduce development package (#6utk9n)
* move backend files to development package (#6utk9n)
* move grunt to common package (#6utk9n)
* move packages to development package (#6utk9n)
* move some files to development package (#6utk9n)
* update dependencies (#3cj43t)
* update package.json script for WordPress packages (#6utk9n)





# 1.2.0 (2020-09-22)


### feat

* invalidate Borlabs Cache automatically (#8cpz9n)





## 1.1.3 (2020-09-22)


### fix

* import settings (#82rk4n)





## 1.1.2 (2020-08-17)


### ci

* prefer dist in composer install


### fix

* nginx-helper with PhpRedis





## 1.1.1 (2020-08-11)


### chore

* backends for monorepo introduced





# 1.1.0 (2020-07-30)


### feat

* introduce dashboard with assistant (#68k9ny)
