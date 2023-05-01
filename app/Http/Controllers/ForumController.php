<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\ForumPost;
use App\Models\ForumTopic;

use App\Http\Requests\ForumTopicRequest;

class ForumController extends Controller
{
    
    public function showForum () : View {
        $forum_topics = ForumTopic::with(['user']);
        return view('forum', compact('forum_topics'));
    }

    public function createForumTopic(ForumTopicRequest $request) {
        $user_id = auth()->id();

        $tmp = ForumTopic::where('title', $request->forum_topic)->get();

        if (count($tmp) > 0) {
            $topic_id = $tmp->id;
            $path = '//forumtopic//'.$topic_id;
            Redirect::to($path);
            return view('forumtopic', compact('topic_id'));
        }

        $f_topic = new ForumTopic();

        $f_topic->title = $request->forum_topic;
        $f_topic->user_id = $user_id;

        $f_topic->save();
    }
}
