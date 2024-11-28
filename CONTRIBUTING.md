# Contributing to CommonRoom PHP SDK

First off, thank you for considering contributing to CommonRoom PHP SDK! It's people like you that make the open source community such a great place to learn, inspire, and create.

## Code of Conduct

This project and everyone participating in it is governed by our Code of Conduct. By participating, you are expected to uphold this code.

## How Can I Contribute?

### Reporting Bugs

Before creating bug reports, please check the issue list as you might find out that you don't need to create one. When you are creating a bug report, please include as many details as possible:

* Use a clear and descriptive title
* Describe the exact steps which reproduce the problem
* Provide specific examples to demonstrate the steps
* Describe the behavior you observed after following the steps
* Explain which behavior you expected to see instead and why
* Include PHP version and package version

### Suggesting Enhancements

Enhancement suggestions are tracked as GitHub issues. When creating an enhancement suggestion, please include:

* Use a clear and descriptive title
* Provide a step-by-step description of the suggested enhancement
* Provide specific examples to demonstrate the steps
* Describe the current behavior and explain which behavior you expected to see instead
* Explain why this enhancement would be useful

### Pull Requests

1. Fork the repo and create your branch from `master`.
2. If you've added code that should be tested, add tests.
3. If you've changed APIs, update the documentation.
4. Ensure the test suite passes.
5. Make sure your code follows the existing code style.

## Development Setup

1. Clone your fork of the repository:
```bash
git clone https://github.com/YOUR_USERNAME/commonroom-php-sdk.git
```
2. Install dependencies:
```bash
composer install
```
3. Create test environment file:
```bash
cp .env.testing.example .env.testing
```

4. Add your test API key to `.env.testing`

5. Run tests:
```bash
composer test
```


## Testing

We use PHPUnit for testing. All tests should be under the `tests/` directory:

- `tests/Unit/` - Unit tests
- `tests/Integration/` - Integration tests

To run tests:
```bash
#Run all tests
composer test
#Run with coverage report
composer test-coverage
```

## Coding Standards

This project follows PSR-12 coding standards. To check your code:
```bash
composer check-style
```

To automatically fix style issues:
```bash
composer fix-style
```


## Documentation

* If you're adding a new feature, please add documentation
* Update the README.md if needed
* Add PHPDoc blocks for new methods

## Git Commit Messages

* Use the present tense ("Add feature" not "Added feature")
* Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
* Limit the first line to 72 characters or less
* Reference issues and pull requests liberally after the first line

## Release Process

1. Update version number in relevant files
2. Update CHANGELOG.md
3. Create a new release on GitHub
4. Tag the release following semantic versioning

## Questions?

Don't hesitate to ask questions by creating an issue.

## License

By contributing, you agree that your contributions will be licensed under its MIT License.