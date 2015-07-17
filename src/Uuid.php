<?php namespace BoundedContext;

use Rhumsaa\Uuid\Uuid as RhumsaaUuid;

class Uuid
{

    private $uuid;

    public function __construct($uuid)
    {
        $this->uuid = RhumsaaUuid::fromString($uuid);
    }

    public function toString()
    {
        return $this->uuid->toString();
    }

    public function equals(Uuid $other)
    {
        return ($this->toString() == $other->toString());
    }

    public static function generate()
    {
        return new Uuid(RhumsaaUuid::uuid4());
    }
}
