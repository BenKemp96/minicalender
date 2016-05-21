<h1 class="logo">MINI CALENDER</h1>
<div class="container">
    <h3>Add a Date</h3>
    <form action="<?php echo URL; ?>calender/addDate/" method="POST">
        <label>Person</label>
        <input type="text" name="person" value="" required><br><br>
        <label>Date</label>
        <input type="date" name="dmy" value="" max="<?php echo date('Y-m-d'); ?>" required>
        <input type="submit" name="submit_add_date" value="Submit">
    </form>
</div>
<?php
	foreach ($months as $month) {
		++$month_id;
		echo "<h1>" . $month . "</h1>";
		foreach ($loadAll as $birthday) {
			if ($birthday->month == $month_id) {
				$id = strip_tags($birthday->id); 
				$person = strip_tags($birthday->person); 
				$day = strip_tags($birthday->day);  
				$year = strip_tags($birthday->year); ?>
				<a href="<?php echo URL . 'calender/editDate/' . $id; ?>"><span><?= $day?></span> <?= $person . " " . $year ?></a>
				<a href="<?php echo URL . 'calender/deleteDate/' . $id; ?>"> x</a><br>
			<?php }
		}
	}
?>