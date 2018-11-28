<?php //netteCache[01]000401a:2:{s:4:"time";s:21:"0.53039200 1401172841";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:87:"C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\Homepage.default.latte";i:2;i:1401172831;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\Homepage.default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'nygdy30pf5')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb2c48d46903_content')) { function _lb2c48d46903_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if ($user->loggedIn) { ?><h2><a href="<?php echo htmlSpecialChars($_control->link("Device:list")) ?>
">Zadat novou zakázku</a><?php if ($user->isInRole(3)) { ?> | <a href="<?php echo htmlSpecialChars($_control->link("User:reg")) ?>
">Registrovat zákazníka</a> | <a href="<?php echo htmlSpecialChars($_control->link("User:reg")) ?>
">Registrovat technika</a><?php } ?></h2>

<h2><?php if ($user->isInRole(3)) { ?>Manažér<?php } elseif ($user->isInRole(2)) { ?>
Technik<?php } else { ?>Zákazník<?php } ?></h2>

<div>
    <table>
        <tr>
            <th>Příjmení</th>
            <th>Jméno</th>
            <th>Firma</th>
            <th>Město</th>
            <th>Adresa</th>
            <th>Telefon</th>
            <th>Email</th>
            <th><?php if ($user->loggedIn) { ?>Akce<?php } ?></th>
        </tr>
        <tr>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getSurname(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getName(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getCompany(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getTown(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getAddress(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getPhone(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getEmail(), ENT_NOQUOTES) ?></td>
            <td><?php if ($user->loggedIn) { ?><a href="<?php echo htmlSpecialChars($_control->link("User:edit", array($costumer->getId()))) ?>
">Edit</a><?php } ?></td>
        </tr>
    </table>

</div>
            
<?php } else { call_user_func(reset($_l->blocks['title2']), $_l, get_defined_vars())  ?>
    <h2>Pro práci v systému se přihlaste svým účtem nebo se nově zaregistrujte.</h2> 

<?php } ?>

<?php if ($user->loggedIn) { ?>
    
<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
    
    <table>
    <tr><th>Datum zadání</th><th>Datum dokončení</th><th>Název zakázky</th><th>Popis zakázky</th><th>Zařízení</th><th>Stav zakázky</th><th><?php if ($user->loggedIn) { ?>
Akce<?php } ?></th></tr>
<?php $iterations = 0; foreach ($requests as $request) { ?>
            <tr>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($request->getCreated_time(), 'j.n. Y'), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($request->getEnd_time(), 'j.n. Y'), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getTitle(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getDescription(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getDevice()->getName(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getRequest_status()->getName(), ENT_NOQUOTES) ?></td>
                <td><a href="<?php echo htmlSpecialChars($_control->link("Request:detail", array($request->getId()))) ?>
">Detail</a>
                    <?php if ($user->loggedIn&&$user->isInRole(1)&&$request->getRequest_status()->getId()==1) { ?>
<a href="<?php echo htmlSpecialChars($_control->link("Request:edit", array($request->getId()))) ?>
">Edit</a> | <a href="<?php echo htmlSpecialChars($_control->link("Request:cancel", array($request->getId()))) ?>
">Zrušit</a><?php } ?> <?php if ($user->loggedIn&&$user->isInRole(2)&&$request->getRequest_status()->getId()==1) { ?>
 | <a href="<?php echo htmlSpecialChars($_control->link("Request:cancel", array($request->getId()))) ?>
">Zrušit</a><?php } ?> <?php if ($user->loggedIn&&$user->isInRole(2,3)&&$request->getRequest_status()->getId()==3) { ?>
 | <a href="<?php echo htmlSpecialChars($_control->link("Request:end", array($request->getId()))) ?>
">Ukončit</a><?php } if ($user->loggedIn&&$user->isInRole(3)) { if ($request->getRequest_status()->getId()==1) { ?>
 | <a href="<?php echo htmlSpecialChars($_control->link("Request:accept", array($request->getId()))) ?>
">Přijmout</a><?php } if ($request->getRequest_status()->getId()==2) { ?> | <a href="<?php echo htmlSpecialChars($_control->link("User:techlist", array($request->getId()))) ?>
">Přidělit</a><?php } ?> <?php if ($request->getRequest_status()->getId()==3) { ?>
 | <a href="<?php echo htmlSpecialChars($_control->link("Request:end", array($request->getId()))) ?>
">Ukončit</a><?php } ?> <?php if ($request->getRequest_status()->getId()<=3) { ?>
 | <a href="<?php echo htmlSpecialChars($_control->link("Request:cancel", array($request->getId()))) ?>
">Zrušit</a><?php } } ?></td>
            </tr>    
<?php $iterations++; } ?>
    </table>

<?php } else { ?>

<?php } ?>

<?php
}}

//
// block title2
//
if (!function_exists($_l->blocks['title2'][] = '_lbd98b55b1d2_title2')) { function _lbd98b55b1d2_title2($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <h1>Vítejte v informačním systému firmy Toner-Copy</h1>
<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbe5ffb20c49_title')) { function _lbe5ffb20c49_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h2>Seznam zakázek:</h2>
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