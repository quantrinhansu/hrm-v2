@extends('layouts.app')
@section('title','Danh Sách Phòng Ban')
@section('script')

<link rel="stylesheet" href="assets/css/jquery-ui.css">
<script src="assets/js/jquery-1.9.1.js"></script>
<script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="list_department">

<!--BEGIN TITLE & BREADCRUMB PAGE-->
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Phòng Ban</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Danh Sách Phòng Ban</li>
    </ol>
    <div class="clearfix"></div>
</div>
<!--END TITLE & BREADCRUMB PAGE-->
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success" id="report_delete" style="display: none">Đã xoá phòng ban thành công</div>
                <div class="alert alert-success" id="report_add" style="display: none">Bạn đã thêm phòng ban thành công</div>
                <div class="alert alert-success" id="report_edit" style="display: none">Bạn đã sửa phòng ban thành công</div>
                <div id="generalTabContent" class="tab-content responsive">
                @if(Auth::User()->hasRole('supper_admin') || Auth::User()->hasRole('admin'))
                    <a class="btn btn-info btn_access_save btn_add_modal"><i class="fa fa-plus">&nbsp;Thêm</i></a>
                @endif
                    <h3>Danh Sách Phòng Ban</h3>
                    <div class="row">
                    @foreach($department as $de)
                        <div class="col-sm-6 col-md-3" id="department_{{$de['id']}}">
                        @if(Auth::User()->hasRole('supper_admin') || Auth::User()->hasRole('admin'))
                            <button type="button" data-target="#modal-default" data-id="{{$de['id']}}" data-toggle="modal" class="btn btn-primary btn-xs btn_delete" style="float:right; margin-left: 5px; margin-right: 5px;"><i class="fa fa-trash-o"></i></button>

                            <a class="btn_update" id="{{$de['id']}}" style="float:right; "><span class="glyphicon glyphicon-pencil"></span></a>
                        @endif
                            <div class="thumbnail"><img src="images/department.png" width="150px"/>
                           
                            <div class="caption"><h3 style="text-align: center;"><span id="name_{{$de['id']}}">{{$de['name']}}</span></h3>
                                 
                                <p style="text-align: center;">Trưởng Phòng: <span id="manager_{{$de['id']}}">
                                    @foreach($manager_department as $md)
                                        @if($md['department_id'] == $de['id'])
                                            {{$md->User['name']}}
                                        @endif
                                    @endforeach
                                </span></p>

                                <p style="text-align: center;"><a href="department/detail/{{$de['id']}}" role="button" class="btn btn-primary">Chi Tiết</a>          
                                </p>

                            </div>
                            </div>
                        </div>
                    @endforeach
                        <div class="new_department"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal delete-->
<div id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default-label"
     aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
               <h4 id="modal-default-label" class="modal-title">Xóa</h4></div>
           <div class="modal-body">Bạn có chắc chắn muốn xóa không?</div>
           <div class="modal-footer">
               <button type="button" data-dismiss="modal" class="btn btn-default">Không</button>
               <button type="button" data-dismiss="modal" class="btn btn-primary btn_confirm">Có</button>
           </div>
       </div>
   </div>
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
   
    <!-- /.modal-dialog --> 
</div>

 <!-- Edit -->
<div class="modal fade"  id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

      <!-- /.modal-dialog -->
</div>
<!-- End Edit   -->

<script type="text/javascript">
$(document).ready(function(){
    $('.btn_add_modal').click(function(){
      $modal = $('#add');
      $modal.load("department/add");
      $modal.modal('show');
    });



    $('.btn_update').click(function(){
        var id =  $(this).attr('id');
        $modal = $('#edit');
        $modal.load("department/edit/" + id);
        $modal.modal('show');
    });
    
    $('.btn_delete').click(function(){
        var id= $(this).data('id');
        $('.btn_confirm').click(function(){
             $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $.ajax({
                type: 'POST',
                url: 'department/delete',
                dataType: 'text',
                data: {id : id },
                success: function(data){
                    $('#department_' + id).remove();
                    $("#report_delete").show();
                    setTimeout(function()
                    {
                        $('#report_delete').fadeOut();
                    },4000);
                }
            });
        });
    });
});
</script>
@endsection