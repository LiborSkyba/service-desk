<?php //netteCache[01]000396a:2:{s:4:"time";s:21:"0.02113000 1400421515";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:82:"C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\Device.list.latte";i:2;i:1400421506;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\Device.list.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 's96wlhg2ie')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb0f246c1d6c_content')) { function _lb0f246c1d6c_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><p><a href="<?php echo htmlSpecialChars($_control->link("Homepage:default")) ?>
">← zpět na úvod</a></p>

<?php if ($user->loggedIn) { ?>

<h2>Zákazník</h2>

<div>
    <table>
        <tr>
            <th>Příjmení</th>
            <th>Jméno</th>
            <th>Název</th>
            <th>Adresa</th>
            <th>Telefon</th>
            <th>Email</th>
            <th><?php if ($user->loggedIn) { ?>Editace<?php } ?></th>
        </tr>
        <tr>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getSurname(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getName(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getCompany(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getAddress(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getPhone(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($costumer->getEmail(), ENT_NOQUOTES) ?></td>
            <td><?php if ($user->loggedIn) { ?><a href="<?php echo htmlSpecialChars($_control->link("User:edit", array($costumer))) ?>
">Edit</a><?php } ?></td>
        </tr>
    </table>

</div>

    
<?php } else { call_user_func(reset($_l->blocks['title2']), $_l, get_defined_vars())  ?>
<h2>Pro práci v systému se přihlaste svým účtem nebo se nově zaregistrujte.</h2> 

<?php } ?>

<?php if ($user->loggedIn) { ?><h2><a href="<?php echo htmlSpecialChars($_control->link("Device:create")) ?>
">Registrace nového zařízení</a></h2>
<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
   
    <table>
    <tr><th>Výrobce</th><th>Název zařízení</th><th>Výrobní číslo</th><th><?php if ($user->loggedIn) { ?>
Editace zařízení<?php } ?></th><th><?php if ($user->loggedIn) { ?>Přidat zakázku<?php } ?></th></tr>
<?php $iterations = 0; foreach ($devices as $device) { ?>
            <tr>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($device->getProducer(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($device->getName(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($device->getSerial_number(), ENT_NOQUOTES) ?>
</td><td><?php if ($user->loggedIn) { ?><a href="<?php echo htmlSpecialChars($_control->link("Device:edit", array($device->getId()))) ?>
">Edit</a><?php } ?></td><td><?php if ($user->loggedIn) { ?><a href="<?php echo htmlSpecialChars($_control->link("Device:show", array($device->getId()))) ?>
">Vybrat zařízení</a><?php } ?> </td>
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
if (!function_exists($_l->blocks['title2'][] = '_lbe766492fac_title2')) { function _lbe766492fac_title2($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Vítejte v informačním systému Toner-Copy</h1>
<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbdfdcc732c5_title')) { function _lbdfdcc732c5_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h2>Seznam vašich zařízení:</h2>
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