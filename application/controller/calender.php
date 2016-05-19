<?php

class Calender extends Controller
{
	public function index()
	{
		$loadAll = $this->model->getAllDates();

		$months = cal_info(1);
		$month_id = 0;
		$months = $months['months'];

		require APP . "view/_templates/header.php";
		require APP . "view/calender/index.php";
		require APP . "view/_templates/footer.php";
	}

	public function addDate()
	{
		if (isset($_POST['submit_add_date'])) {
			
			$dmy = trim($_POST['dmy'], '-');
            $dmy = filter_var($dmy, FILTER_SANITIZE_URL);
            $dmy = explode('-', $dmy);

            $year = $dmy[0];
            $month = $dmy[1];
            $day = $dmy[2];
        
			$this->model->addDate($_POST['person'], $day, $month, $year);
		}

		header('location: ' . URL . 'calender/index');
	}

	public function editDate($date_id)
	{
		if (isset($date_id)) {
            $date = $this->model->getDate($date_id);

            require APP . 'view/_templates/header.php';
            require APP . 'view/calender/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'calender/index');
        }
	}

	public function updateDate()
    {
        if (isset($_POST["submit_update_date"])) {
        	if ($_POST['dmy'] != "") {
        		$dmy = trim($_POST['dmy'], '-');
	            $dmy = filter_var($dmy, FILTER_SANITIZE_URL);
	            $dmy = explode('-', $dmy);

	            $year = $dmy[0];
	            $month = $dmy[1];
	            $day = $dmy[2];
        	} else {
        		$year = $_POST['old_year'];
	            $month = $_POST['old_month'];
	            $day = $_POST['old_day'];
        	}

            $this->model->updateDate($_POST["person"], $day, $month, $year, $_POST['date_id']);
        }

        header('location: ' . URL . 'calender/index');
    }

	public function deleteDate($date_id)
	{
		if (isset($date_id)) {
			$this->model->deleteDate($date_id);
		}

		header('location: ' . URL . 'calender/index');
	}
}