<?php //netteCache[01]000394a:2:{s:4:"time";s:21:"0.00640100 1400314414";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:80:"C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\User.edit.latte";i:2;i:1400313186;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\User.edit.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'swz3eq7u8e')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb03fb77e270_content')) { function _lb03fb77e270_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_l->blocks['title2']), $_l, get_defined_vars())  ?>

<?php $_ctrl = $_control->getComponent("userEditForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->redrawControl(NULL, FALSE); $_ctrl->render() ;
}}

//
// block title2
//
if (!function_exists($_l->blocks['title2'][] = '_lb2cad469d42_title2')) { function _lb2cad469d42_title2($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Editace uživatele</h1>
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
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 