<p>
    <h1><?php echo __('Dashboard'); ?></h1>
</p>

<form action="<?php echo get_url('plugin/dashboard/clear'); ?>" method="post">
  <b><?php echo __('Today'); ?></b>
  <table class="fieldset" cellpadding="0" cellspacing="0" border="0">
  <?php foreach ($log_entry_today as $entry): ?> 
    <tr class="<?php print odd_even(); ?>">
      <td class="priority"><img src="../wolf/plugins/dashboard/img/<?php print $entry->priority('string') ?>.png" title="<?php print $entry->priority('string') ?>" /></td>
      <td><?php print $entry->message ?></td>
      <td class="date"><a title="<?php print $entry->created_on ?>"><?php print DateDifference::getString(new DateTime($entry->created_on)); ?></a></td>
    </tr>	
  <?php endforeach; ?>
  </table>
  <br />
  
  <b><?php echo __('Yesterday'); ?></b>
  <table class="fieldset" cellpadding="0" cellspacing="0" border="0">
  <?php foreach ($log_entry_yesterday as $entry): ?>
    <tr class="<?php print odd_even(); ?>">
      <td class="priority"><img src="../wolf/plugins/dashboard/img/<?php print $entry->priority('string') ?>.png" title="<?php print $entry->priority('string') ?>" /></td> 
      <td><?php print $entry->message ?></td>
      <td class="date"><a title="<?php print $entry->created_on ?>"><?php print DateDifference::getString(new DateTime($entry->created_on)); ?></a></td>
    </tr>	
    <?php endforeach; ?>
  </table>
  <br />
    
  <b><?php echo __('Before yesterday'); ?></b>
  <table class="fieldset" cellpadding="0" cellspacing="0" border="0">
  <?php foreach ($log_entry_older as $entry): ?>
    <tr class="<?php print odd_even(); ?>">
      <td class="priority"><img src="../wolf/plugins/dashboard/img/<?php print $entry->priority('string') ?>.png" title="<?php print $entry->priority('string') ?>" /></td>
      <td><?php print $entry->message ?></td>
      <td class="date"><a title="<?php print $entry->created_on ?>"><?php print DateDifference::getString(new DateTime($entry->created_on)); ?></a></td>
    </tr>	
    <?php endforeach; ?>
  </table>
  <br />

  <p class="buttons">
    <input class="button" name="commit" type="submit" accesskey="c" value="<?php echo __('Clear all'); ?>" />
  </p>
  
</form>
