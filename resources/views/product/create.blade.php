@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить продукт</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Имя...">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" value="{{ old('description') }}" class="form-control" placeholder="Описание...">
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="content" class="form-control" placeholder="Контент..."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" value="{{ old('price') }}" class="form-control" placeholder="Цена...">
                    </div>
                    <div class="form-group">
                        <input type="number" name="old_price" value="{{ old('old_price') }}" class="form-control" placeholder=" Старая цена...">
                    </div>
                    <div class="form-group">
                        <input type="number" name="count" value="{{ old('count') }}" class="form-control" placeholder="Количество...">
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Виберите категорию</option>
                            @foreach($categories as $category)
                                <option  value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Теги</label>
                        <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option  value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Цвет</label>
                        <select class="select2" name="colors[]" multiple="multiple" data-placeholder="Выберите цвет" style="width: 100%;">
                            @foreach($colors as $color)
                                <option  value="{{ $color->id }}">{{ $color->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="preview_image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузка</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-primary" value="Добавить">
                    </div>

                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
