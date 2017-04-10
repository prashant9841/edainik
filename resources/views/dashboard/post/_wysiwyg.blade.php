
@section('links')
	 <link href="/js/materialnote/css/materialNote.css" rel="stylesheet">
    <link href="/js/materialnote/css/codeMirror/codemirror.css" rel="stylesheet">
    <link href="/js/materialnote/css/codeMirror/monokai.css" rel="stylesheet">
    {{--<link href="/js/materialnote/css/main.css" rel="stylesheet">--}}
@stop


@section('scripts')
    <script type="text/javascript" src="/js/materialnote/js/ckMaterializeOverrides.js"></script>

    <script type="text/javascript" src="/js/materialnote/lib/codeMirror/codemirror.js"></script>
    <script type="text/javascript" src="/js/materialnote/lib/codeMirror/xml.js"></script>
    <script type="text/javascript" src="/js/materialnote/js/materialNote.js"></script>
	<script>
		  //normal editor
        var toolbar = [
            ['style', ['style', 'bold', 'italic', 'underline', 'strikethrough', 'clear']],
            ['fonts', ['fontsize', 'fontname']],
            ['color', ['color']],
            ['undo', ['undo', 'redo', 'help']],
            ['ckMedia', ['ckImageUploader', 'ckVideoEmbeeder']],
            ['misc', ['link', 'picture', 'table', 'hr', 'codeview', 'fullscreen']],
            ['para', ['ul', 'ol', 'paragraph', 'leftButton', 'centerButton', 'rightButton', 'justifyButton', 'outdentButton', 'indentButton']],
            ['height', ['lineheight']],
        ];

        $('#textarea').materialnote({
//            toolbar: toolbar,
            height: 200,
            minHeight: 100,
            defaultBackColor: '#e0e0e0'
        });

	</script>
@stop