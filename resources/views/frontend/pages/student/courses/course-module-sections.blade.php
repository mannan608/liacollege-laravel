<!-- Course Modules -->
            <div class="mb-12 flex flex-col gap-6 md:flex-row md:justify-between ">
                <div
                    class="w-full md:w-1/2 bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-950 flex items-center justify-between">
                        <h4 class="font-medium text-base md:text-lg text-gray-900 dark:text-white">Course Content Modules</h4>
                    </div>
                    <div class="space-y-4 p-4 md:p-5">
                        <!-- Unit Card 1 -->
                        <div
                            class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden">
                            <div class="px-6 py-5 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
                                <div class="flex items-center gap-3">
                                    <span class="font-medium text-gray-900 dark:text-white">HLTAID011 Provide First
                                        Aid</span>
                                </div>
                                <a href="#" class="px-5 py-2.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100
                                                text-white dark:text-gray-900 rounded-lg text-xs font-medium
                                                transition-colors">
                                                    Read All
                                                </a>

                            </div>

                            <table class="w-full text-sm">
                                <thead class="bg-gray-50 dark:bg-gray-950 border-b border-gray-200 dark:border-gray-800">
                                    <tr>
                                        <th class="text-left pl-6 py-4 font-medium text-gray-500 dark:text-gray-400">Content Module
                                        </th>
                                        <th class="text-right pr-6 py-4 font-medium text-gray-500 dark:text-gray-400">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                                    @foreach ($course->modules as $module)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                            <td class="pl-6 py-5">
                                                <div class="font-medium text-gray-900 dark:text-white">
                                                    {{ $module->title }}
                                                </div>
                                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">eLearning
                                                    Presentation
                                                    (SCORM)
                                                </div>
                                            </td>

                                            <td class="pr-6 text-right">
                                                <a href="{{ route('student.course-quiz-module', [
                                                    'course' => $course->id,
                                                    'module' => $module->id,
                                                ]) }}"
                                                    class="px-5
                                                py-2.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100
                                                text-white dark:text-gray-900 rounded-lg text-xs font-medium
                                                transition-colors">
                                                    Read
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                     <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-950 flex items-center justify-between">
                        <h4 class="font-medium text-base md:text-lg text-gray-900 dark:text-white">Course Quiz Modules</h4>
                    </div>
                    <div class="space-y-4 p-4 md:p-5">
                        <!-- Unit Card 1 -->
                        <div
                            class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden">
                            <div
                                class="px-6 py-5 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
                                <div class="flex items-center gap-3">

                                    <span class="font-medium text-gray-900 dark:text-white">HLTAID011 Provide First
                                        Aid</span>
                                </div>
                            </div>

                            <table class="w-full text-sm">
                                <thead class="bg-gray-50 dark:bg-gray-950 border-b border-gray-200 dark:border-gray-800">
                                    <tr>
                                        <th class="text-left pl-6 py-4 font-medium text-gray-500 dark:text-gray-400">Quiz Module
                                        </th>
                                        <th class="text-center py-4 font-medium text-gray-500 dark:text-gray-400">Status
                                        </th>
                                        <th class="text-center py-4 font-medium text-gray-500 dark:text-gray-400">Result
                                        </th>
                                        <th class="text-right pr-6 py-4 font-medium text-gray-500 dark:text-gray-400">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                                    @foreach ($course->modules as $module)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                            <td class="pl-6 py-5">
                                                <div class="font-medium text-gray-900 dark:text-white">
                                                    {{ $module->title }}
                                                </div>
                                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">eLearning
                                                    Presentation
                                                    (SCORM)
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="inline-flex items-center px-3 py-1.5 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-400 text-xs font-medium">Completed</span>
                                            </td>
                                            <td class="text-center font-medium text-emerald-600 dark:text-emerald-400">100%
                                            </td>
                                            <td class="pr-6 text-right">
                                                <a href="{{ route('student.course-quiz-module', [
                                                    'course' => $course->id,
                                                    'module' => $module->id,
                                                ]) }}"
                                                    class="px-5
                                                py-2.5 bg-gray-900 hover:bg-gray-800 dark:bg-white dark:hover:bg-gray-100
                                                text-white dark:text-gray-900 rounded-lg text-xs font-medium
                                                transition-colors">
                                                    Open
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>