<div
    x-data="{
        editor:null,

        init(){

            ClassicEditor
                .create($refs.editor, CKEditorConfig)
                .then(editor=>{

                    this.editor = editor;

                    editor.setData(@js($value ?? ''));

                    editor.model.document.on('change:data',()=>{
                        $refs.input.value = editor.getData();
                    });

                });

        }
    }"
>

    <textarea x-ref="editor"></textarea>

    <input
        type="hidden"
        name="{{ $name }}"
        x-ref="input">

</div>