# Change Log

All notable changes to this project will be documented in this file.
See [Conventional Commits](https://conventionalcommits.org) for commit guidelines.

## 0.2.25 (2022-12-12)


### fix

* show notice for invalid TCF device closure within the vendor configuration (CU-37hg97j)
* use ordered fields list for newly added SQL fields (CU-37hg97j)





## 0.2.24 (2022-11-18)

**Note:** This package (@devowl-wp/tcf-vendor-list-normalize) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.23 (2022-11-15)

**Note:** This package (@devowl-wp/tcf-vendor-list-normalize) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.22 (2022-11-09)

**Note:** This package (@devowl-wp/tcf-vendor-list-normalize) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.21 (2022-10-31)

**Note:** This package (@devowl-wp/tcf-vendor-list-normalize) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.20 (2022-10-25)

**Note:** This package (@devowl-wp/tcf-vendor-list-normalize) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.19 (2022-10-11)


### build

* add webpack as dependency to make it compatible with PNPM (CU-3rmk7b)


### chore

* introduce consistent type checking for all TypeScript files (CU-2eap113)
* prepare script management for self-hosted Gitlab migrations (CU-2yt2948)
* rebase conflicts (CU-2eap113)
* start introducing common webpack config for frontends (CU-2eap113)





## 0.2.18 (2022-09-21)

**Note:** This package (@devowl-wp/tcf-vendor-list-normalize) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.17 (2022-09-21)

**Note:** This package (@devowl-wp/tcf-vendor-list-normalize) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.16 (2022-09-20)

**Note:** This package (@devowl-wp/tcf-vendor-list-normalize) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.15 (2022-09-06)

**Note:** This package (@devowl-wp/tcf-vendor-list-normalize) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.14 (2022-08-29)


### chore

* introduce devowl-scripts binary (CU-2n41u7h)
* introduce for non-flat node_modules development experience (CU-2n41u7h)
* introduce new command @devowl-wp/grunt-workspaces/update-local-versions (CU-2n41u7h)
* prepare packages for PNPM isolated module mode (CU-2n41u7h)
* rebase conflicts (CU-2n41u7h)


### fix

* compatibility with Delay JS in WP Rocket as content blockers are sporadically not rendered (CU-2v12m07)
* compatibility with latest TCF vendor list and additional information (CU-20r2upf)


### perf

* drop IE support completely (CU-f72yna)





## 0.2.13 (2022-08-09)


### fix

* show error message when GVL could not be retrieved from remote server (CU-2uv5zze)





## 0.2.12 (2022-06-08)


### chore

* allow up to 12 seconds to download TCF GVL (CU-2jm2eb7)





## 0.2.11 (2022-04-20)


### ci

* make build wp package jobs more generic without wp (CU-22h231w)


### refactor

* extract composer dev dependencies to their corresponding dev package (CU-22h231w)
* put composer license packages to @devowl-wp/composer-licenses (CU-22h231w)
* rename wordpress-packages and wordpress-plugins folder (CU-22h231w)
* use phpunit-config and phpcs-config in all PHP packages (CU-22h231w)





## 0.2.10 (2022-03-15)


### chore

* use wildcarded composer repository path (CU-1zvg32c)





## 0.2.9 (2022-01-25)

**Note:** This package (@devowl-wp/tcf-vendor-list-normalize) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.8 (2022-01-17)


### build

* create cachebuster files only when needed, not in dev env (CU-1z46xp8)
* improve build and CI performance by 50% by using @devowl-wp/regexp-translation-extractor (CU-1z46xp8)


### test

* compatibility with Xdebug 3 (CU-1z46xp8)





## 0.2.7 (2021-12-15)


### fix

* do no longer request consent for abandoded TCF vendors (CU-1xaz66y)
* server PHP warnings when TCF is active with latest GVL version (CU-1xaz66y)
* server PHP warnings when TCF is active with latest GVL version (CU-1xaz66y)





## 0.2.6 (2021-11-11)


### chore

* remove not-finished translations from feature branches to avoid huge ZIP size (CU-1rgn5h3)





## 0.2.5 (2021-10-12)


### fix

* use correct user locale for REST API requests in admin area when different from blog language (CU-1k51hkh)





## 0.2.4 (2021-09-30)


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





## 0.2.3 (2021-08-20)


### chore

* update PHP dependencies





## 0.2.2 (2021-08-10)

**Note:** This package (@devowl-wp/tcf-vendor-list-normalize) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.2.1 (2021-05-25)


### chore

* migarte loose mode to compiler assumptions





# 0.2.0 (2021-05-11)


### feat

* allow to query a single vendor (CU-crwq2r)
* allow to query multiple vendors with the in-argument (CU-ff0zhy)
* allow to return only declarations instead of with metadata (onlyReturnDeclarations, CU-ff0z49)
* compatibility with TCF v2.1 (device storage disclosures, CU-h74vna)
* download and normalize Global Vendor List for TCF compatibility (CU-63ty1t)
* introduce query class to read purposes and vendors (CU-crwq2r)
* persist and query stacks, and calculate best suitable stacks for a given set of declarations (CU-fh0bx6)


### fix

* localize stacks correctly and sort by score (CU-ff0zhy)
* map used declarations to own array instead of removing purposes from original vendor (CU-ff0yvh)
* notices thrown when no vendor given (CU-ff0yvh)
* review 1 (TCF, CU-ff0yck)
* review 2 (CU-ff0yvh)
* review TCF CMP validator (CU-hh395u, CU-hh3dkn)
* use correct language as requested (CU-crwwdx)


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
