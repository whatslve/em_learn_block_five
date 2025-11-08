<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use App\Classes\User;
class FakeClient  {
    public string $baseUri;
    public int $statusCode;
    public function __construct($baseUri) {
        $this->baseUri = $baseUri;
    }

    public function request($type, $action) {
        //request
        $this->statusCode = 200;
        return $this;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }
}
class UserTest extends TestCase {
    public function test_get_user() {
        $user = new User();
        $this->assertEquals("John Doe", $user->getUser());
    }

    public function testUserCanBeCreated(): void
    {
        $user = new User('John Doe');
        $this->assertInstanceOf(User::class, $user);
    }
    public function testUserFullName(): void
    {
        $testData = 'John doe';
        $user = new User($testData);
        $this->assertEquals($testData . ' fullname', $user->getFullName());
    }

    public function testUserApiReturnsUsers(): void
    {
        $client = new FakeClient('127.0.0.1:8000');
        $response = $client->request('GET', '/users');

        $this->assertEquals(200, $response->getStatusCode());
    }

}
