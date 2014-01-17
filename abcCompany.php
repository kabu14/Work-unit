<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ABC</title>
</head>
<body>
	<?php
		require 'WorkUnit.php';

		// create team and employees
		$team_one = new Team('one');
		$joe = new Employee('Joe');
		$adam = new Employee('Adam');
		$paul = new Employee('Paul');
		$jeff = new Employee('Jeff');

		// assign teams
		$team_one->add($adam);
		$team_one->add($paul);

		// assign tasks
		$team_one->assignTask('Do something');
		$joe->assignTask('mail orders');

		// completion and removal of team member
		$team_one->completeTask('Do something');
		$team_one->remove($adam);
	?>
</body>
</html>