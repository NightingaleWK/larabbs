<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * 显示用户信息
     *
     * @param User $user 用户对象
     * @return string 视图用户展示页面
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * 展示编辑指定资源的表单。
     */
    public function edit(User $user)
    {
        // 检查当前用户是否有更新该用户的权限
        $this->authorize('update', $user);

        // 返回用户编辑页面的视图，同时传递用户对象到视图
        return view('users.edit', compact('user'));
    }

    /**
     * 更新用户资料
     *
     * @param UserRequest $request 用户请求对象
     * @param ImageUploadHandler $uploader 图片上传处理器对象
     * @param User $user 用户对象
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
        $this->authorize('update', $user);

        $data = $request->all();

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 416);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
