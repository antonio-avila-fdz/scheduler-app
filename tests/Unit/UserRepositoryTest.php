<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repositories\UserRepository;
use DateTimeZone;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    protected $repository;

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new UserRepository();
    }

    /**
     * Test getAll() returns all users
     */
    public function test_get_all_returns_all_users(): void
    {
        User::factory(4)->create();
        
        $users = $this->repository->getAll();

        $this->assertCount(4, $users);
    }

    /**
     * Test getByTimezones returns collection
     */
    public function test_get_by_timezone_returns_collection(): void
    {
        User::factory(4)->create();

        $timezones = DateTimeZone::listIdentifiers(DateTimeZone::AMERICA);

        $users = $this->repository->getByTimezones($timezones);

        $this->assertInstanceOf(Collection::class, $users);
    }
}
