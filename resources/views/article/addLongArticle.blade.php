@extends('layouts.index')
@section('pagecss')
    <link rel="stylesheet" href="/assets/plugins/select2/select2.min.css">
@endsection
@section('content')
        <!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content" style="margin:0 13px 0 13px;">
    <div class="row">
        <form action="" id="dataForm">
        <div class="col-xs-12">
            <div class="box-body table-responsive">
                <table class="table table-hover table-bordered table-striped">
                    <tr class="success">
                        <th align="right" width="20%" class="text-center">主标题<span class="text-red">*</span>:</th>
                        <td width="80%"><input type="text" name="title" class="form-control" /></td>
                    </tr>
                    <tr class="success">
                        <th align="right" width="20%" class="text-center">副标题:</th>
                        <td width="80%"><input type="text" name="subtitle" class="form-control" /></td>
                    </tr>
                    <tr class="success">
                        <th align="right" width="20%" class="text-center">引言:</th>
                        <td width="80%"><textarea name="introduction" class="form-control" ></textarea></td>
                    </tr>
                    <tr class="success">
                        <th align="right" width="20%" class="text-center">上传封面<span class="text-red">*</span>:</th>
                        <td width="80%"><input type="file" name="article_pic" /></td>
                    </tr>
                </table>

            </div>

            <div class="box-body table-responsive">
                <input type="button" class="btn btn-xs btn-success" value="增加内容" id="addContentBtn"> (内容可拖动排序)
            </div>

            <div class="box-body table-responsive sortable" id="contentDiv">
                <table class="table table-hover table-bordered table-striped">
                    <tr class="success">
                        <th align="right" class="text-center" rowspan="3" width="20%">
                            <button type="button" class="btn btn-xs btn-danger deleteContentBtn">删除内容</button>
                        </th>
                    </tr>
                    <tr class="success">
                        <td class="text-center" width="20%">类型:
                            <select name="contentType[]" class="form-control contentType">
                                <option value="">请选择类型</option>
                                <option value="1">标题</option>
                                <option value="2">图片</option>
                                <option value="3">正文</option>
                            </select>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-hover table-bordered table-striped">
                    <tr class="success">
                        <th align="right" width="20%" class="text-center">话题标签<span class="text-red">*</span>:</th>
                        <td width="80%">
                            @foreach($opTags as $tag)
                                <input type="checkbox" name="tag[]" value="{{$tag['id']}}"  />{{$tag['tag_content']}}
                            @endforeach
                        </td>
                    </tr>
                    <tr class="success">
                        <th align="right" width="20%" class="text-center">品牌车系车型:</th>
                        <td width="80%">
                            <select style="width: 150px;" name="brandId" class="select2" id="brandId">
                                <option value="">请选择品牌</option>
                                @foreach($brandList as $val)
                                    <option value="{{$val['brandid']}}">{{$val['brandname']}}</option>
                                @endforeach
                            </select>
                            <select style="width: 150px;" name="seriesId" class="select2" id="seriesId">
                                <option value="">请选择车系</option>
                            </select>
                            <select style="width: 300px;" name="modeId" class="select2" id="modeId">
                                <option value="">请选择车型</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="success">
                        <th align="right" width="20%" class="text-center">请选择机器人性别<span class="text-red">*</span>:</th>
                        <td width="80%">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <div>
                                        <div style="float: left;">
                                            <label>选择机器人种类：</label>
                                            <input type="hidden" class="form-control" id="user_type" name='user_type' value="1">
                                            <button type="button" class="btn btn-primary category">普通</button>
                                            <button type="button" class="btn category">大V机器人</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"  ></div>
                            <div class="form-group profile">
                                <div class="col-sm-10">
                                    <div>
                                        <div style="float: left;">
                                            <input type="radio" name="gender" value="1" checked data-num="{{$robotNum['male']}}" >&nbsp;男（共{{$robotNum['male']}}人）
                                            <input type="radio" name="gender" value="2" data-num="{{$robotNum['female']}}">&nbsp;女（共{{$robotNum['female']}}人）
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group profile" style="display:none">
                                <div class="col-sm-10">
                                    <div>
                                        <div style="float: left;">
                                            <input type="hidden" value="" name="v_userid" id="v_userid">
                                            <a href="/longArticle/getVRobot" class="fancybox fancybox.iframe btn btn-primary">选择大V机器人</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

        </div>

        <div id="btnDiv" class="box-footer clearfix text-center">
            <input type="button" class="btn btn-success hidden" id="viewBtn" value="生成H5预览">
            <input type="button" class="btn btn-danger" id="pubBtn" value="保存发布">
        </div>

        </form>

        <table class="table table-hover table-bordered table-striped hidden" id="contentTableHide">
            <tr class="success">
                <th align="right" class="text-center" rowspan="3" width="20%">
                    <button type="button" class="btn btn-xs btn-danger deleteContentBtn">删除内容</button>
                </th>
            </tr>
            <tr class="success">
                <td class="text-center" width="20%">类型:
                <select name="contentType[]" class="form-control contentType">
                    <option value="">请选择类型</option>
                    <option value="1">标题</option>
                    <option value="2">图片</option>
                    <option value="3">正文</option>
                </select>
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>
</section>
<!-- /.content -->

