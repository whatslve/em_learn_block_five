<?php
namespace Tests;
require_once __DIR__ . '/../../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use App\Classes\User;
use App\Classes\UserRepositoryInterface;

final class MockTest extends TestCase
{
    public function testFindUserByEmailIsCalled(): void
    {
        $email = 'john@example.com';
        $user = new User('John Doe');

        $repoMock = $this->createMock(UserRepositoryInterface::class);

        $repoMock->expects($this->once())
            ->method('findUserByEmail')
            ->with($this->equalTo($email))
            ->willReturn($user);

        $result = $repoMock->findUserByEmail($email);

    }
}
