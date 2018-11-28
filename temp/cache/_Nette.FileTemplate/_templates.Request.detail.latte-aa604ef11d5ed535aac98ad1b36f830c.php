<?php //netteCache[01]000399a:2:{s:4:"time";s:21:"0.38316300 1400408226";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:85:"C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\Request.detail.latte";i:2;i:1400408200;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\Request.detail.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ff6hzkd3p1')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb15106a0c1d_content')) { function _lb15106a0c1d_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><p><a href="<?php echo htmlSpecialChars($_control->link("Homepage:default")) ?>
">← zpět na seznam zakázek</a></p>

<h1>Detail zakázky</h1>

<?php if ($user->loggedIn) { ?>

<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
    
<table>
    <tr><th>Datum zadání</th><th>Datum dokončení</th><th>Název zakázky</th><th>Popis zakázky</th><th>Zařízení</th><th>Stav zakázky</th><th><?php if ($user->loggedIn) { ?>
Akce<?php } ?></th></tr>
    <tr>
        <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($request->getCreated_time(), 'j.n. Y'), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($request->getEnd_time(), 'j.n. Y'), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getTitle(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getDescription(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getDevice()->getName(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getRequest_status()->getName(), ENT_NOQUOTES) ?></td>
        <td>
            <?php if ($user->loggedIn&&$user->isInRole(1)&&$request->getRequest_status()->getId()==1) { ?>
<a href="<?php echo htmlSpecialChars($_control->link("Request:edit", array($request->getId()))) ?>
">Edit</a> | <a href="<?php echo htmlSpecialChars($_control->link("Request:cancel", array($request->getId()))) ?>
">Zrušit</a><?php } ?> <?php if ($user->loggedIn&&$user->isInRole(2,3)&&$request->getRequest_status()->getId()==3) { ?>
<a href="<?php echo htmlSpecialChars($_control->link("Request:end", array($request->getId()))) ?>
">Ukončit</a><?php } ?> | <?php if ($user->loggedIn&&$user->isInRole(3)) { if ($request->getRequest_status()->getId()==1) { ?>
<a href="<?php echo htmlSpecialChars($_control->link("Request:accept", array($request->getId()))) ?>
">Přijmout</a> | <?php } if ($request->getRequest_status()->getId()==2) { ?><a href="<?php echo htmlSpecialChars($_control->link("Request:accept", array($request->getId()))) ?>
">Přidělit</a> | <?php } if ($request->getRequest_status()->getId()<=3) { ?><a href="<?php echo htmlSpecialChars($_control->link("Request:cancel", array($request->getId()))) ?>
">Zrušit</a><?php } } ?></td>
    </tr>    
</table>

<h2>Zářízení</h2>

<div>
    <table>
        <tr>
            <th>Druh zařízení</th>
            <th>Výrobce</th>
            <th>Název zařízení</th>
            <th>Výrobní číslo</th>
        </tr>
        <tr>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($device->getDevice_class()->getName(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($device->getProducer(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($device->getName(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($device->getSerial_number(), ENT_NOQUOTES) ?></td>
        </tr>
    </table>
</div>

<h2>Zákazník</h2>

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
        </tr>
        <tr>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getSurname(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getName(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getCompany(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getTown(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getAddress(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getPhone(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getEmail(), ENT_NOQUOTES) ?></td>
        </tr>
    </table>

</div>
            
<?php } else { call_user_func(reset($_l->blocks['title2']), $_l, get_defined_vars())  ?>
    <h2>Pro práci v systému se přihlaste svým účtem nebo se nově zaregistrujte.</h2> 

<?php } ?>

<?php if ($request->getTechnician()) { ?>
    
<h2>Technik</h2>

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
        </tr>
        <tr>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getSurname(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getName(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getCompany(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getTown(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getAddress(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getPhone(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getEmail(), ENT_NOQUOTES) ?></td>
        </tr>
    </table>

</div>

<?php } 
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb5587cfe06a_title')) { function _lb5587cfe06a_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h2>Zakázka</h2>
<?php
}}

//
// block title2
//
if (!function_exists($_l->blocks['title2'][] = '_lb9a1eda9f0e_title2')) { function _lb9a1eda9f0e_title2($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <h1>Vítejte v informačním systému firmy Toner-Copy</h1>
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
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ?>
        