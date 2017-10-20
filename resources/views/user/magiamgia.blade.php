@extends('master')
@section('content')

<div class="content-main-inner row-fluid">
  <div class="span12">
    <div id="system-message-container">
    </div>

  </div>
  <div id="breadcrumb" class="span12">
    <!--<div class="yt-position-inner">-->
      <div class="module">

        <div class="modcontent clearfix">

          <ul class="breadcrumb ">


            <li></li><li></li></ul>
          </div>

        </div>

      </div>
      <div id="yt_component" class="span12">
        <div class="component-inner">
          <div class="component-inner2">
            <div class="registration">
              <div class="page-header">
                <h1 style="color: black">Mã giảm giá</h1>
              </div>
              <div class="col-sm-3"></div>
              @if(count($errors)>0)
              <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                {{$error}}<br>
                @endforeach
              </div>
              @endif
              @if(Session::has('message'))
              <div class="alert alert-danger">{{Session::get('message')}}</div>
              @endif
              @if(Session::has('thanhcong'))
              <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
              @endif
              @if (count($danhSachMa)==0)
                
              @else
               <div id="listBills">
                <table style="font-size: 14px;color: black" class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr align="center" >
                            
                            <th class="title">STT</th>
                            <th class="title">Mã</th>
                            <th class="title">Phần trăm giảm</th>
                            <th class="title">Mô tả</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                      @php
                        $i=1;
                      @endphp
                        @foreach($danhSachMa as $chitiet)
                        <tr id="{{$chitiet->id}}" value ="{{$chitiet->id}}" class="odd gradeX" align="center">
                            <td>{!!$i!!}</td>
                            <td>{{$chitiet->name}}</td>
                                                        
                           
                            <td>{{$chitiet->value}} %</td>
                            <td>{{$chitiet->description}}</td>
                            
                        </tr>
                        @php
                        $i++;
                      @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            </div>

          </div>
          @if (count($danhSachMa)>5)
                
              
          <div class="pagging-sort" style="margin-bottom: 10px">
                    <div class="pagination clearfix">
                        {{ $danhSachMa->links() }}
                    </div>
                    @endif

                </div>
                <div class="clear"></div>
        <a href="{{ url()->previous() }}" style="height: 36px;background: #0077b3;
        background-position: 0 -160px;color: #fff;cursor: pointer;
          text-align: center;padding: 10px;border-radius: 5px"

         id="back"  class="">Quay lại</a>
        </div>
      </div>
      
      
@endsection

  
      


