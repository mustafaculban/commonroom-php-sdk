<?php
namespace CommonRoom\Models;

class TextContent
{
    public $type;
    public $value;

    public function __construct($type = null, $value = null)
    {
        $this->type = $type;
        $this->value = $value;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['type'] ?? null,
            $data['value'] ?? null,
        );
    }

    public function toArray()
    {
        return [
            'type' => $this->type,
            'value' => $this->value,
        ];
    }
}
?>
