<?php //netteCache[01]000396a:2:{s:4:"time";s:21:"0.79890900 1400421096";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:82:"C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\Device.show.latte";i:2;i:1400421084;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\Device.show.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ivgujhd7ku')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb265b5c9b77_content')) { function _lb265b5c9b77_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><p><a href="<?php echo htmlSpecialChars($_control->link("Device:list")) ?>">← zpět na seznam zařízení</a></p>

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

<?php if ($user->loggedIn) { ?><h2><a href="<?php echo htmlSpecialChars($_control->link("Request:create", array($device->getId()))) ?>
">Zadání nové zakázky</a></h2> <?php } ?>


<h2>Zakázky vybraného zařízení</h2>

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
">Zrušit</a><?php } ?> <?php if ($user->loggedIn&&$user->isInRole(2,3)&&$request->getRequest_status()->getId()==3) { ?>
<a href="<?php echo htmlSpecialChars($_control->link("Request:end", array($request->getId()))) ?>
">Ukončit</a><?php } ?> | <?php if ($user->loggedIn&&$user->isInRole(3)) { if ($request->getRequest_status()->getId()==1) { ?>
<a href="<?php echo htmlSpecialChars($_control->link("Request:accept", array($request->getId()))) ?>
">Přijmout</a> | <?php } if ($request->getRequest_status()->getId()==2) { ?><a href="<?php echo htmlSpecialChars($_control->link("User:techlist", array($request->getId()))) ?>
">Přidělit</a> | <?php } if ($request->getRequest_status()->getId()<=3) { ?><a href="<?php echo htmlSpecialChars($_control->link("Request:cancel", array($request->getId()))) ?>
">Zrušit</a><?php } } ?></td>
            </tr>    
<?php $iterations++; } ?>
</table>
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