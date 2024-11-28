<?php
namespace CommonRoom\Models;

class ApiTagAssignmentById
{
    public $type;
    public $id;

    public function __construct($type = null, $id = null)
    {
        $this->type = $type;
        $this->id = $id;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['type'] ?? null,
            $data['id'] ?? null,
        );
    }

    public function toArray()
    {
        return [
            'type' => $this->type,
            'id' => $this->id,
        ];
    }
}
?>
