<?php
namespace CommonRoom\Models;

class ApiActivity {
    public $id;
    public $activityType;
    public $user;
    public $activityTitle;
    public $content;
    public $timestamp;
    public $url;
    public $tags;
    public $parentActivity;
    public $subSource;

    public function __construct($id = null, $activityType = null, $user = null, $activityTitle = null, $content = null, $timestamp = null, $url = null, $tags = null, $parentActivity = null, $subSource = null)
    {
        $this->id = $id;
        $this->activityType = $activityType;
        $this->user = $user;
        $this->activityTitle = $activityTitle;
        $this->content = $content;
        $this->timestamp = $timestamp;
        $this->url = $url;
        $this->tags = $tags;
        $this->parentActivity = $parentActivity;
        $this->subSource = $subSource;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['id'] ?? null,
            $data['activityType'] ?? null,
            $data['user'] ?? null,
            $data['activityTitle'] ?? null,
            $data['content'] ?? null,
            $data['timestamp'] ?? null,
            $data['url'] ?? null,
            $data['tags'] ?? null,
            $data['parentActivity'] ?? null,
            $data['subSource'] ?? null,
        );
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'activityType' => $this->activityType,
            'user' => $this->user,
            'activityTitle' => $this->activityTitle,
            'content' => $this->content,
            'timestamp' => $this->timestamp,
            'url' => $this->url,
            'tags' => $this->tags,
            'parentActivity' => $this->parentActivity,
            'subSource' => $this->subSource,
        ];
    }
}
?>
