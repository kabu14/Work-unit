<?php
/**
 * Cannot create the WorkUnit class
 * Defines the main functionality and properties that is shared by employee and team subclasses
 */
abstract class WorkUnit {
	/**
	 * An array to store tasks
	 * @var array
	 */
	protected $tasks = array();

	/**
	 * store either employee or team name
	 * @var [type]
	 */
	protected $name = NULL;

	/**
	 * either a team or employee name will be set when either employee or team is created
	 * @param string $name Either an employee or team name
	 */
	public function __construct($name)
	{
		$this->name = $name;
	}

	/**
	 * gets the name of the employee or team
	 * @return string name
	 */
	public function getName()
	{
		return $this->name;
	}

	abstract function add(Employee $e);
	abstract function remove(Employee $e);
	abstract function assignTask($task);
	abstract function completeTask($task);
}

/**
 * The Team class is used to create teams to store employees
 */
class Team extends WorkUnit {
	/**
	 * Stores an array of employee objects
	 * @var array
	 */
	private $_employees = array();

	/**
	 * Adds an employee object
	 * @param Employee $e 
	 */
	public function add(Employee $e)
	{
		$this->_employees[] = $e;
		echo "<p>{$e->getName()} has been added to team {$this->getName()}.</p>";
	}

	/**
	 * delete an employee from the team
	 * @param  Employee $e
	 */
	public function remove(Employee $e)
	{
		$index = array_search($e, $this->_employees);
		unset($this->_employees[$index]);
		echo "<p>{$e->getName()} has been removed from the team {$this->getName()}.</p>";
	}

	/**
	 * Assigns a task to the team
	 * @param  string $task Task name
	 * @return none       
	 */
	public function assignTask($task)
	{
		$this->tasks[] = $task;

		echo "<p>A new task has been assigned to team {$this->getName()}. It should be easy to do with {$this->getCount()} team member(s).</p>";
	}

	/**
	 * Completes a task and removes it from the tasks array
	 * @param  string $task Task name
	 * @return none       
	 */
	public function completeTask($task)
	{
		$index = array_search($task, $this->tasks);
		unset($this->tasks[$index]);
		echo "<p>The '$task' task has been completed by team {$this->getName()}.</p>";
	}

	/**
	 * Counts the number of employees in the team
	 * @return integer 
	 */
	public function getCount()
	{
		return count($this->_employees);
	}
}

/**
 * The Employee class is used to create individual employees
 */
class Employee extends WorkUnit {
	public function add(Employee $e) {
		return false;
	}

	public function remove(Employee $e) {
		return false;
	}

	public function assignTask($task) {
		$this->tasks[] = $task;

		echo "<p>A new task has been assigned to {$this->getName()}. It will be done by {$this->getName()} alone.</p>";
	}

	public function completeTask($task)
	{
		$index = array_search($task, $this->tasks);
		unset($this->tasks[$index]);
		echo "<p>The '$task' task has been completed by employee {$this->getName()}.</p>";
	}
}