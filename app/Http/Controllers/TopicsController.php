<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	public function index(Request $request, Topic $topic)
	{
		$topics = $topic->withOrder($request->order)
			->with('user', 'category')  // 预加载防止 N+1 问题
			->paginate(20);
		return view('topics.index', compact('topics'));
	}

	public function show(Request $request, Topic $topic)
	{
		// URL 矫正
		if (!empty($topic->slug) && $topic->slug != $request->slug) {
			return redirect($topic->link(), 301);
		}

		return view('topics.show', compact('topic'));
	}

	public function create(Topic $topic)
	{
		$categories = Category::all();
		return view('topics.create_and_edit', compact('topic', 'categories'));
	}

	public function store(TopicRequest $request, Topic $topic)
	{
		$topic->fill($request->all());
		$topic->user_id = Auth::id();
		$topic->save();

		return redirect()->to($topic->link())->with('success', '帖子创建成功！');
	}

	public function edit(Topic $topic)
	{
		$this->authorize('update', $topic);
		return view('topics.create_and_edit', compact('topic'));
	}

	public function update(TopicRequest $request, Topic $topic)
	{
		$this->authorize('update', $topic);
		$topic->update($request->all());

		return redirect()->to($topic->link())->with('message', 'Updated successfully.');
	}

	public function destroy(Topic $topic)
	{
		$this->authorize('destroy', $topic);
		$topic->delete();

		return redirect()->route('topics.index')->with('message', 'Deleted successfully.');
	}
}
