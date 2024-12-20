<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    // 1. Hiển thị danh sách vấn đề

    public function index()
    {
        $issues = Issue::with('computer')->get(); // Lấy thông tin từ bảng issues và bảng computers
        return view('issues.index', compact('issues'));
    }

    // 2. Hiển thị form tạo vấn đề mới

    public function create()
    {
        $computers =Computer::all();
        return view('issues.create', compact('computers'));
    }

    // 3. Lưu vấn đề mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')
            ->with('success', 'Vấn đề đã được thêm mới.');
    }

    // 4. Hiển thị form cập nhật vấn đề
    public function edit(string $id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issue = Issue::find($id);
        $issue->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Thông tin vấn đề đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa.');
    }
}