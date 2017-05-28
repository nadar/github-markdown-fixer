# GitHub Markdown Fixer

[![LUYA](https://img.shields.io/badge/Powered%20by-LUYA-brightgreen.svg)](https://luya.io)
[![Total Downloads](https://poser.pugx.org/nadar/github-markdown-fixer/downloads)](https://packagist.org/packages/nadar/github-markdown-fixer)

This project fixes your markdown files in order to have render them nicly withing GitHub.

+ Replace all tabs with 4 spaces.
+ Find Breaking Spaces and replace them with normal spaces. [GitHub Markdown Renderer problems with Breaking Spaces](https://github.com/github/markup/issues/1054#issuecomment-300061967).

![GitHub Markdown Fixer in Action](screenshot.png)

## Usage

Add ths github markdown fixer to your project, within the `require-dev` section:

```sh
composer require nadar/github-markdown-fixer --dev
```

Go into your Terminal an run the Fixer:

```sh
./vendor/bin/gmf fix /folder
```

