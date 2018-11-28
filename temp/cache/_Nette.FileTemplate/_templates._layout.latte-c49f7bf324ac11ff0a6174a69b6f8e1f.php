<?php //netteCache[01]000392a:2:{s:4:"time";s:21:"0.73947600 1400387373";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:78:"C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\@layout.latte";i:2;i:1400387360;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'p25vsllvm7')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbac5fcf7ecb_title')) { function _lbac5fcf7ecb_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Toner Copy IS<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb39b4d017e3_head')) { function _lb39b4d017e3_head($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lbf963030033_scripts')) { function _lbf963030033_scripts($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/jquery.js"></script>
	<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/netteForms.js"></script>
	<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/main.js"></script>
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="iso-8859-2">
	<meta name="description" content="">
<?php if (isset($robots)) { ?>	<meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>">
<?php } ?>

	<title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->upper($template->striptags(ob_get_clean()))  ?></title>

	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/screen.css">
	<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/print.css">
	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/favicon.ico">
	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>
	<script> document.documentElement.className+=' js' </script>

<?php $iterations = 0; foreach ($flashes as $flash) { ?>	<div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>

        <ul class="navig">
            <li><a href="<?php echo htmlSpecialChars($_control->link("Homepage:")) ?>
">Homepage</a></li>
<?php if ($user->loggedIn) { if ($user->isInRole(3)) { ?>
                    <li>Přihlášen manažér: <?php echo Nette\Templating\Helpers::escapeHtml($login_user->getName(), ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($login_user->getSurname(), ENT_NOQUOTES) ?>
<span style="padding-left:20px"><a href="<?php echo htmlSpecialChars($_control->link("Sign:out")) ?>
">Odhlásit</a></span></li>
<?php } elseif ($user->isInRole(2)) { ?>
                    <li>Přihlášen technik: <?php echo Nette\Templating\Helpers::escapeHtml($login_user->getName(), ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($login_user->getSurname(), ENT_NOQUOTES) ?>
<span style="padding-left:20px"><a href="<?php echo htmlSpecialChars($_control->link("Sign:out")) ?>
">Odhlásit</a></span></li>
<?php } else { ?>
                    <li>Přihlášen zákazník: <?php echo Nette\Templating\Helpers::escapeHtml($login_user->getName(), ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($login_user->getSurname(), ENT_NOQUOTES) ?>
<span style="padding-left:20px"><a href="<?php echo htmlSpecialChars($_control->link("Sign:out")) ?>
">Odhlásit</a></span></li>
<?php } } else { ?>
                <li><a href="<?php echo htmlSpecialChars($_control->link("Sign:in")) ?>
">Přihlásit</a></li>
<?php } ?>
        </ul>
        
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>

<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
</body>
</html>
