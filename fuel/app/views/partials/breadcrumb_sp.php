<?php if(isset($breadcrumb) && $breadcrumb != null){ ?>
<div id="breadcrumb">
	<ul>
		<?php $i = 1; ?>
		<?php $total = count($breadcrumb); ?>
		<li><a href="<?php echo \Uri::base(); ?>">トップページ <?php if(count($breadcrumb) > 0){ echo '>';} ?></a></li>
		<?php foreach ($breadcrumb as $title => $link){ ?>
		<?php $next = $i == $total ? '' : '>'; ?>
		<?php if($link == false){ ?>
			<li><?php echo $title.' '.$next; ?></li>
		<?php }else{ ?>
			<li><a href="<?php echo $link ?>"><?php echo $title.' '.$next;; ?></a></li>
		<?php } ?>
		<?php $i++; } ?>
	</ul>
</div><!--/breadcrum-->
<?php } ?>