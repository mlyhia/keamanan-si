<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    // TAMPILKAN DAFTAR USER
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();

        return view('admin.users.index', compact('users'));
    }

    // UPDATE ROLE USER
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => ['required', 'in:user,admin,super_admin'],
        ]);

        // Opsional: cegah super admin mengubah role dirinya sendiri
        if ($request->user()->id === $user->id) {
            return back()->with('error', 'Tidak bisa mengubah role diri sendiri.');
        }

        $user->role = $request->role;
        $user->save();

        return back()->with('status', 'Role user berhasil diubah.');
    }

    // HAPUS USER
    public function destroy(Request $request, User $user)
    {
        // Opsional: cegah super admin menghapus dirinya sendiri
        if ($request->user()->id === $user->id) {
            return back()->with('error', 'Tidak bisa menghapus akun diri sendiri.');
        }

        $user->delete();

        return back()->with('status', 'User berhasil dihapus.');
    }

    public function unlock(User $user)
    {
        // opsional: jangan unlock kalau user bukan benar-benar terblokir
        if (! $user->is_blocked) {
            return back()->with('status', 'Akun ini tidak dalam status blokir.');
        }

        $user->is_blocked = false;
        $user->failed_login_attempts = 0;
        $user->save();

        return back()->with('status', 'Blokir akun berhasil dibuka.');
    }

}
