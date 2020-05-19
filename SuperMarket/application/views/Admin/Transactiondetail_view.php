<?php include "./application/views/Admin/include/header.php" ?>
<?php foreach ($get_transaction as $value): ?>
	<input type="hidden" name=""  value="<?= $value['id'] ?>" ?>
	<?= $value['user_name'] ?>

	<?php foreach ($get_transactiondetail as $detail): ?>
		<?php if($value['id'] ==$detail['transaction_id']){ ?>
		<?= $detail['product_code'] ?>
		<?= $detail['price'] ?>
		<?php }else{ ?>
		<?php } ?>
	<?php endforeach ?>
<?php endforeach ?>
<?php include "./application/views/Admin/include/footer.php" ?>