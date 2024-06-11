<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PosedQuestion;
use App\Models\FaqQuestion;
use Auth;

class PosedQuestionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
        ]);

        PosedQuestion::create([
            'user_id' => Auth::id(),
            'question' => $request->question,
        ]);

        return redirect()->back()->with('success', 'Question posed successfully.');
    }

    public function index()
    {
        $posedQuestions = PosedQuestion::where('answered', false)->get();
        return view('admin.posed_questions.index', compact('posedQuestions'));
    }

    public function answer(Request $request, PosedQuestion $posedQuestion)
    {
        $request->validate([
            'answer' => 'required|string',
        ]);

        $faqQuestion = FaqQuestion::create([
            'category_id' => $request->category_id,
            'question' => $posedQuestion->question,
            'answer' => $request->answer,
        ]);

        $posedQuestion->update(['answered' => true]);

        return redirect()->back()->with('success', 'Question answered and added to FAQ.');
    }
}
