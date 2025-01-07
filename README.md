# Common Room PHP SDK

Un-Official PHP SDK for Common Room API integration.

## Installation

You can install the package via composer:

```bash
composer require mustafaculban/commonroom-php-sdk
```
## Usage

```php
use CommonRoom\CommonRoom;
// Initialize the SDK
$commonRoom = new CommonRoom('your-api-key');
// Use services
try {
// Get contacts
$contacts = $commonRoom->contacts()->getContacts();
// Get activity types
$activityTypes = $commonRoom->activities()->getActivityTypes();
// Add a tag
$tag = $commonRoom->tags()->createTag([
'name' => 'My Tag',
'description' => 'Tag description'
]);
} catch (\Exception $e) {
echo "Error: " . $e->getMessage();
}
```

## Advanced Configuration

You can pass additional configuration options when initializing the SDK:

```php
// Initialize with API key and configuration
$commonRoom = new CommonRoom('your-api-key', [
    'timeout' => 45, // Request timeout in seconds
    'connect_timeout' => 15, // Connection timeout in seconds
    'base_url' => 'https://api.commonroom.io/community/v1' // Optional custom base URL
]);
// Make requests through services
$contacts = $commonRoom->contacts()->getContacts();
```

## Available Services

- ApiTokenService
- ActivitiesService
- ContactsService
- SegmentsService
- TagsService

## Testing

To run the tests, you'll need to set up your test environment:

1. Copy `.env.testing.example` to `.env.testing`:

```bash
cp .env.testing.example .env.testing
```
2. Update `.env.testing` with your test API key:

```bash
COMMONROOM_TEST_API_KEY=your-test-api-key-here
```
3. Run the tests:

```bash
composer test
```
Note: For CI/CD, make sure to set the `COMMONROOM_TEST_API_KEY` secret in your GitHub repository settings.


## Documentation

For detailed API documentation, please visit [Common Room API Documentation](https://api.commonroom.io/docs).

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.