@extends('layouts.app')

@section('title', 'Edit Lesson')

@section('content')
<div class="min-h-screen bg-slate-50 p-6 md:p-10" x-data="lessonEditor()">
    <div class="max-w-5xl mx-auto">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800">Lesson Edit</h1>
            <p class="text-slate-500 mt-1">Manage resources for your lesson</p>
        </div>

        <!-- Lesson Title Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-6">
            <label class="block text-sm font-semibold text-slate-700 mb-2">Lesson Title</label>
            <input 
                type="text" 
                name="lesson_title"
                value="{{ old('lesson_title', $lesson->title ?? 'Introduction to Laravel') }}" 
                class="w-full text-xl font-bold text-slate-800 border-b-2 border-indigo-500 focus:outline-none focus:border-indigo-600 bg-transparent pb-2 transition-colors"
                placeholder="Enter lesson title..."
            >
        </div>

        <!-- Resource Type Selector -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-6">
            <label class="block text-sm font-semibold text-slate-700 mb-4">Select Resource Type</label>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach([
                    ['video', 'Video', 'text-red-500'],
                    ['content', 'Content', 'text-emerald-500'],
                    ['file', 'File', 'text-amber-500'],
                    ['quiz', 'Quiz', 'text-violet-500']
                ] as [$type, $label, $color])
                <button 
                    @click="selectedType = '{{ $type }}'"
                    :class="selectedType === '{{ $type }}' 
                        ? 'ring-2 ring-indigo-500 bg-indigo-50 border-indigo-200' 
                        : 'bg-white border-slate-200 hover:border-indigo-300 hover:bg-slate-50'"
                    class="flex flex-col items-center gap-3 p-5 rounded-xl border transition-all duration-200 cursor-pointer"
                >
                    <!-- Icon placeholder - use your own SVGs -->
                    <div :class="selectedType === '{{ $type }}' ? '{{ $color }}' : 'text-slate-400'" class="transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/>
                        </svg>
                    </div>
                    <span :class="selectedType === '{{ $type }}' ? 'text-indigo-700 font-semibold' : 'text-slate-600 font-medium'" class="text-sm">
                        {{ $label }}
                    </span>
                </button>
                @endforeach
            </div>
        </div>

        <!-- Dynamic Resource Form -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-6">
            
            <!-- Video Section -->
            <div x-show="selectedType === 'video'" x-cloak x-transition>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <span class="text-red-500">▶</span> Video Resources
                    </h2>
                    <button @click="addVideo()" type="button" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                        <span class="text-lg leading-none">+</span> Add Video
                    </button>
                </div>

                <div class="space-y-4">
                    <template x-for="(video, index) in videos" :key="index">
                        <div class="relative bg-slate-50 rounded-xl border border-slate-200 p-5 group hover:border-indigo-200 transition-colors">
                            <button @click="removeVideo(index)" type="button" class="absolute top-3 right-3 p-1.5 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                ✕
                            </button>
                            <div class="flex items-center gap-3 mb-4">
                                <span class="flex items-center justify-center w-8 h-8 bg-indigo-100 text-indigo-700 text-xs font-bold rounded-lg" x-text="index + 1"></span>
                                <span class="text-sm font-semibold text-slate-500">Video <span x-text="index + 1"></span></span>
                            </div>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wide">Video Title</label>
                                    <input type="text" x-model="video.title" :name="`videos[${index}][title]`" placeholder="e.g. Introduction" 
                                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wide">YouTube URL</label>
                                    <input type="url" x-model="video.url" :name="`videos[${index}][url]`" placeholder="https://youtube.com/..." 
                                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Content Section -->
            <div x-show="selectedType === 'content'" x-cloak x-transition>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <span class="text-emerald-500">📝</span> Content Resources
                    </h2>
                    <button @click="addContent()" type="button" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                        <span class="text-lg leading-none">+</span> Add Content
                    </button>
                </div>

                <div class="space-y-4">
                    <template x-for="(content, index) in contents" :key="index">
                        <div class="relative bg-slate-50 rounded-xl border border-slate-200 p-5 group hover:border-emerald-200 transition-colors">
                            <button @click="removeContent(index)" type="button" class="absolute top-3 right-3 p-1.5 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                ✕
                            </button>
                            <div class="flex items-center gap-3 mb-4">
                                <span class="flex items-center justify-center w-8 h-8 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-lg" x-text="index + 1"></span>
                                <span class="text-sm font-semibold text-slate-500">Content <span x-text="index + 1"></span></span>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wide">Content Title</label>
                                    <input type="text" x-model="content.title" :name="`contents[${index}][title]`" placeholder="e.g. What is Laravel" 
                                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wide">Description</label>
                                    <textarea x-model="content.description" :name="`contents[${index}][description]`" rows="4" placeholder="Enter content description..." 
                                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all resize-y"></textarea>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- File Section -->
            <div x-show="selectedType === 'file'" x-cloak x-transition>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <span class="text-amber-500">📎</span> File Resources
                    </h2>
                    <button @click="addFile()" type="button" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                        <span class="text-lg leading-none">+</span> Add File
                    </button>
                </div>

                <div class="space-y-4">
                    <template x-for="(file, index) in files" :key="index">
                        <div class="relative bg-slate-50 rounded-xl border border-slate-200 p-5 group hover:border-amber-200 transition-colors">
                            <button @click="removeFile(index)" type="button" class="absolute top-3 right-3 p-1.5 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                ✕
                            </button>
                            <div class="flex items-center gap-3 mb-4">
                                <span class="flex items-center justify-center w-8 h-8 bg-amber-100 text-amber-700 text-xs font-bold rounded-lg" x-text="index + 1"></span>
                                <span class="text-sm font-semibold text-slate-500">File <span x-text="index + 1"></span></span>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wide">File Title</label>
                                    <input type="text" x-model="file.title" :name="`files[${index}][title]`" placeholder="e.g. Laravel Cheatsheet" 
                                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wide">Upload File</label>
                                    <div 
                                        @dragover.prevent="file.dragOver = true"
                                        @dragleave.prevent="file.dragOver = false"
                                        @drop.prevent="handleFileDrop($event, index)"
                                        :class="file.dragOver ? 'border-amber-400 bg-amber-50' : 'border-slate-300 bg-white'"
                                        class="relative border-2 border-dashed rounded-xl p-8 text-center transition-all cursor-pointer hover:border-amber-400"
                                        @click="$refs['fileInput'+index].click()"
                                    >
                                        <input type="file" :x-ref="'fileInput'+index" @change="handleFileSelect($event, index)" class="hidden" accept=".pdf,.doc,.docx,.ppt,.pptx" :name="`files[${index}][file]`">
                                        <p class="text-sm font-medium text-slate-700">
                                            <span x-show="!file.fileName">Drop your file here, or <span class="text-amber-600">browse</span></span>
                                            <span x-show="file.fileName" x-text="file.fileName" class="text-amber-700"></span>
                                        </p>
                                        <p class="text-xs text-slate-400 mt-1">PDF, DOC, PPT up to 10MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Quiz Section -->
            <div x-show="selectedType === 'quiz'" x-cloak x-transition>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <span class="text-violet-500">❓</span> Quiz Resources
                    </h2>
                    <button @click="addQuiz()" type="button" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                        <span class="text-lg leading-none">+</span> Add Quiz
                    </button>
                </div>

                <div class="space-y-4">
                    <template x-for="(quiz, index) in quizzes" :key="index">
                        <div class="relative bg-slate-50 rounded-xl border border-slate-200 p-5 group hover:border-violet-200 transition-colors">
                            <button @click="removeQuiz(index)" type="button" class="absolute top-3 right-3 p-1.5 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                ✕
                            </button>
                            <div class="flex items-center gap-3 mb-4">
                                <span class="flex items-center justify-center w-8 h-8 bg-violet-100 text-violet-700 text-xs font-bold rounded-lg" x-text="index + 1"></span>
                                <span class="text-sm font-semibold text-slate-500">Quiz <span x-text="index + 1"></span></span>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wide">Quiz Title</label>
                                    <input type="text" x-model="quiz.title" :name="`quizzes[${index}][title]`" placeholder="e.g. Laravel Basics Quiz" 
                                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-violet-500/20 focus:border-violet-500 transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wide">Question</label>
                                    <textarea x-model="quiz.question" :name="`quizzes[${index}][question]`" rows="3" placeholder="Enter your question..." 
                                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-violet-500/20 focus:border-violet-500 transition-all resize-y"></textarea>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

        </div>

        <!-- Action Bar -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('lessons.index') }}" class="px-6 py-2.5 text-slate-600 font-medium hover:bg-slate-100 rounded-lg transition-colors">Cancel</a>
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm transition-colors">Save Lesson</button>
        </div>

    </div>

    <script>
        function lessonEditor() {
            return {
                selectedType: 'video',
                videos: @json(old('videos', $lesson->videos ?? [['title' => 'Introduction', 'url' => 'https://youtube.com/...'], ['title' => 'Installation', 'url' => 'https://youtube.com/...']])),
                contents: @json(old('contents', $lesson->contents ?? [['title' => 'What is Laravel', 'description' => 'Lorem ipsum...']])),
                files: @json(old('files', $lesson->files ?? [['title' => '', 'fileName' => '', 'dragOver' => false]])),
                quizzes: @json(old('quizzes', $lesson->quizzes ?? [['title' => '', 'question' => '']])),
                
                addVideo() { this.videos.push({ title: '', url: '' }); },
                removeVideo(index) { this.videos.splice(index, 1); },
                addContent() { this.contents.push({ title: '', description: '' }); },
                removeContent(index) { this.contents.splice(index, 1); },
                addFile() { this.files.push({ title: '', fileName: '', dragOver: false }); },
                removeFile(index) { this.files.splice(index, 1); },
                addQuiz() { this.quizzes.push({ title: '', question: '' }); },
                removeQuiz(index) { this.quizzes.splice(index, 1); },
                
                handleFileSelect(event, index) {
                    const file = event.target.files[0];
                    if (file) this.files[index].fileName = file.name;
                },
                handleFileDrop(event, index) {
                    this.files[index].dragOver = false;
                    const file = event.dataTransfer.files[0];
                    if (file) this.files[index].fileName = file.name;
                }
            }
        }
    </script>
</div>
@endsection