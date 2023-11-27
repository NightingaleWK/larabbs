<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF Token --}}
    @csrf

    <title>@yield('title', 'LaraBBS') - LaraBBS 进阶教程</title>

    {{-- vite --}}
    @vite(['resources/js/app.js'])

    <link href="https://unpkg.com/@wangeditor/editor@latest/dist/css/style.css" rel="stylesheet">
</head>

<body>
    <div id='app' class="{{ route_class() }}-page">
        @include('layouts._header')
        <div class="container">
            @include('shared._messages')

            @yield('content')
        </div>
        @include('layouts._footer')
    </div>

    <script src="https://unpkg.com/@wangeditor/editor@latest/dist/index.js"></script>
    <script>
        const {
            createEditor,
            createToolbar
        } = window.wangEditor

        const editorConfig = {
            placeholder: 'Type here...',
            onChange(editor) {
                const html = editor.getHtml()
                console.log('editor content', html)
                // 也可以同步到 <textarea>
            }
        }

        const editor = createEditor({
            selector: '#editor-container',
            html: '<p><br></p>',
            config: editorConfig,
            mode: 'default', // or 'simple'
        })

        const toolbarConfig = {}

        const toolbar = createToolbar({
            editor,
            selector: '#toolbar-container',
            config: toolbarConfig,
            mode: 'default', // or 'simple'
        })
    </script>
</body>

</html>
