<?php include"includes/header.php"; ?>
<form role="form" method="post" action="create.php">
	<div class="form-group">
		<label>Topic Title</label>
		<input name="title" type="text" class="form-control"  placeholder="Enter Title">
	</div>
	<div class="form-group">
		<label>Category</label>
		<select class="form-control" name="category">
			<?php foreach (getCategories() as $category): ?>
			<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
		<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label>Topic Body</label>
		<textarea id="body" rows="6" cols="8" class="form-control" name="body" "></textarea>
		<script type="text/javascript">
			$(document).ready(function() {
				CKEDITOR.replace('body');
			});
		</script>
	</div>
	<input type="submit" name="do_post" class="btn btn-primary" value="Create Post">
</form>
<?php include"includes/footer.php"; ?>