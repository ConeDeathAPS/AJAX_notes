<?php 
if (isset($notes)) {
	foreach ($notes as $note) {
		?>
		<div class='note'>
			<h3><?= $note['title']; ?></h3>
			<form class='delete' action='Notes/remove_note' method='post'>
				<input type='hidden' name='delete_id' value='<?= $note['id']; ?>'>
				<button type='submit' name='submit_delete' class='btn butt'>Delete</button>
			</form>
			<form class='update' action='Notes/update_description' method='post'>
				<input type='hidden' name='update_id' value='<?= $note['id']; ?>'>
				<textarea name='description' placeholder='Enter description here...'><?= $note['description']; ?></textarea>
				<p><small><i><?= $note['created_at']; ?></i></small></p>
				<button type='submit' name='submit_desc' class=' btn butt'>Update</button>
			</form>
		</div>
<?php
	}
}
 ?>