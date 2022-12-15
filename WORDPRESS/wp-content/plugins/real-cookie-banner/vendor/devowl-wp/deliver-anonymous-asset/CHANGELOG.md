# Change Log

All notable changes to this project will be documented in this file.
See [Conventional Commits](https://conventionalcommits.org) for commit guidelines.

## 0.2.16 (2022-12-12)

**Note:** This package (@devowl-wp/deliver-anonymous-asset) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.15 (2022-11-18)

**Note:** This package (@devowl-wp/deliver-anonymous-asset) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.14 (2022-11-15)

**Note:** This package (@devowl-wp/deliver-anonymous-asset) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.13 (2022-11-09)

**Note:** This package (@devowl-wp/deliver-anonymous-asset) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.12 (2022-10-31)

**Note:** This package (@devowl-wp/deliver-anonymous-asset) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.11 (2022-10-25)

**Note:** This package (@devowl-wp/deliver-anonymous-asset) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.10 (2022-10-11)


### build

* add webpack as dependency to make it compatible with PNPM (CU-3rmk7b)


### chore

* introduce consistent type checking for all TypeScript files (CU-2eap113)
* prepare script management for self-hosted Gitlab migrations (CU-2yt2948)
* rebase conflicts (CU-2eap113)
* start introducing common webpack config for frontends (CU-2eap113)





## 0.2.9 (2022-09-21)

**Note:** This package (@devowl-wp/deliver-anonymous-asset) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.8 (2022-09-21)

**Note:** This package (@devowl-wp/deliver-anonymous-asset) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.7 (2022-09-20)

**Note:** This package (@devowl-wp/deliver-anonymous-asset) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.6 (2022-09-06)

**Note:** This package (@devowl-wp/deliver-anonymous-asset) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.5 (2022-08-29)


### chore

* introduce devowl-scripts binary (CU-2n41u7h)
* introduce for non-flat node_modules development experience (CU-2n41u7h)
* introduce new command @devowl-wp/grunt-workspaces/update-local-versions (CU-2n41u7h)
* prepare packages for PNPM isolated module mode (CU-2n41u7h)
* rebase conflicts (CU-2n41u7h)


### perf

* drop IE support completely (CU-f72yna)





## 0.2.4 (2022-04-20)


### ci

* make build wp package jobs more generic without wp (CU-22h231w)


### refactor

* extract composer dev dependencies to their corresponding dev package (CU-22h231w)
* put composer license packages to @devowl-wp/composer-licenses (CU-22h231w)
* rename wordpress-packages and wordpress-plugins folder (CU-22h231w)
* use phpunit-config and phpcs-config in all PHP packages (CU-22h231w)





## 0.2.3 (2022-03-15)


### chore

* add new filter DevOwl/DeliverAnonymousAsset/ContentDir (CU-20r0zhx)
* use wildcarded composer repository path (CU-1zvg32c)





## 0.2.2 (2022-01-25)

**Note:** This package (@devowl-wp/deliver-anonymous-asset) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.1 (2022-01-17)


### build

* create cachebuster files only when needed, not in dev env (CU-1z46xp8)
* improve build and CI performance by 50% by using @devowl-wp/regexp-translation-extractor (CU-1z46xp8)


### test

* compatibility with Xdebug 3 (CU-1z46xp8)





# 0.2.0 (2021-11-18)


### feat

* allow to register ready script directly in integrated ID-pool (CU-1phrar6)





## 0.1.9 (2021-11-11)


### chore

* remove not-finished translations from feature branches to avoid huge ZIP size (CU-1rgn5h3)





## 0.1.8 (2021-09-30)


### build

* allow to define allowed locales to make release management possible (CU-1257b2b)


### chore

* prepare for continuous localization with weblate (CU-f94bdr)
* remove language files from repository (CU-f94bdr)
* **release :** publish [ci skip]


### ci

* introduce continuous localization (CU-f94bdr)


### refactor

* grunt-mojito to abstract grunt-continuous-localization package (CU-f94bdr)
* introduce @devowl-wp/continuous-integration





## 0.1.7 (2021-08-20)


### chore

* update PHP dependencies





## 0.1.6 (2021-08-10)

**Note:** This package (@devowl-wp/deliver-anonymous-asset) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.1.5 (2021-06-05)


### fix

* warning in customizer when a handle can not be enqueued





## 0.1.4 (2021-05-25)


### chore

* migarte loose mode to compiler assumptions





## 0.1.3 (2021-05-11)


### ci

* validate eslint


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





## 0.1.2 (2021-02-24)


### fix

* automatically recreate random assets on plugin update
* correctly serve as HTTPS if requested over HTTPS
* in some edge cases the wordpress autoupdater does not fire the wp action and dynamic javascript assets are not generated





## 0.1.1 (2021-02-05)


### chore

* introduce new package @devowl-wp/deliver-anonymous-asset (CU-dgz2p9)


### fix

* remove anonymous javascript files on uninstall (CU-dgz2p9)
