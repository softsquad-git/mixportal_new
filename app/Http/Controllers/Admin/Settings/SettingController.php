<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\AdminSettingRequest;
use App\Http\Requests\Settings\SettingPageRequest;
use App\Repositories\Settings\SettingRepository;
use App\Repositories\Users\UserRepository;
use App\Services\Settings\SettingService;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use \Exception;
use \Illuminate\View\View;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\Foundation\Application;

class SettingController extends Controller
{
    /**
     * @var UserRepository $userRepository
     */
    private $userRepository;

    /**
     * @var SettingService $settingService
     */
    private $settingService;

    /**
     * @var SettingRepository $settingRepository
     */
    private $settingRepository;

    /**
     * @param UserRepository $userRepository
     * @param SettingService $settingService
     * @param SettingRepository $settingRepository
     */
    public function __construct(
        UserRepository $userRepository,
        SettingService $settingService,
        SettingRepository $settingRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->settingService = $settingService;
        $this->settingRepository = $settingRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.settings.index', [
            'title' => 'Ustawienia',
            'users' => $this->userRepository->findBy(['exception' => Auth::id()]),
            'settings' => $this->settingRepository->findAll()
        ]);
    }

    /**
     * @param AdminSettingRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function save(AdminSettingRequest $request): RedirectResponse
    {
        $this->settingService->adminSetting($request->all());

        return redirect()->route('admin.settings.index');
    }

    /**
     * @param SettingPageRequest $request
     * @param int|null $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function saveSettingPage(SettingPageRequest $request, int $id = null): RedirectResponse
    {
        $item = null;
        if ($id) {
            $item = $this->settingRepository->find($id);
        }

        $this->settingService->settingPage($request->all(), $item);

        return redirect()->route('admin.settings.index');
    }
}
