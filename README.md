# GitHub Markdown Fixer

[![LUYA](https://img.shields.io/badge/Powered%20by-LUYA-brightgreen.svg)](https://luya.io)
[![Total Downloads](https://poser.pugx.org/nadar/github-markdown-fixer/downloads)](https://packagist.org/packages/nadar/github-markdown-fixer)
[![Latest Stable Version](https://poser.pugx.org/nadar/github-markdown-fixer/v/stable)](https://packagist.org/packages/nadar/github-markdown-fixer)

This project fixes your Markdown files in order to render them nicely with GitHub and other Renderers.

Currently built in features:

+ Replace all tabs with 4 spaces.
+ Fixes none breaking spaces problem [github/markup issue problem description](https://github.com/github/markup/issues/1054#issuecomment-300061967).

![GitHub Markdown Fixer in Action](screenshot.png)

## Usage

Add the `nadar/github-markdown-fixer` to your project, within the `require-dev` section:

> IF YOU GET A MINIMUM STABILITY / COMPOSER ERROR USE: `"minimum-stability" : "RC"` IN YOUR COMPOSER.JSON.

```sh
composer require nadar/github-markdown-fixer --dev
```

Go into your Terminal an run the Fixer:

```sh
./vendor/bin/gmf fix /folder
```

### Options

|argument|description
|--------|----------
|--dry     |run command in dry mode, does not change file contents.
