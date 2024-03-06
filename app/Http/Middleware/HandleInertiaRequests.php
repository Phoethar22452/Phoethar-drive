<?php

namespace App\Http\Middleware;

use App\Models\File;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $user = $request->user();
        $file = File::where('created_by', $user->id)
                    ->where('is_folder', 1)
                    ->whereNull('deleted_at')
                    ->whereNull('parent_id')
                    ->first();
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $user,
            ],
            'folder' => [
                'id' => $file->id,
            ]
        ];
    }
}
