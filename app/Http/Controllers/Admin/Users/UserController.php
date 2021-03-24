<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;
use \Illuminate\Contracts\Foundation\Application;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @var UserRepository $userRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $data = $this->userRepository->findBy([]);

        return view('admin.users.index', [
            'data' => $data,
            'title' => 'Lista użytkowników'
        ]);
    }
}
