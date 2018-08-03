# Lighthalzen
Now on developing.  
To see image preview, take a look at [this link](https://cite.app.yuoa.pm/).

## Translation
Lighthalzen supports Korean and English using `gettext` from GNU project, and google translation.

### `gettext`
`gettext` is application localization project of GNU project.  
`i18n/ko.po`, `i18n/ko.mo` is related with `gettext`.  
You can edit/translate these files with [POEDIT](https://poedit.net).  

### Google Translation
If there is any important part which is not translated, lighthalzen translates it automatically using google translation. You may install [Composer](https://getcomposer.org) and type `composer update` on the root directory of the repository.  

## Lighthalzen uses Sass
Refer to [Sass homepage](https://sass-lang.com) for more information.

### How to change `.scss` files to `style.css`
In `lighthalzen` directory, you can type `sass --sourcemap=none --watch scss/style.scss:style.css --style compressed` to continuously build whole scss files into `style.css`.

### Server Access Configuration
For mental peace, check your web server configuration to hide `.scss` and `.md` files.  
I also recommend you to check hiding of `.sass-cache` and `.git` directory.  
