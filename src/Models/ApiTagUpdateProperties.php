<?php
namespace CommonRoom\Models;

class ApiTagUpdateProperties
{
    public $name;
    public $description;

    public function __construct($name = null, $description = null)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['name'] ?? null,
            $data['description'] ?? null,
        );
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
?>
