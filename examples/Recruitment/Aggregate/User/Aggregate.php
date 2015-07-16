<?php

namespace BoundedContext\Examples\Recruitment\Aggregate\User;

use BoundedContext\Examples\Recruitment\Aggregate\User\Event;
use BoundedContext\Aggregate\AbstractAggregate;

class Aggregate extends AbstractAggregate
{
	public function create($username, $password)
	{
		$this->projector->current()->assert_not_created();

		$this->apply(new Event\Created(
			$this->id->toString(),
			$username,
			$password
		));
	}

	public function change_username($username)
	{
		$this->apply(new Event\UsernameChanged(
			$this->id->toString(),
			$username
		));
	}

	public function change_password($password)
	{
		$this->apply(new Event\PasswordChanged(
			$this->id->toString(),
			$password
		));
	}

	public function delete()
	{
		$this->apply(new Event\Deleted(
			$this->id->toString()
		));
	}

	public function undelete()
	{
		$this->apply(new Event\Undeleted(
			$this->id->toString()
		));
	}
}