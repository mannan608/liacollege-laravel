<div data-completion-type="quiz">

      <div id="quizContainer">
    {{-- Start screen --}}
    <button
        id="startQuizBtn"
        data-url="{{ route('student.lessonQuiz.show', $lesson) }}"
        class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-xl">
        Start Quiz
    </button>
</div>

</div>


<script>
document.getElementById('startQuizBtn').addEventListener('click', function () {

    const url = this.dataset.url;

    fetch(url, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.text())
    .then(html => {
        document.getElementById('quizContainer').innerHTML = html;
    })
    .catch(error => {
        console.error(error);
    });

});
</script>