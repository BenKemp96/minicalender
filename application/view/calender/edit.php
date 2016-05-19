<div class="container">
    <h3>Edit a Date</h3>
    <form action="<?php echo URL; ?>calender/updatedate" method="POST">
        <label>Person</label>
        <input autofocus type="text" name="person" value="<?php echo htmlspecialchars($date->person, ENT_QUOTES, 'UTF-8'); ?>" required><br>
        <label>Date</label>
        <input type="date" name="dmy" value="">
        <input type="hidden" name="date_id" value="<?php echo htmlspecialchars($date->id, ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="old_day" value="<?php echo htmlspecialchars($date->day); ?>" required>
        <input type="hidden" name="old_month" value="<?php echo htmlspecialchars($date->month); ?>" required>
        <input type="hidden" name="old_year" value="<?php echo htmlspecialchars($date->year); ?>" required>
        <input type="submit" name="submit_update_date" value="Submit">
    </form>
</div>