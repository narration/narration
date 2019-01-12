<p align="center">
    <img title="Narration" height="300" src="https://raw.githubusercontent.com/narration/narration/master/docs/request-handler.png" />
</p>

<p align="center">
  <a href="https://travis-ci.org/narration/narration"><img src="https://img.shields.io/travis/narration/narration/master.svg" alt="Build Status"></img></a>
  <a href="https://scrutinizer-ci.com/g/narration/narration"><img src="https://img.shields.io/scrutinizer/g/narration/narration.svg" alt="Quality Score"></img></a>
  <a href="https://packagist.org/packages/narration/narration"><img src="https://poser.pugx.org/narration/narration/d/total.svg" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/narration/narration"><img src="https://poser.pugx.org/narration/narration/v/stable.svg" alt="Latest Version"></a>
  <a href="https://packagist.org/packages/narration/narration"><img src="https://poser.pugx.org/narration/narration/license.svg" alt="License"></a>
</p>

**This is a work in progress**.

Narration is the source for modern PHP - Using PHPStan, it enforces the
implementation of proven patterns to bring resilience, reliability, and
coordination to your web application.

## Quick start

> **Requires [PHP 7.1.3+](https://php.net/releases/)**

Create your package using [Composer](https://getcomposer.org):

```bash
composer create-project narration/narration blog --stability=dev --prefer-source
```

Then, serve the appplication:
```
php -S 127.0.0.1:8000 serve.php
```

Visit the page `http://127.0.0.1:8000/`.

## Structure

### Presentation

TODO...

### Application

Defines the jobs the software is supposed to do and directs the expressive domain objects to work out problems.
The tasks this layer is responsible for are meaningful to the business or necessary for interaction with
the application layers of other systems. This **layer is kept thin**.

#### Http > Request Handlers

HTTP request handlers are a fundamental part of any web application. Server-side code receives a
request message, processes it, and produces a response message:
```php
final class Get implements RequestHandlerInterface
{
    /**
     * Handle the given request.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return Response::json([
            'fresh' => 'start'
        ]);
    }
}
```

Request handlers **should** be placed `Appplication/Http/RequestHandlers` to be
detected by the Narration Framework. The routes are defined from the folder structure, and the `verb` is the name
of the request handler. As example, the route `POST /users` can be defined
creating the following Request Handler: `Appplication/Http/RequestHandlers/Users/Post.php`. This
convention leads code that is easier to maintain, refactor and test.

#### Http > Middleware

An HTTP middleware component participates in processing an HTTP message. It acts
on the request, generating the response, or forwarding the request to a subsequent middleware
and possibly acting on its response. It provides a convenient mechanism for filtering
HTTP requests entering your application:
```php
final class TrimStrings implements MiddlewareInterface
{
    /**
     * Filters the given request before or after sending it to the handler.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request
     * @param  \Psr\Http\Server\RequestHandlerInterface $handler
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        foreach ($request->getAttributes() as $name => $value) {
            if (is_string($value)) {
                $request = $request->withAttribute($name, trim($value));
            }
        }

        return $handler->handle($request);
    }
}
```

Middleware(s) **should** be placed `Appplication/Http/RequestHandlers` to be
detected by the Narration Framework.

#### Injectors

An injector injects the dependencies of the application on the container. They **should**
be placed `Appplication/Injectors` to be detected by the Narration Framework. TODO...


### Domain

Responsible for representing concepts of the business, information
about the business situation, and business rules. State that reflects
the business situation is controlled and used here, even though the
technical details of storing it are delegated to the infrastructure.
This layer is the **heart of business software**.

### Infrastructure

The infrastructure layer is how the data that is initially held in domain entities (in memory) is
persisted in databases or another persistent store. An example is using Doctrine code to implement the
Repository pattern classes that use Entities to **persist data** in a relational database.

## Contributing

Thank you for considering to contribute to skeleton-php. All the contribution guidelines are mentioned [here](CONTRIBUTING.md).

You can have a look at the [CHANGELOG](CHANGELOG.md) for constant updates & detailed information about the changes. You can also follow the twitter account for latest announcements or just come say hi!: [@enunomaduro](https://twitter.com/enunomaduro)

## Support the development
**Do you like this project? Support it by donating**

- PayPal: [Donate](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66BYDWAT92N6L)
- Patreon: [Donate](https://www.patreon.com/nunomaduro)

## Credits

Lot of this readme is based on [Design a DDD-oriented microservice](https://docs.microsoft.com/en-us/dotnet/standard/microservices-architecture/microservice-ddd-cqrs-patterns/ddd-oriented-microservice) by Microsoft.

## License

Narration is an open-sourced software licensed under the [MIT license](LICENSE.md).
