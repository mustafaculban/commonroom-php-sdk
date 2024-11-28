<?php
namespace CommonRoom\Models;

class ApiUser
{
    public $id;
    public $fullName;
    public $firstName;
    public $lastName;
    public $username;
    public $avatarUrl;
    public $bio;
    public $email;
    public $linkedin;
    public $github;
    public $twitter;
    public $discord;
    public $externalProfiles;
    public $roleAtCompany;
    public $titleAtCompany;
    public $companyName;
    public $companyDomain;
    public $country;
    public $city;
    public $region;
    public $rawLocation;
    public $tags;
    public $customFields;

    public function __construct($id = null, $fullName = null, $firstName = null, $lastName = null, $username = null, $avatarUrl = null, $bio = null, $email = null, $linkedin = null, $github = null, $twitter = null, $discord = null, $externalProfiles = null, $roleAtCompany = null, $titleAtCompany = null, $companyName = null, $companyDomain = null, $country = null, $city = null, $region = null, $rawLocation = null, $tags = null, $customFields = null)
    {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->avatarUrl = $avatarUrl;
        $this->bio = $bio;
        $this->email = $email;
        $this->linkedin = $linkedin;
        $this->github = $github;
        $this->twitter = $twitter;
        $this->discord = $discord;
        $this->externalProfiles = $externalProfiles;
        $this->roleAtCompany = $roleAtCompany;
        $this->titleAtCompany = $titleAtCompany;
        $this->companyName = $companyName;
        $this->companyDomain = $companyDomain;
        $this->country = $country;
        $this->city = $city;
        $this->region = $region;
        $this->rawLocation = $rawLocation;
        $this->tags = $tags;
        $this->customFields = $customFields;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['id'] ?? null,
            $data['fullName'] ?? null,
            $data['firstName'] ?? null,
            $data['lastName'] ?? null,
            $data['username'] ?? null,
            $data['avatarUrl'] ?? null,
            $data['bio'] ?? null,
            $data['email'] ?? null,
            $data['linkedin'] ?? null,
            $data['github'] ?? null,
            $data['twitter'] ?? null,
            $data['discord'] ?? null,
            $data['externalProfiles'] ?? null,
            $data['roleAtCompany'] ?? null,
            $data['titleAtCompany'] ?? null,
            $data['companyName'] ?? null,
            $data['companyDomain'] ?? null,
            $data['country'] ?? null,
            $data['city'] ?? null,
            $data['region'] ?? null,
            $data['rawLocation'] ?? null,
            $data['tags'] ?? null,
            $data['customFields'] ?? null,
        );
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'fullName' => $this->fullName,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'username' => $this->username,
            'avatarUrl' => $this->avatarUrl,
            'bio' => $this->bio,
            'email' => $this->email,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
            'twitter' => $this->twitter,
            'discord' => $this->discord,
            'externalProfiles' => $this->externalProfiles,
            'roleAtCompany' => $this->roleAtCompany,
            'titleAtCompany' => $this->titleAtCompany,
            'companyName' => $this->companyName,
            'companyDomain' => $this->companyDomain,
            'country' => $this->country,
            'city' => $this->city,
            'region' => $this->region,
            'rawLocation' => $this->rawLocation,
            'tags' => $this->tags,
            'customFields' => $this->customFields,
        ];
    }
}
?>
