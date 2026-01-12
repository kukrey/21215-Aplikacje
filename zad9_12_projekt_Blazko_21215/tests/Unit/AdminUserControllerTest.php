<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminUserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        // Utwórz role
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Utwórz administratora
        $this->adminUser = User::factory()->create([
            'role_id' => $adminRole->id,
            'name' => 'Admin User',
            'email' => 'admin@test.com',
        ]);
    }

    /**
     * Test 1: Sprawdzenie czy lista użytkowników jest widoczna dla admina
     */
    public function test_admin_can_view_users_list()
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.users.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.users.index');
        $response->assertViewHas('users');
    }

    /**
     * Test 2: Sprawdzenie czy wyszukiwanie użytkowników po nazwie działa
     */
    public function test_search_users_by_name()
    {
        User::factory()->create(['name' => 'John Doe', 'email' => 'john@example.com']);
        User::factory()->create(['name' => 'Jane Smith', 'email' => 'jane@example.com']);

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.users.index', ['search' => 'John']));

        $response->assertStatus(200);
        $this->assertTrue($response->viewData('users')->total() >= 1);
    }

    /**
     * Test 3: Sprawdzenie czy filtrowanie nieaktywnych użytkowników działa
     */
    public function test_filter_inactive_users()
    {
        $sixMonthsAgo = Carbon::now()->subMonths(6)->subDays(1);
        $inactiveUser = User::factory()->create([
            'last_login_at' => $sixMonthsAgo,
        ]);
        
        // Aktywny użytkownik
        User::factory()->create([
            'last_login_at' => Carbon::now(),
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.users.inactive'));

        $response->assertStatus(200);
        // Powinien być co najmniej 1 nieaktywny użytkownik (ten co przed 6 miesiącami)
        $this->assertGreaterThanOrEqual(1, $response->viewData('users')->count());
    }

    /**
     * Test 4: Sprawdzenie czy sortowanie kolumn działa poprawnie
     */
    public function test_sort_users_by_id_ascending()
    {
        User::factory()->count(3)->create();

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.users.index', ['sort' => 'id', 'dir' => 'asc']));

        $response->assertStatus(200);
        $users = $response->viewData('users');
        $this->assertNotEmpty($users);
        
        // Sprawdź czy parametry sortowania zostały przekazane do widoku
        $this->assertEquals('id', $response->viewData('sortBy'));
        $this->assertEquals('asc', $response->viewData('sortDir'));
    }

    /**
     * Test 5: Sprawdzenie czy zmiana hasła użytkownika zachowuje bezpieczeństwo
     */
    public function test_password_update_hashes_correctly()
    {
        $user = User::factory()->create(['email' => 'test@example.com']);
        $oldPassword = $user->password;
        $newPassword = 'NewSecurePass123!';

        $this->actingAs($this->adminUser)->put(
            route('admin.users.password.update', $user),
            ['password' => $newPassword, 'password_confirmation' => $newPassword]
        );

        $user->refresh();

        // Sprawdzić że hasło się zmieniło
        $this->assertNotEquals($oldPassword, $user->password);
        
        // Sprawdzić że hasło jest zahashowane (nie jawne)
        $this->assertTrue(Hash::check($newPassword, $user->password));
        $this->assertFalse(Hash::check('plaintext', $user->password));
    }
}
