# Change Log

All notable changes to this project will be documented in this file.
See [Conventional Commits](https://conventionalcommits.org) for commit guidelines.

## 0.4.15 (2022-12-12)

**Note:** This package (@devowl-wp/real-queue) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.4.14 (2022-11-18)

**Note:** This package (@devowl-wp/real-queue) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.4.13 (2022-11-15)


### fix

* disable FOMO coupons in checkout, cookie experts and account view (CU-2vxh3eb)





## 0.4.12 (2022-11-09)


### refactor

* static trait access (setupConstants, CU-1y7vqm6)





## 0.4.11 (2022-10-31)

**Note:** This package (@devowl-wp/real-queue) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.4.10 (2022-10-25)

**Note:** This package (@devowl-wp/real-queue) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.4.9 (2022-10-11)


### build

* add webpack as dependency to make it compatible with PNPM (CU-3rmk7b)


### chore

* introduce consistent type checking for all TypeScript files (CU-2eap113)
* prepare script management for self-hosted Gitlab migrations (CU-2yt2948)
* rebase conflicts (CU-2eap113)
* start introducing common webpack config for frontends (CU-2eap113)


### fix

* do only check once if local storage is supported (CU-30xmz2u)
* skip failed jobs now reactivates paused jobs (CU-2f7bubr)


### style

* use dropdown in modal dialog for actions for better UX (CU-2f7bubr)





## 0.4.8 (2022-09-21)

**Note:** This package (@devowl-wp/real-queue) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.4.7 (2022-09-21)

**Note:** This package (@devowl-wp/real-queue) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.4.6 (2022-09-20)

**Note:** This package (@devowl-wp/real-queue) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.4.5 (2022-09-06)

**Note:** This package (@devowl-wp/real-queue) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.4.4 (2022-08-29)


### chore

* introduce devowl-scripts binary (CU-2n41u7h)
* introduce for non-flat node_modules development experience (CU-2n41u7h)
* introduce new command @devowl-wp/grunt-workspaces/update-local-versions (CU-2n41u7h)
* prepare packages for PNPM isolated module mode (CU-2n41u7h)
* rebase conflicts (CU-2n41u7h)


### perf

* drop IE support completely (CU-f72yna)
* permit process.env destructuring to save kb in bundle size (CU-f72yna)





## 0.4.3 (2022-04-20)


### ci

* make build wp package jobs more generic without wp (CU-22h231w)


### refactor

* extract composer dev dependencies to their corresponding dev package (CU-22h231w)
* put composer license packages to @devowl-wp/composer-licenses (CU-22h231w)
* rename wordpress-packages and wordpress-plugins folder (CU-22h231w)
* use phpunit-config and phpcs-config in all PHP packages (CU-22h231w)





## 0.4.2 (2022-04-04)


### fix

* compatibility with PHP 8.0 error handling (CU-22wtge0)





## 0.4.1 (2022-03-15)


### chore

* use wildcarded composer repository path (CU-1zvg32c)





# 0.4.0 (2022-01-25)


### feat

* allow to skip failed jobs (e.g. scan process, CU-1px7fvw)





## 0.3.2 (2022-01-17)


### build

* create cachebuster files only when needed, not in dev env (CU-1z46xp8)
* improve build and CI performance by 50% by using @devowl-wp/regexp-translation-extractor (CU-1z46xp8)


### test

* compatibility with Xdebug 3 (CU-1z46xp8)





## 0.3.1 (2021-12-15)


### fix

* in some cases the scanner did step back x pages and scanned single sites again (CU-1wtwavp)





# 0.3.0 (2021-12-01)


### feat

* introduce formal german translations (CU-1n9qnvz)





## 0.2.7 (2021-11-18)


### fix

* rename some cookies to be more descriptive about their origin (CU-1tjwxmr)





## 0.2.6 (2021-11-11)


### chore

* remove not-finished translations from feature branches to avoid huge ZIP size (CU-1rgn5h3)





## 0.2.5 (2021-11-03)


### perf

* do only fetch status for active tabs (CU-1my8jgf)





## 0.2.4 (2021-09-30)


### build

* allow to define allowed locales to make release management possible (CU-1257b2b)
* copy files for i18n so we can drop override hooks and get performance boost (CU-wtt3hy)


### chore

* prepare for continuous localization with weblate (CU-f94bdr)
* remove language files from repository (CU-f94bdr)


### ci

* introduce continuous localization (CU-f94bdr)


### fix

* translate error dialog (CU-1257b2b)


### perf

* remove translation overrides in preference of language files (CU-wtt3hy)


### refactor

* grunt-mojito to abstract grunt-continuous-localization package (CU-f94bdr)
* introduce @devowl-wp/continuous-integration





## 0.2.3 (2021-09-08)


### fix

* queue hangs on 1% in Real Cookie Banner plugin (CU-11eccpg)





## 0.2.2 (2021-08-20)


### chore

* update PHP dependencies





## 0.2.1 (2021-08-11)


### fix

* timeout for websites with more than 30,000 sites to scan (database table could not be cleared correctly)





# 0.2.0 (2021-08-10)


### chore

* translations into German (CU-pb8dpn)


### feat

* add new checklist item to scan the website (CU-mk8ec0)
* allow to fetch queue status and delete jobs by type (CU-m57phr)
* initial commit with working server-worker queue (CU-kh49jp)
* introduce client worker and localStorage restore functionality (CU-kh49jp)
* introduce new event to modify job delay depending on idle state
* introduce new JobDone event
* prepare new functionalities for the initial release (CU-kh49jp)
* proper error handling with UI when e.g. the Real Cookie Banner scanner fails (CU-7mvhak)


### fix

* automatically refresh jobs if queue is empty and there are still remaining items
* be more loose when getting and parsing the sitemap
* do not add duplicate URLs to queue
* do not enqueue real-queue on frontend for logged-in users
* localStorage per WordPress instance to be MU compatible
* only run one queue per browser session
* review 1 (CU-mtdp7v, CU-n1f1xc)
* review 1 (CU-nd8ep0)
* review 2 (CU-7mvhak)
* review user tests #2 (CU-nvafz0)
* tab locking did not work as expected and introduced worker notifications


### perf

* speed up scan process by reducing server requests (CU-nvafz0)


### refactor

* split i18n and request methods to save bundle size
