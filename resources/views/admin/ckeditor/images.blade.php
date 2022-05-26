<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Browser Images</title>

    <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
           var funcNum = <?php echo $_GET['CKEditorFuncNum'] . ';'; ?>
            $('#fileExplorer').on('click', function() {
                var fileUrl = $(this).attr('title');
                window.opener.CKEDITOR.tools.callFunction(funcNum, fileUrl);
                window.close();
           }).hover(function() {
               $(this).css('cursor', 'pointer');
           });
        });
    </script>

    <style type="text/css">
        ul.file-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        ul.file-list li {
            float: left;
            margin: 5px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        ul.file-list img {
            display: block;
            margin: 0 auto;
        }
        ul.file-list li:hover {
            background: cornsilk;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="fileExplorer">
        @foreach($fileNames as $file)
            <div class="thumbnail">
                <ul class="file-list">
                    <li>
                        <img src="{{ asset('uploads/images/ckeditor/' . $file) }}" alt="thump"
                             title="{{ asset('uploads/images/ckeditor/' . $file) }}" height="130"> <br>
                        <span style="color: blue;">{{ $file }}</span>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
</body>
</html>
