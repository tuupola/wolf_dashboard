<h1><?php echo __('Dashboard'); ?></h1>
<?php error_reporting(E_ALL); ?>

<form action="<?php echo get_url('plugin/dashboard/clear'); ?>" method="post">
<fieldset style="padding: 0.5em;">
<?php if (0) { ?>
    <legend style="padding: 0em 0.5em 0em 0.5em; font-weight: bold;"><?php echo __('Recently happened'); ?></legend>
<?php } ?>
    <table class="fieldset" cellpadding="0" cellspacing="0" border="0">
    <?php foreach ($log_entry as $entry): ?>
        <tr>
            <td class="field"><?php print $entry->message ?></td>
            <td class="field"><?php print $entry->created_on ?></td>
        </tr>	
    <?php endforeach; ?>
    </table>
</fieldset>
<p class="buttons">
    <input class="button" name="commit" type="submit" accesskey="c" value="<?php echo __('Clear all'); ?>" />
</p>
</form>
