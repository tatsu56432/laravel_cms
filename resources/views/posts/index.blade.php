@extends('layouts.index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">記事一覧</div>
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>タイトル</th>
                                <th>作成日</th>
                                <th>詳細ページリンク</th>
                            </tr>
                            </thead>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at->format('Y年m月d日') }}</td>
                                    <td>
                                        {{--{!! Form::model($post,--}}
                                        {{--['url' => [--}}
                                            {{--'posts', $post->id],--}}
                                            {{--'method' => 'delete',--}}
                                            {{--'class' => 'text-link'--}}
                                        {{--]) !!}--}}
                                        <a href="{{ action('PostsController@show', $post->id) }}"> リンク</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $posts->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection