@extends('frontend.pages.student.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-[#0c0c0f] text-gray-900 dark:text-white transition-colors duration-300">

    <main class="max-w-5xl mx-auto px-6 py-10">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-5 mb-10">
            <div>
                <h1 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-white mb-2">
                    My Documents
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 max-w-xl leading-relaxed">
                    Manage your uploaded documents. Share evidence of recognised prior learning, 
                    prerequisite completions, or identity documents with Lia College and your Assessor.
                </p>
            </div>

            <button onclick="send_setSessionVarsForUpload(`4250322`,'student_library_file','student','Anonymous','158','0')" 
                    class="shrink-0 inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-500 active:bg-blue-700 text-white text-sm font-medium rounded-lg transition-all active:scale-[0.97]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                </svg>
                Upload Document
            </button>
        </div>

        <!-- Empty State -->
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl min-h-[420px] flex flex-col items-center justify-center text-center p-10">
            
            <div class="w-16 h-16 rounded-2xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center mb-6">
                <svg class="w-7 h-7 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z"/>
                </svg>
            </div>

            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">No documents yet</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-8">
                You haven't uploaded any documents.<br>Upload your first document to get started.
            </p>

            <button onclick="send_setSessionVarsForUpload(`4250322`,'student_library_file','student','Anonymous','158','0')" 
                    class="inline-flex items-center gap-2 px-5 py-2.5 border border-gray-300 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-600 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 text-sm font-medium rounded-lg transition-all active:scale-[0.97]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Upload Your First Document
            </button>

            <p class="mt-6 text-xs text-gray-400 dark:text-gray-600">
                Supports PDF, JPG, PNG up to 10MB
            </p>
        </div>

        <!-- Hidden field (preserved exactly) -->
        <input type="hidden" id="docIdUploadLibrary" name="docIdUploadLibrary">

    </main>
</div>
@endsection