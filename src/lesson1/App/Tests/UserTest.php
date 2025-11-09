<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use App\Classes\User;
use GuzzleHttp\Client;
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
        $httpClient = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://192.168.1.117:8080',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $httpClient->request('GET', 'lesson1/App/Api/endpoint.php');
        $this->assertEquals(200, $response->getStatusCode());
    }

}
