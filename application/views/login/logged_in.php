<!-- edit button, shown only if user os logged in and have changed anything -->
<div class="edit-controls">
	<button class="button" id="enable">Enable Edit</button>
    <button class="button" id="disable">Disable Edit</button>
	<!--
    -->
    <button style="display: none;" class="button save-button" onclick="API.contents.updateContents(edit_content_holder)"><i class="fa fa-floppy-o" data-tooltip="Uložit"></i></button>
    <button style="display: none;" class="button cancel-button" onclick="API.contents.cancelEdit()"><i class="fa fa-trash" data-tooltip="Zrušit změny"></i></button>
</div>
<div class="user-area">
	<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
	<i class="fa fa-user">&nbsp<?php echo $_SESSION['user_name']; ?></i>
	<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
	<a href="<?php echo URL; ?>?logout"><i class="fa fa-sign-out">&nbspLogout</i></a>
</div>