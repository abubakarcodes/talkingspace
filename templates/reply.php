<?php include"includes/header.php"; ?>
<ul id="topics">
	<li id="main-topic" class="topic topic">
		<div class="row">
			<div class="col-md-2">
				<div class="user-info">
					<img src="images/avatar/<?php echo $topic['avatar']; ?>" class="pull-left img-thumbnail">
					<ul>
						<li><strong><?php ?><?php echo $topic['username']; ?></strong></li>
						<li><strong><?php echo userPostcount($topic['user_id']); ?> Posts</strong></li>
						<li><a href="topics.php?user=<?php echo $topic['user_id']; ?>">View Topics</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-10">
				<div class="topic-content pull-right">
					<p><?php echo $topic['body']; ?></p>
				</div>
			</div>
		</div>
	</li>
	<?php if($replies): ?>
	<h2>User Replies</h2>
	<?php foreach($replies as $reply) : ?>
	<li class="topic topic">
		<div class="row">
			<div class="col-md-2">
				<div class="user-info">
					<img src="images/avatar/<?php echo $reply['avatar']; ?>" class="pull-left img-thumbnail">
					<ul>
						<li><strong><?php ?><?php echo $reply['username']; ?></strong></li>
						<li><strong><?php echo userPostcount($reply['user_id']); ?> Posts</strong></li>
						<li><a href="topics.php?user=<?php echo $reply['user_id']; ?>">View Topics</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-10">
				<div class="topic-content pull-right">
					<p><?php echo $reply['body']; ?></p>
				</div>
			</div>
		</div>
	</li>
<?php endforeach; ?>
<?php else: ?>
	<p>There is no reply for this post</p>
	<?php endif; ?>

</ul>
<h3>Reply to topic</h3>
<?php if(isLoggedIn()): ?>
<form role="form" method="post" action="topic.php?id=<?php echo $topic['id']; ?>">
	<div class="form-group">
		<textarea id="body" rows="6" cols="8" class="form-control" name="body" "></textarea>
		<script type="text/javascript">
			$(document).ready(function() {
				CKEDITOR.replace('body');
			});
		</script>
	</div>
	<input type="submit" name="do_reply" class="btn btn-primary" value="Reply">
</form>
<?php else:  ?>
	<p>Please Login to Reply</p>
	<?php endif; ?>
<?php include"includes/footer.php"; ?>