<?php
namespace CommonRoom\Models;

class ApiTagAssignmentByName
{
    public $type;
    public $name;

    public function __construct($type = null, $name = null)
    {
        $this->type = $type;
        $this->name = $name;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['type'] ?? null,
            $data['name'] ?? null,
        );
    }

    public function toArray()
    {
        return [
            'type' => $this->type,
            'name' => $this->name,
        ];
    }
}
?>
