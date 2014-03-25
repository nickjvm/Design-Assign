<p>Hey, <?php print $name; ?>!</p>
<p>Congratulations. You are now a part of AIGA Iowa's Design Assign community. Your account is now registered and active!</p>
<p>Design Assign is a collaborative partnership that gives back to the greater Des Moines area community through design.
 Alongside AIGA Iowa, area creatives
 <?php if($role == 7): ?>
 	(like you!)
 <?php endif; ?> 
 use their talents to provide local non-profit organizations 
<?php if($role == 8): ?>
	(like you!)
<?php endif; ?>
with communications products that can help raise awareness and funds.
  </p>
<?php if($role == 7): ?>
	<p><a href="<?php echo $link ?>">Log in now</a> to browse and apply for projects!</p>
<?php elseif($role == 8): ?>
	<p><a href="<?php echo $link ?>">Log in now</a> to submit your project!</p>
<?php else: ?>
	<p><a href="<?php echo $link ?>">Log in now</a> to get started!</p>
<?php endif; ?>

<p>If you have any questions, feel free to email <a href="mailto:designassign@aigaiowa.org">designassign@aigaiowa.org</a></p>

<p>Thank you,<br/>
	The <?php print $title;?> team
</p>
