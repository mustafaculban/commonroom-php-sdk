<?php
namespace CommonRoom\Models;

class ApiToken
{
    public $jti;
    public $communityName;
    public $communityId;

    public function __construct($jti, $communityName, $communityId)
    {
        $this->jti = $jti;
        $this->communityName = $communityName;
        $this->communityId = $communityId;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['jti'] ?? null,
            $data['communityName'] ?? null,
            $data['communityId'] ?? null
        );
    }

    public function toArray()
    {
        return [
            'jti' => $this->jti,
            'communityName' => $this->communityName,
            'communityId' => $this->communityId,
        ];
    }
}
?>
