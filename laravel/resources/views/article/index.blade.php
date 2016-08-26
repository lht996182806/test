@extends('layouts.index')

@section('con')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>文章列表</span>
    </div>
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
        <form action="/admin/article/index" method="get">
            <div id="DataTables_Table_1_length" class="dataTables_length">
            <label>显示
                <select name="num" value="
                @if(!empty($request['num']))
                    {{$request['num']}}
                @endif" name="DataTables_Table_1_length" size="1" aria-controls="DataTables_Table_1">
                    <option value="10" 
                    @if(!empty($request['num']) && $request['num']==10)
                        selected
                    @endif 

                    >10</option>
                    <option value="25" 
                     @if(!empty($request['num']) && $request['num']==25)
                        selected
                    @endif
                    >25</option>
                    <option value="50"
                    @if(!empty($request['num']) && $request['num']==50)
                        selected
                    @endif
                    >50</option>
                    <option value="100"
                    @if(!empty($request['num']) && $request['num']==100)
                        selected
                    @endif
                    >100</option>
                </select>条
            </label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>搜索: 
                <input name="keywords" type="text" 
                value="@if(!empty($request['keywords'])){{$request['keywords']}}@endif" aria-controls="DataTables_Table_1">
                    <button class="btn btn-primary">查询</button>
                </label>
            </div>
        </form>
         <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
            <tr role="row">
                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 156px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 212px;" aria-label="Browser: activate to sort column ascending">标题</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 197px;" aria-label="Platform(s): activate to sort column ascending">简介</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Engine version: activate to sort column ascending">图片</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Engine version: activate to sort column ascending">作者</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Engine version: activate to sort column ascending">类别</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Engine version: activate to sort column ascending">创建时间</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 97px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
            </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($list as $k=>$v)
                @if($k%2==0)
                    <tr class="odd">
                @else
                    <tr class="even">
                @endif
            
                <td class="  sorting_1">{{$v->id}}</td>
                <td class=" ">{{$v->title}}</td>
                <td class=" ">{{$v->descr}}</td>
                <td class=" "><img src="{{$v->pic}}" width="50px" alt=""></td>
                <td class=" ">{{$v->username}}</td>
                <td class=" ">{{$v->name}}</td>
                <td class=" ">{{date('Ymd',$v->create_t)}}</td>
                <td class=" ">
                    &nbsp;&nbsp;
                    <a info="{{$v->id}}" onclick="delFun(this)" class="icon-trash" style="color:black;font-size:20px"></a>
                   
                    &nbsp;&nbsp;
                    <a href="/admin/article/edit/{{$v->id}}" class="icon-wrench" style="color:black;font-size:16px"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="dataTables_info" id="DataTables_Table_1_info">文章列表</div>
       <div class="dataTables_paginate paging_full_numbers" id="pages">
        {!!$list->appends($request)->render()!!}
        
        </div>
    </div>

</div>
<script type="text/javascript">
        function delFun(obj){
        //     var r=layer.confirm('确定要删除吗?');
             var id=obj.getAttribute('info');
        //     if(r==true){
        //         location.href="/admin/article/del/"+id;
                
        //     }else{
        //         return false;
        //     }
        // }
        var r=layer.confirm('确定要删除吗?', {
              btn: ['干掉它','再想想'] //按钮
            }, function(){
              layer.msg('Good bey', {icon: 1});
              location.href="/admin/article/del/"+id;
            }, function(){
              layer.msg('三思而后行', {
                time: 1000, //20s后自动关闭
                btn: ['ok']
              });
            }); 
    }
    </script>

@endsection
