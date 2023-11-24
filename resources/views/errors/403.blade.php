@extends('layouts.app')
@section('title', '403')

@section('content')
    <div style="text-align: center  ">
        <h1 class="text-danger"><i class="fa-regular fa-hand"></i> 403</h1>
        <p>抱歉，您无权限执行刚才的动作，请勿随意尝试非法操作！</p>
        <a style='text-align: center' href="{{ url()->previous() }}">
            返回上一页
        </a>
    </div>
@stop
