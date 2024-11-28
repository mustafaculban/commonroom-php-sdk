<?php
namespace CommonRoom\Models;

class Status
{
    public $status;
    public $reason;
    public $errors;

    public function __construct($status = null, $reason = null, $errors = null)
    {
        $this->status = $status;
        $this->reason = $reason;
        $this->errors = $errors;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['status'] ?? null,
            $data['reason'] ?? null,
            $data['errors'] ?? null,
        );
    }

    public function toArray()
    {
        return [
            'status' => $this->status,
            'reason' => $this->reason,
            'errors' => $this->errors,
        ];
    }
}
?>
