<?php

namespace App\Services\Settings;

use App\Repositories\Users\UserRepository;
use App\SettingPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Contracts\Auth\Authenticatable;
use \App\User;
use \Exception;

class SettingService
{
    /**
     * @var UserRepository $userRepository
     */
    private $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     * @return User|Authenticatable|null
     * @throws Exception
     */
    public function adminSetting(array $data)
    {
        if (isset($data['user_id']) && !empty($data['user_id'])) {
            $user = $this->userRepository->find($data['user_id']);
        } else {
            $user = Auth::user();
        }

        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return $user;
    }

    /**
     * @param array $data
     * @param SettingPage|null $settingPage
     * @return SettingPage|null
     */
    public function settingPage(array $data, ?SettingPage $settingPage = null): ?SettingPage
    {
        if ($settingPage) {
            $settingPage->update($data);

            return $settingPage;
        }

        return SettingPage::create($data);
    }
}