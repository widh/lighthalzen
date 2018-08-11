# Lighthalzen
Now on developing.  
To see image preview, take a look at [this link](https://cite.app.yuoa.pm/).

## Installation
Do `git clone https://github.com/yuoa/lighthalzen` on `wp-contents/themes` directory.  

There's some additional php packages, so you may install [Composer](https://getcomposer.org) and type `composer update` on the root directory of this theme.  
There's some additional npm packages, so you may install [npm](https://www.npmjs.com/get-npm) and type `npm i` on the root directory of this theme.  

## About Stylesheet (sass)
Lighthalzen uses `sass` to make stylesheet easier. Refer to [Sass homepage](https://sass-lang.com) for more information.

#### How to change `.scss` files to `style.css`
In `lighthalzen` directory, you can type `sass --sourcemap=none --watch scss/style.scss:style.css --style compressed` to continuously build whole scss files into `style.css`.

#### Server Access Configuration
For mental peace, check your web server configuration to hide `.scss` and `.md` files.  
I also recommend you to check hiding of `.sass-cache` and `.git` directory.

## About Translation (i18n)
Lighthalzen supports Korean and English using `gettext` from GNU project, and google translation.

#### `gettext`
`gettext` is application localization project of GNU project.  
`i18n/ko.po`, `i18n/ko.mo` is related with `gettext`.  
You can edit/translate these files with [POEDIT](https://poedit.net).  

#### Google Translation
If there is any important part which is not translated, lighthalzen translates it automatically using google translation. This google translation feature is managed by [stichoza/google-translate-php](https://github.com/Stichoza/google-translate-php).

## License
Lighthalzen is licensed under `CiTE License 1.0`. Check [LICENSE.md](LICENSE.md) for detail.  
