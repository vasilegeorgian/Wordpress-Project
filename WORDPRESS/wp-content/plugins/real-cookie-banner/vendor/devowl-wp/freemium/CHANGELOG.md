# Change Log

All notable changes to this project will be documented in this file.
See [Conventional Commits](https://conventionalcommits.org) for commit guidelines.

## 1.3.27 (2022-12-12)

**Note:** This package (@devowl-wp/freemium) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.3.26 (2022-11-18)

**Note:** This package (@devowl-wp/freemium) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.3.25 (2022-11-15)

**Note:** This package (@devowl-wp/freemium) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.3.24 (2022-11-09)


### refactor

* static trait access (CU-1y7vqm6)





## 1.3.23 (2022-10-31)

**Note:** This package (@devowl-wp/freemium) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.3.22 (2022-10-25)

**Note:** This package (@devowl-wp/freemium) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.3.21 (2022-10-11)


### build

* add webpack as dependency to make it compatible with PNPM (CU-3rmk7b)


### chore

* introduce consistent type checking for all TypeScript files (CU-2eap113)
* prepare script management for self-hosted Gitlab migrations (CU-2yt2948)
* rebase conflicts (CU-2eap113)
* start introducing common webpack config for frontends (CU-2eap113)





## 1.3.20 (2022-09-21)

**Note:** This package (@devowl-wp/freemium) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.3.19 (2022-09-21)

**Note:** This package (@devowl-wp/freemium) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.3.18 (2022-09-20)

**Note:** This package (@devowl-wp/freemium) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.3.17 (2022-09-06)

**Note:** This package (@devowl-wp/freemium) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.3.16 (2022-08-29)


### chore

* introduce devowl-scripts binary (CU-2n41u7h)
* introduce for non-flat node_modules development experience (CU-2n41u7h)
* introduce new command @devowl-wp/grunt-workspaces/update-local-versions (CU-2n41u7h)
* prepare packages for PNPM isolated module mode (CU-2n41u7h)
* rebase conflicts (CU-2n41u7h)
* remove unnecessery update client third-party scripts in free version (CU-2kat97y)


### perf

* drop IE support completely (CU-f72yna)





## 1.3.15 (2022-06-08)


### fix

* security vulnerability XSS, could be exploited by logged in administratos (CU-2j8f5fa)





## 1.3.14 (2022-04-20)


### ci

* make build wp package jobs more generic without wp (CU-22h231w)


### refactor

* extract composer dev dependencies to their corresponding dev package (CU-22h231w)
* put composer license packages to @devowl-wp/composer-licenses (CU-22h231w)
* rename wordpress-packages and wordpress-plugins folder (CU-22h231w)
* use phpunit-config and phpcs-config in all PHP packages (CU-22h231w)





## 1.3.13 (2022-03-15)


### chore

* review 1 (CU-1jkmq84)
* use wildcarded composer repository path (CU-1zvg32c)





## 1.3.12 (2022-01-25)

**Note:** This package (@devowl-wp/freemium) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.3.11 (2022-01-17)


### build

* create cachebuster files only when needed, not in dev env (CU-1z46xp8)
* improve build and CI performance by 50% by using @devowl-wp/regexp-translation-extractor (CU-1z46xp8)


### test

* compatibility with Xdebug 3 (CU-1z46xp8)





## 1.3.10 (2021-11-11)


### chore

* remove not-finished translations from feature branches to avoid huge ZIP size (CU-1rgn5h3)





## 1.3.9 (2021-09-30)


### build

* allow to define allowed locales to make release management possible (CU-1257b2b)


### chore

* prepare for continuous localization with weblate (CU-f94bdr)
* remove language files from repository (CU-f94bdr)
* **release :** publish [ci skip]


### ci

* introduce continuous localization (CU-f94bdr)


### perf

* use native move command instead of grunt.copy to create pro-naming convention


### refactor

* grunt-mojito to abstract grunt-continuous-localization package (CU-f94bdr)
* introduce @devowl-wp/continuous-integration
* introduce new command with execa instead of own exec implementation





## 1.3.8 (2021-08-20)


### chore

* update PHP dependencies





## 1.3.7 (2021-08-10)

**Note:** This package (@devowl-wp/freemium) has been updated because a dependency, which is also shipped with this package, has changed.





## 1.3.6 (2021-05-25)


### chore

* migarte loose mode to compiler assumptions
* prettify code to new standard
* upgrade dependencies to latest minor version


### fix

* do not rely on install_plugins capability, instead use activate_plugins so GIT-synced WP instances work too (CU-k599a2)





## 1.3.5 (2021-05-11)


### chore

* **release :** publish [ci skip]
* **release :** publish [ci skip]
* **release :** publish [ci skip]
* rename go-links to new syntax (#en621h)
* **release :** publish [ci skip]
* **release :** publish [ci skip]


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





## 1.3.4 (2021-01-11)


### build

* reduce javascript bundle size by using babel runtime correctly with webpack / babel-loader


### chore

* **release :** publish [ci skip]
* **release :** publish [ci skip]


### fix

* caching issues with new versions in settings page





## 1.3.3 (2020-12-09)


### build

* use correct pro folders in build folder (CU-5ymbqn)


### chore

* update to webpack v5 (CU-4akvz6)
* updates typings and min. Node.js and Yarn version (CU-9rq9c7)
* **release :** publish [ci skip]


### fix

* automatically deactivate lite version when installing pro version (CU-5ymbqn)





## 1.3.2 (2020-12-01)


### chore

* update to composer v2 (CU-4akvjg)
* update to core-js@3 (CU-3cj43t)
* **release :** publish [ci skip]





## 1.3.1 (2020-11-24)


### fix

* do not count PRO update twice in dashboard updates (CU-96wd39)





# 1.3.0 (2020-10-23)


### feat

* route PATCH PaddleIncompleteOrder (#8ywfdu)


### refactor

* use "import type" instead of "import"





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
* remove grunt task aliases (#6utk9n)
* update dependencies (#3cj43t)
* update package.json script for WordPress packages (#6utk9n)





# 1.2.0 (2020-09-22)


### feat

* allow to use pro-revserse naming (#82rgxu9)


### fix

* import settings (#82rk4n)





## 1.1.3 (2020-08-26)


### ci

* install container volume with unique name (#7gmuaa)


### perf

* remove transients and introduce expire options for better performance (#7cqdzj)





## 1.1.2 (2020-08-17)


### ci

* prefer dist in composer install





## 1.1.1 (2020-08-11)


### chore

* backends for monorepo introduced





# 1.1.0 (2020-07-30)


### feat

* introduce dashboard with assistant (#68k9ny)





## 1.0.10 (2020-07-02)


### chore

* allow to define allowed licenses in root package.json (#68jvq7)
* update dependencies (#3cj43t)





## 1.0.9 (2020-06-12)


### chore

* i18n update (#5ut991)


### ci

* use hot cache and node-gitlab-ci (#54r34g)





## 1.0.8 (2020-05-20)


### chore

* move plugin/rcb branch to develop





## 1.0.7 (2020-05-12)


### build

* cleanup temporary i18n files correctly


### fix

* console error 'Cannot read property hooks of undefined' (#2j57er)





## 1.0.6 (2020-04-16)


### build

* adjust legal information for envato pro version (#46fjk9)
* move test namespaces to composer autoload-dev (#4jnk84)
* scope PHP vendor dependencies (#4jnk84)


### chore

* create real-ad package to introduce more UX after installing the plugin (#1aewyf)
* rename real-ad to real-utils (#4jpg5f)


### ci

* correctly build i18n frontend files (#4jjq0u)
* run package jobs also on devops changes


### style

* reformat php codebase (#4gg05b)





## 1.0.5 (2020-03-31)


### chore

* update dependencies (#3cj43t)
* **release :** publish [ci skip]
* **release :** publish [ci skip]
* **release :** publish [ci skip]
* **release :** publish [ci skip]


### ci

* use concurrency 1 in yarn disclaimer generation


### style

* run prettier@2 on all files (#3cj43t)


### test

* configure jest setupFiles correctly with enzyme and clearMocks (#4akeab)
* generate test reports (#4cg6tp)





## 1.0.4 (2020-03-05)


### build

* chunk vendor libraries (#3wkvfe) and update antd@4 (#3wnntb)


### chore

* update dependencies (webpack, types)





## 1.0.3 (2020-02-27)


### build

* optimize wordpress.org plugin description (#3wgvmg)





## 1.0.2 (2020-02-26)


### fix

* compatibility running Real Media Library and Real Thumbnail Generator together (hotfix)





## 1.0.1 (2020-02-26)


### build

* abstract freemium package (#3rmkfh)
* asset is not correctly enqueued (#3rgyt1)
* migrate real-thumbnail-generator to monorepo


### docs

* exclude-from-classmap (#3rgyt1)


### fix

* speedup lite build


### test

* skip jest tests, no TypeScript coding
