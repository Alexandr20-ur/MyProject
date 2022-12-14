@extends('admin.layouts.layout')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Главная</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Добавить категорию</a>

                    @if($categories->count())
                    <div class="table_responsive">
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 30px">#</th>
                                    <th>Наименование</th>
                                    <th>Slug</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                        <li class="fas fa-pencil-alt"></li>
                                    </a>
                                    <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление')">
                                            <li class="fas fa-trash-alt"></li>
                                        </button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    @else
                        <p>Категорий пока нет...</p>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $categories->onEachSide(2)->links('vendor.pagination.bootstrap-4')  }}
{{--                    <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                        <li class="page-item"><a class="page-link" href=""><<</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="">3</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="">>></a></li>--}}
{{--                    </ul>--}}
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
@endsection
