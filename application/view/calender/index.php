<h1 class="logo">MINI CALENDER</h1>
<div class="container">
    <h3>Add a Date</h3>
    <form action="<?php echo URL; ?>calender/addDate/" method="POST">
        <label>Person</label>
        <input type="text" name="person" value="" required><br><br>
        <label>Date</label>
        <input type="date" name="dmy" value="" required>
        <input type="submit" name="submit_add_date" value="Submit">
    </form>
</div>
<?php
	foreach ($months as $month) {
		++$month_id;
		echo "<h1>" . $month . "</h1>";
		foreach ($loadAll as $birthday) {
			if ($birthday->month == $month_id) { ?>
				<a href="<?php echo URL . 'calender/editDate/' . $birthday->id; ?>"><span><?= $birthday->day?></span> <?= $birthday->person . " " . $birthday->year ?></a>
				<a href="<?php echo URL . 'calender/deleteDate/' . $birthday->id; ?>"> x</a><br>
			<?php }
		}
	}
?>