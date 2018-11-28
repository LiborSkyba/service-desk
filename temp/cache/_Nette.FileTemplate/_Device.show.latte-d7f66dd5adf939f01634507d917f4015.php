<?php //netteCache[01]000396a:2:{s:4:"time";s:21:"0.61444100 1400311302";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:82:"C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\Device\show.latte";i:2;i:1400311263;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Users\Majitel\Documents\NetBeansProjects\Servis\app\templates\Device\show.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'xzqubkaugv')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbb23e92a69c_content')) { function _lbb23e92a69c_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><p><a href="<?php echo htmlSpecialChars($_control->link("Device:list")) ?>">← zpět na seznam zařízení</a></p>

<h2>Zářízení</h2>

<div>
    <table>
        <tr>
            <th>Id zařízení</th>
            <th>Výrobce</th>
            <th>Název zařízení</th>
            <th>Výrobní číslo</th>
        </tr>
        <tr>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($device->getId(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($device->getProducer(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($device->getName(), ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($device->getSerial_number(), ENT_NOQUOTES) ?></td>
        </tr>
    </table>
</div>

<h2>Zakázky vybraného zařízení</h2>

<?php if ($user->loggedIn) { ?><a href="<?php echo htmlSpecialChars($_control->link("Request:create", array($device->getId()))) ?>
">Zadejte novou zakázku</a> <?php } ?>


<table>
    <tr><th>Id zakázky</th><th>Datum zadání</th><th>Název zakázky</th><th>Popis zakázky</th><th><?php if ($user->loggedIn) { ?>
Editace zakázky<?php } ?></th></tr>
<?php $iterations = 0; foreach ($requests as $request) { ?>
            <tr>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($request->getId(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($request->getCreated_time(), 'F j, Y'), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getTitle(), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($request->getDescription(), ENT_NOQUOTES) ?>
</td><td><?php if ($user->loggedIn) { ?><a href="<?php echo htmlSpecialChars($_control->link("Request:show", array($request->getId()))) ?>
">Edit</a><?php } ?> <?php if ($user->loggedIn&&$user->id=='12') { ?><a href="<?php echo htmlSpecialChars($_control->link("Request:showdel", array($request->getId()))) ?>
">Smazat</a><?php } ?></td>
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