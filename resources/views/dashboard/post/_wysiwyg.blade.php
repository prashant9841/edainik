
@section('links')
	 <link href="/js/materialnote/css/materialNote.css" rel="stylesheet">
    <link href="/js/materialnote/css/codeMirror/codemirror.css" rel="stylesheet">
    <link href="/js/materialnote/css/codeMirror/monokai.css" rel="stylesheet">
    {{--<link href="/js/materialnote/css/main.css" rel="stylesheet">--}}
@stop


@section('scripts')
<script>
    var globalImageVariable = `
    <div class="row">
    @if(isset($post) && $post->getMedia('images')->count() > 0)
        @foreach($post->getMedia('images') as $image)
        <div class="card col s4">
            <div class="card-image ">
                <img class="nomorefootballmanagers" src="{{$image->getUrl('thumb') }}">
            </div>
        </div>
        @endforeach
    @endif
    <input id="materialnote-image" class="note-image-url" type="text" />
    </div>
    `;

</script>
    
    <script type="text/javascript" src="/js/materialnote/lib/materialize.js"></script>
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
        var url = '/dashboard/medias'

        $('#textarea').materialnote({
//            toolbar: toolbar,
            height: 200,
            minHeight: 100,
            defaultBackColor: '#e0e0e0',
              /*
            insertImage: $('#textarea').materialnote('insertImage', url, function ($image) {
                    console.log($image)
              $image.css('width', $image.width() / 3);
              $image.attr('data-filename', 'retriever');
            })
              */
        });

        $('.nomorefootballmanagers').on('click', function(event){
            console.log('Shite');
            var $this = $(this);
            console.log($this.innerHTML);
            var imageSource = $this.attr('src');
            $('#materialnote-image').attr('value',imageSource);
        });


	</script>
@stop