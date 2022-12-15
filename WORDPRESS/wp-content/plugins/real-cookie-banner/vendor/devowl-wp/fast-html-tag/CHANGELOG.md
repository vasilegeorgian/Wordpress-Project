# Change Log

All notable changes to this project will be documented in this file.
See [Conventional Commits](https://conventionalcommits.org) for commit guidelines.

## 0.5.1 (2022-12-12)


### fix

* fatal error on PHP 8.1.13 when using preview images in content blocker (CU-37wxc8v)





# 0.5.0 (2022-11-24)


### feat

* introduce new selector syntax for custom functions (CU-33z3dh8)


### fix

* deprecation notice for strpos in SelectorSyntaxAttribute (CU-344wg4f)
* introduce new content blocker selector syntax matchUrls to fix false-positive Elementor videos (CU-33z3dh8)





## 0.4.6 (2022-10-31)


### fix

* add selected attribute also to attributes map (CU-32pvhdp)





## 0.4.5 (2022-10-25)

**Note:** This package (@devowl-wp/fast-html-tag) has been updated because a dependency, which is also shipped with this package, has changed.





## 0.4.4 (2022-10-11)


### build

* add webpack as dependency to make it compatible with PNPM (CU-3rmk7b)


### chore

* introduce consistent type checking for all TypeScript files (CU-2eap113)
* prepare script management for self-hosted Gitlab migrations (CU-2yt2948)
* start introducing common webpack config for frontends (CU-2eap113)


### fix

* compatibility with Divi multi view and allow deeply blocking content in JSON attributes (CU-30jcz089)
* do not find false-positive attributes in HTML strings in JSON attribute (CU-30xnaa3)
* do not find Gravatar when using Elementor Notes module in scanner (false-positive, CU-30jdeqb)





## 0.4.3 (2022-09-06)


### fix

* compatibility with latest Elementor version and video embeds (CU-2wu8u5j)
* split TagAttributeFinder in multiple regular expressions to find multiple blockable attributes (CU-2x5hpdz)





## 0.4.2 (2022-08-29)


### chore

* introduce devowl-scripts binary (CU-2n41u7h)
* introduce for non-flat node_modules development experience (CU-2n41u7h)
* prepare packages for PNPM isolated module mode (CU-2n41u7h)


### fix

* content blocker did not work for HTML elements with escaped HTML in attribute (CU-2vxf7tf)





## 0.4.1 (2022-08-09)


### fix

* compatibility with FacetWP inline scripts which hold blocked data (CU-2r5967v)
* do not block inline script of H5P plugin (CU-2rb37tg)





# 0.4.0 (2022-07-06)


### feat

* allow to block content of custom elements (web components, CU-2nfkhc3)





## 0.3.7 (2022-04-29)


### fix

* omit unnecessery link tags (CU-2cwz5v4)





## 0.3.6 (2022-04-20)


### refactor

* extract composer dev dependencies to their corresponding dev package (CU-22h231w)
* move wordpress packages to isomorphic-packages (CU-22h231w)
* put composer license packages to @devowl-wp/composer-licenses (CU-22h231w)





## 0.3.5 (2022-04-04)


### fix

* always consider Cloudflare Rocket loader scripts as non-cdata (CU-21956yr)





## 0.3.4 (2022-03-15)


### chore

* use wildcarded composer repository path (CU-1zvg32c)





## 0.3.3 (2022-03-01)


### fix

* allow to find tag attributes by all tags (CU-1ydpqa1)





## 0.3.2 (2022-02-02)


### fix

* bypass JIT error and try with temporarily deactivated JIT (CU-232auh3)





## 0.3.1 (2022-01-25)


### fix

* allow underscores to calculate inline script variable assignments (CU-23284bc)





# 0.3.0 (2022-01-17)


### build

* create cachebuster files only when needed, not in dev env (CU-1z46xp8)
* improve build and CI performance by 50% by using @devowl-wp/regexp-translation-extractor (CU-1z46xp8)


### feat

* allow multiple attributes in SelectorSyntaxFinder (CU-1wecmxt)


### fix

* compatibility with some HTML minifiers creating malformed HTML (CU-22h3kvw)


### test

* compatibility with Xdebug 3 (CU-1z46xp8)





## 0.2.3 (2021-12-21)


### fix

* do not find escaped scripts in scripts (CU-1y1zpp9)


### test

* add integration tests (CU-1y1zq8b)





## 0.2.2 (2021-11-24)


### fix

* large HTML documents lead to PCRE_BACKTRACK_LIMIT_ERROR errors (CU-1u3zb5b)





## 0.2.1 (2021-11-12)


### fix

* do not check escaped value for selector syntax (CU-1rvy8cv)





# 0.2.0 (2021-11-11)


### chore

* remove not-finished translations from feature branches to avoid huge ZIP size (CU-1rgn5h3)


### feat

* allow to calculate unique keys for (blocked) tags


### refactor

* extract content blocker to own package @devowl-wp/headless-content-blocker (CU-1nfazd0)
* extract HTML-extractor to own package @devowl-wp/fast-html-tag
