<?php //netteCache[01]000398a:2:{s:4:"time";s:21:"0.03011200 1400825020";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:84:"C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\User.techlist.latte";i:2;i:1400416849;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\User.techlist.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '7so2b0rnzg')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbd9e5e50cd3_content')) { function _lbd9e5e50cd3_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><p><a href="<?php echo htmlSpecialChars($_control->link("Homepage:default")) ?>
">← zpět na seznam zakázek</a></p>

<h1>Přidělení technika</h1>

<?php if ($user->loggedIn) { ?>

<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
    
<table>
    <tr><th>Datum zadání</th><th>Datum dokončení</th><th>Název zakázky</th><th>Popis zakázky</th><th>Zařízení</th><th>Stav zakázky</th></tr>
    <tr>
        <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($request->getCreated_time(), 'j.n. Y'), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($request->getEnd_time(), 'j.n. Y'), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getTitle(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getDescription(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getDevice()->getName(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getRequest_status()->getName(), ENT_NOQUOTES) ?></td>
    </tr>    
</table>

            
<?php } else { call_user_func(reset($_l->blocks['title2']), $_l, get_defined_vars())  ?>
    <h2>Pro práci v systému se přihlaste svým účtem nebo se nově zaregistrujte.</h2> 

<?php } ?>

<?php if ($request->getTechnician()) { ?>
    
<h2>Přidělený technik</h2>

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

<?php } ?>

<?php if ($user->loggedIn) { ?><h2><a href="<?php echo htmlSpecialChars($_control->link("User:regtech")) ?>
">Registrace nového technika</a></h2>

<h2>Technici:</h2>
    
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
<?php $iterations = 0; foreach ($technicians as $technician) { ?>
        <tr>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getSurname(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getName(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getCompany(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getTown(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getAddress(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getPhone(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($technician->getEmail(), ENT_NOQUOTES) ?></td>
            <td><?php if ($user->loggedIn) { ?><a href="<?php echo htmlSpecialChars($_control->link("Request:assign", array($request->getId(),$technician->getId()))) ?>
">Přidělit</a><?php } ?></td>
        </tr>
<?php $iterations++; } ?>
    </table>

<?php } else { ?>

<?php } 
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbb6f5b91b32_title')) { function _lbb6f5b91b32_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h2>Zakázka</h2>
<?php
}}

//
// block title2
//
if (!function_exists($_l->blocks['title2'][] = '_lbafdce87430_title2')) { function _lbafdce87430_title2($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 