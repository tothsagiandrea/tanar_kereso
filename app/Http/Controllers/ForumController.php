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
        $forum_topics = ForumTopic::all();

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

        if ($f_topic->save()) {
            $forum_topics = ForumTopic::all();
             Redirect::to('/forum');
             return view('forum', compact('forum_topics'));
        } else {
            return redirect()->back()->withErrors(['msg' => 'Hiba történt a létrehozás közben.']);
        }
    }

    public function showForumTopicPage($topic_id) {
        $forum_posts = ForumPost::where('topic_id', $topic_id)->get();
        $forum_topics = ForumTopic::find($topic_id);

        return view('forumtopic', compact('forum_posts', 'forum_topics'));
    }

    public function postForum(Request $request) {
        $user_id = auth()->id();
        $topic_id = $request->topic;

        $forum_post = new ForumPost();
        $forum_post->sn_number =  ForumPost::where('topic_id', $topic_id)->max('sn_number') + 1;
        if (isset($request->answers_to)) {
            $forum_post->answer_to = $request->answers_to;
        }
        $forum_post->post = $request->forum_post;
        $forum_post->topic_id = $request->topic;
        $forum_post->user_id = $user_id;
        
        if ($forum_post->save()) {
            $forum_posts = ForumPost::where('topic_id', $topic_id)->get();
            $forum_topics = ForumTopic::find($topic_id);
            $path = '//forumtopic//'.$topic_id;
            Redirect::to($path);
            return view('forumtopic', compact('forum_posts', 'forum_topics'));
        } else {
            return redirect()->back()->withErrors(['msg' => 'Hiba történt a létrehozás közben.']);
        }
    }

    public function showAnswerForumPost($id) {
        $forumpost = ForumPost::find($id);
        $answers_to = $id;
        $f_post = ForumPost::find($id);
        $forum_posts = ForumPost::where('topic_id', $forumpost->topic_id)->get();
        $forum_topics = ForumTopic::find($forumpost->topic_id);
        $path = '//forumtopic//'.$forumpost->topic_id;
        Redirect::to($path);

        return view('forumtopic', compact('forum_posts', 'forum_topics', 'answers_to', 'f_post'));
    }
}