@endsection
@section('pagejs')
    <script type="text/javascript" src="/assets/plugins/select2/select2.full.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".select2").select2();
            toastr.options = {
                "positionClass": "toast-top-center",
                "preventDuplicates": true
            };
            //发布按钮
            $('#pubBtn').click(function(){
                var _this = $(this);
                _this.val('处理中...');
                var formData = new FormData($('#dataForm')[0]);
                $.ajax({
                    type : 'post',
                    url : '/longArticle/addLongArticle',
                    data : formData,
                    dataType :'json',
                    processData : false,
                    contentType : false,
                    error : function(){
                        toastr.error('提交失败,请重试');
                        _this.val('保存发布');
                    },
                    success : function(response){
                        if(response.code == 1){
                            alert(response.msg);
                            window.parent.$.fancybox.close();
                        }else{
                            toastr.error(response.msg);
                        }
                        _this.val('保存发布');
                    }
                });
                return false;
            });
            //选择品牌
            $('#brandId').change(function(){
                var brandId = $(this).val();
                if(!brandId){
                    return false;
                }
                $.get('/longArticle/getSeriesList',{brandId:brandId},function(response){
                    $('#select2-seriesId-container').attr('title','请选择车系').html('请选择车系');
                    $('#seriesId').html(response);
                });
            });
            //选择车系
            $('#seriesId').change(function(){
                var seriesId = $(this).val();
                if(!seriesId){
                    return false;
                }
                $.get('/longArticle/getModeList',{seriesId:seriesId},function(response){
                    $('#select2-modeId-container').attr('title','请选择车型').html('请选择车型');
                    $('#modeId').html(response);
                });
            });
            //增加内容
            $('#addContentBtn').click(function(){
                var table = $('#contentTableHide').clone().removeClass('hidden').removeAttr('id');
                $('#contentDiv').append(table);
            });
            //删除内容
            $(document).on('click','.deleteContentBtn',function(){
                $(this).parents('table').remove();
            });
            $(document).on('change','.contentType',function(){
                var val = $(this).val();
                if(val == 1 || val == 3){
                    $(this).parent().next().html('内容:<textarea name="content[]" class="form-control" ></textarea> <input type="file" name="content_pic[]" class="hidden" />');
                }else if(val == 2){
                    $(this).parent().next().html('上传:<input type="file" name="content_pic[]" /> <input type="text" name="content[]" class="form-control hidden" />');
                }
            });
            //机器人选择
            $(".category").each(function(i,ele){
                $(this).on('click',function(e){
                    $(".category").removeClass('btn-primary');
                    $(this).addClass('btn-primary');
                    $(".profile").hide();
                    $(".profile").eq(i).show();
                    if (i == 0){
                        $("#user_type").val(1);
                    }else{
                        $("#user_type").val(2);
                    }
                })
            })
            //内容拖动排序
            $( ".sortable" ).sortable({
                cursor: "move",
                items : "table",                        //只是li可以拖动
                opacity: 0.6,                       //拖动时，透明度为0.6
                revert: true,                       //释放时，增加动画
                update : function(event, ui){       //更新排序之后
                    //alert($(this).sortable("toArray"));
                }
            });
        });
    </script>
@endsection
