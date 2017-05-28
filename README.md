# GitHub Markdown Fixer

Fixing Markdown Files

+ Find Breaking Spaces in Markdown Files and replace them with normal Space. As GitHub Markdown Renderer does correctly render Markdown Tags with Breaking Spaces. https://github.com/github/markup/issues/1054#issuecomment-300061967
+ Replace Tabs with 4 spaces

## Usage

Install

```sh
composer require nadar/github-markdown-fixer --dev
```

Run

```sh
./vendor/bin/gmf fix /folder
```
