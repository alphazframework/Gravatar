# Gravatar

Gravatar is a component for Gravatar is an image that follows you from site to site appearing beside your name when you do things like comment or post on a blog. Avatars help identify your posts on blogs and web forums


## usage

You can install this component easily by using [Component Installer](https://github.com/zestframework/com_installer)
If you dont want to use installer then perform following steps.
- Clone this repo in your /App/Components folder.
- Congratulate you have done.

After installing/copy this component, you can use like in your models, controllers or view etc.
```php

$g = new AppComponentsgravatarclassesGravatar("Email here");

//Get the gravatar
echo $g->toHtml();
```