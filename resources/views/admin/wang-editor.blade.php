<div class="{{$viewClass['form-group']}}">

    <label class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <div {!! $attributes !!} style="width: 100%; height: 100%;">
            <p>{!! $value !!}</p>
        </div>

        <input type="hidden" name="{{$name}}" value="{{ old($column, $value) }}" />

        @include('admin::form.help-block')

    </div>
</div>

<!-- script标签加上 "init" 属性后会自动使用 Dcat.init() 方法动态监听元素生成 -->
<script require="@wang-editor" init="{!! $selector !!}">
    var E = window.wangEditor
    // id 变量是 Dcat.init() 自动生成的，是一个唯一的随机字符串
    var editor = new E('#' + id);

    editor.config.zIndex = 0
    editor.config.excludeMenus = [
        'video'
    ]
    // editor.config.pasteFilterStyle = false  //过滤粘贴样式
    editor.config.showLinkImg = false
    editor.config.uploadImgMaxLength = 1
    editor.config.uploadImgServer = '{{ route('dcat.admin.upload.images') }}'
    editor.config.uploadFileName = 'image'
    editor.config.uploadImgParams = {
        _token: Dcat.token
    }

    editor.config.languageType = [
        'PHP',
        'Html',
        'JavaScript',
        'TypeScript',
        'CSS',
        'Bash',
        'JSON',
        'Python',
        'Markdown',
        'SQL',
        'Java',
        'C',
        'C#',
        'C++',
        'Plain text',
        'XML',
        'Go',
        'Kotlin',
        'Lua',
        'Shell Session',
        'Ruby',
    ]

    editor.config.onchange = function (html) {
        $this.parents('.form-field').find('input[type="hidden"]').val(html);
    }

    editor.create()
</script>
