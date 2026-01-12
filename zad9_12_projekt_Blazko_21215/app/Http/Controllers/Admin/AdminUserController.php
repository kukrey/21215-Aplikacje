<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of all users.
     */
    public function index(Request $request)
    {
        $query = User::with('role');

        // Filtrowanie po wyszukiwanej frazie (nazwa, email, domena)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filtrowanie po statusie aktywności
        if ($request->has('inactive') && $request->inactive == '1') {
            $sixMonthsAgo = Carbon::now()->subMonths(6);
            $query->where(function($q) use ($sixMonthsAgo) {
                $q->where('last_login_at', '<', $sixMonthsAgo)
                  ->orWhereNull('last_login_at');
            });
        }

        // Sortowanie - walidacja pól
        $allowedSortFields = ['id', 'name', 'email', 'created_at', 'last_login_at'];
        $sortBy = in_array($request->get('sort'), $allowedSortFields) ? $request->get('sort') : 'created_at';
        $sortDir = in_array(strtolower($request->get('dir')), ['asc', 'desc']) ? $request->get('dir') : 'desc';
        
        $query->orderBy($sortBy, $sortDir);

        $users = $query->paginate(20)->withQueryString();

        return view('admin.users.index', compact('users', 'sortBy', 'sortDir'));
    }

    /**
     * Display inactive users (not logged in for 6 months).
     */
    public function inactive()
    {
        $sixMonthsAgo = Carbon::now()->subMonths(6);
        
        $users = User::with('role')
            ->where(function($q) use ($sixMonthsAgo) {
                $q->where('last_login_at', '<', $sixMonthsAgo)
                  ->orWhereNull('last_login_at');
            })
            ->orderBy('last_login_at', 'asc')
            ->paginate(20);

        return view('admin.users.inactive', compact('users'));
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        // Prevent admin from deleting themselves
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Nie możesz usunąć swojego własnego konta!');
        }

        // Prevent deleting other admins
        if ($user->isAdmin()) {
            return redirect()->back()->with('error', 'Nie możesz usunąć konta administratora!');
        }

        $userName = $user->name;
        $user->delete();

        return redirect()->back()->with('success', "Użytkownik {$userName} został usunięty.");
    }

    /**
     * Delete multiple inactive users at once.
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id'
        ]);

        $userIds = $request->user_ids;
        
        // Remove current admin from the list
        $userIds = array_filter($userIds, fn($id) => $id != auth()->id());

        // Remove other admins from the list
        $adminRoleId = \App\Models\Role::where('name', 'admin')->first()?->id;
        $usersToDelete = User::whereIn('id', $userIds)
            ->where('role_id', '!=', $adminRoleId)
            ->get();

        $count = $usersToDelete->count();
        
        foreach ($usersToDelete as $user) {
            $user->delete();
        }

        return redirect()->back()->with('success', "Usunięto {$count} użytkowników.");
    }

    /**
     * Show form to set a new password for a user.
     */
    public function editPassword(User $user)
    {
        return view('admin.users.password', compact('user'));
    }

    /**
     * Update user's password.
     */
    public function updatePassword(Request $request, User $user)
    {
        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()
            ->route('admin.users.index', $request->only('search', 'inactive', 'sort', 'dir', 'page'))
            ->with('success', "Zmieniono hasło użytkownika {$user->name}.");
    }
}
