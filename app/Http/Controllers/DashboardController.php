<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $notifications = auth()->user()->unreadNotifications;

        return view('dashboard', compact('notifications'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function markArticle(Request $request): array
    {
        $success = true;

        try {
            User::find($request->get('userId'))
                ->unreadNotifications()->where('id', $request->get('notificationId'))->get()->markAsRead();
        } catch (\Exception) {
            $success = false;
        }

        return ['success' => $success];
    }
}
