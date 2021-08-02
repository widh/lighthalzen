# Lighthalzen
~~학과 사무실에 의해 프로젝트가 영구 중단되었습니다. 개발이 완료되지 않은 프로젝트이지만 미래의 내가 PHP 개발 혹은 워드프레스 테마 공부를 할 때 참고할 수 있도록 기록을 남겨둡니다.~~

연구실 홈페이지에 적용되었습니다. [https://monet.postech.ac.kr](https://monet.postech.ac.kr/)

## Installation
Do `git clone https://github.com/yuoa/lighthalzen` on `wp-contents/themes` directory.  

There's some additional php packages, so you may install [Composer](https://getcomposer.org) and type `composer update` on the root directory of this theme.  
There's some additional npm packages, so you may install [npm](https://www.npmjs.com/get-npm) and type `npm i` on the root directory of this theme.  
There's some required package, so install packages below.  
- [JpegOptim](http://freecode.com/projects/jpegoptim)
- [Optipng](http://optipng.sourceforge.net/)
- [Pngquant 2](https://pngquant.org/)
- [SVGO](https://github.com/svg/svgo) (Install this with `sudo npm i -g svgo` command.)
- [Gifsicle](http://www.lcdf.org/gifsicle/)

## WordPress Configuration
### Bilingual Plugin
Lighthalzen uses [qTranslate X](https://github.com/qTranslate-Team/qtranslate-x) to support bilingual post management. You must config qTranslate X as below.

#### General
- **Default Language / Order**  
    | | Language Code | Flag |   Name   | Locale |   Date Format   | Time Format |                   Not Available Message                  |
    |--|:--------------|:----:|:--------:|:------:|:---------------:|:-----------:|:------------------------------------:|
    |◉| ko            |kr.jpg| 한글       | ko     | %Y년 %B %e일 %A   | %I:%M %p    | 이 문서는 %LANG:, :, %로만 제공됩니다.                     |
    |○| en            |gb.jpg| English  | en     | %A %B %e%q, %Y  | %I:%M %p    | Sorry, this page is only available in %LANG%:, : and %.  |

- **URL Modification Mode**
    - Select **Use Pre-Path Mode (Default, puts /en/ in front of URL). SEO friendly.**
    - Uncheck **Hide URL language information for default language.**

- **Untranslated Content**  
    Check ONLY **Show content in an alternative language when translation is not available for the selected language.**

- **Detect Browser Language**  
    Check **Detect the language of the browser and redirect accordingly.**

#### Advanced
- **Head inline CSS**  
    Uncheck this option.

- **Cookie Settings**  
    - Uncheck **Disable language client cookie "~" (not recommended).**
    - Check **Make qTranslate‑X cookies available only through HTTPS connections.**

#### Plugin Source Edit
- For uniform language cookie name, edit `qtranslate_options.php` as below.
    ```php
    <?php ...

    // From
    define('QTX_COOKIE_NAME_FRONT','qtrans_front_language');

    // To
    define('QTX_COOKIE_NAME_FRONT', 'rimi');

    ... ?>
    ```

- For stylized alternative language message, edit `qtranslate_core.php` as below.
    ```php
    <?php ...

    // From
    $output = '<p class="qtranxs-available-languages-message qtranxs-available-languages-message-'.$lang.'">'.preg_replace('/%LANG:([^:]*):([^%]*)%/', $language_list, $q_config['not_available'][$lang]).$altlanguagecontent;

    // To
    $output = '<p class="nolang-disclaimer">'.preg_replace('/%LANG:([^:]*):([^%]*)%/', $language_list, $q_config['not_available'][$lang]).$altlanguagecontent;
    
    ... ?>
    ```

### Post Permalink
Use custom permalink structure as `/%category%/%post_id%/%postname%/`.

### User Role
Roles below are necessary to make theme work normally.  
- `cite-managers` : User who has this role will be able to edit theme configurations. (Admins can access to setting page by default.)  

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
