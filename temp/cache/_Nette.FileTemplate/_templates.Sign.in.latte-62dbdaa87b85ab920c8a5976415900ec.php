<?php //netteCache[01]000392a:2:{s:4:"time";s:21:"0.29847000 1400313322";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:78:"C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\Sign.in.latte";i:2;i:1400312956;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\Sign.in.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '05joqccowb')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb1f8da80a48_content')) { function _lb1f8da80a48_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<?php $_ctrl = $_control->getComponent("signInForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->redrawControl(NULL, FALSE); $_ctrl->render() ?>

<?php call_user_func(reset($_l->blocks['title2']), $_l, get_defined_vars())  ?>



<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbda2583915b_title')) { function _lbda2583915b_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Přihlášení | <a href="<?php echo htmlSpecialChars($_control->link("User:reg")) ?>
">Registrace nového uživatele</a></h1>
<?php
}}

//
// block title2
//
if (!function_exists($_l->blocks['title2'][] = '_lbc1eaf782b2_title2')) { function _lbc1eaf782b2_title2($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1></h1>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 