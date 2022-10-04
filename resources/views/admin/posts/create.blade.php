@extends('admin.layouts.layout')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Новый пост</h1>
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
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Новый пост</h3>
                            </div>

                            <form role="form" method="post" action="{{ route('categories.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Название</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Название">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Цитата</label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Цитата..."></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Контент</label>
                                        <textarea class="form-control" name="content" id="content" cols="30" rows="7" placeholder="Контент..."></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id">Категория</label>
                                            <select class="form-control" id="category_id" name="category_id">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tags">Теги</label>
                                    <select class="select2" multiple="multiple" data-placeholder="Выбор тегов" style="width: 100%;" name="tags[]" id="tags">
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Загрузка изображения</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->

@endsection
