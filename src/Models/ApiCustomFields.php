<?php
namespace CommonRoom\Models;

class ApiCustomFields
{
    public $id;
    public $value;

    public function __construct($id = null, $value = null)
    {
        $this->id = $id;
        $this->value = $value;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['id'] ?? null,
            $data['value'] ?? null,
        );
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
        ];
    }
}
?>
