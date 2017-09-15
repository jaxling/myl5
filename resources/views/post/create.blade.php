@extends("layout.main")

@section("content")
<div class="row">
    <div class="col-md-8">
        <h3>新建文章</h3>

        <p>&nbsp;</p>

        <div class="row">
            <form action="/posts" method="POST">
                {{csrf_field()}}

                <div class="col-lg-8">
                    <div class="form-group field-contactform-subject required">
                        <label class="control-label" for="contactform-subject">标题</label>
                        <input type="text"  class="form-control" name="title" placeholder="这里是标题">

                    </div>
                    <div class="form-group field-contactform-body required">
                        <label class="control-label" for="contactform-body">内容</label>
                        <div id="editor"></div>
                        <input type="hidden" name="content" id="content" value="">
                    </div>

                    @include('layout.error')

                    <div class="form-group">
                        <button type="submit" onclick="return before()" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="/js/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        editor.customConfig.uploadImgServer = '/posts/upload'  // 上传图片到服务器
        editor.customConfig.uploadFileName = 'wangEditor_h5'
        editor.customConfig.uploadImgHeaders = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   // 属性值会自动进行 encode ，此处无需 encode
        }
        editor.customConfig.uploadImgHooks = {
            // 如果服务器端返回的不是 {errno:0, data: [...]} 这种格式，可使用该配置
            // （但是，服务器端返回的必须是一个 JSON 格式字符串！！！否则会报错）
            customInsert: function (insertImg, result, editor) {
                // 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
                // insertImg 是插入图片的函数，editor 是编辑器对象，result 是服务器端返回的结果

                // 举例：假如上传图片成功后，服务器端返回的是 {url:'....'} 这种格式，即可这样插入图片：
                var url = result.url
                insertImg(url)
                // result 必须是一个 JSON 格式字符串！！！否则报错
            }
        }
        editor.create()

        function before(){
            var con = editor.txt;
            $("#content").val(con.html());
            return true;
        }
    </script>
    @include("layout.right")
</div>
@endsection
