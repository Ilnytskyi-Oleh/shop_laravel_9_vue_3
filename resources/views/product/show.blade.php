@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукт: {{ $product->title }}</h1>
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

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('product.edit', $product) }}" class="btn btn-primary">Редактировать</a>
                            <div class="d-inline-block ml-2 ">
                                <form action="{{ route('product.delete', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Точно удалить?')"
                                            class="btn btn-danger" >Удалить</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>ID:</td>
                                        <td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Тайтл:</td>
                                        <td>{{ $product->title }}</td>
                                    </tr>
                                    <tr>
                                        <td> Описание:</td>
                                        <td>{{ \Illuminate\Support\Str::words($product->description, 10) }}</td>
                                    </tr>
                                    <tr>
                                        <td> Контент:</td>
                                        <td>{{ \Illuminate\Support\Str::words($product->content, 10) }}</td>
                                    </tr>
                                    <tr>
                                        <td> Изображение:</td>
                                        <td><img height="100" width="100" src="{{asset('storage/'. $product->preview_image)}}" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td>Ціна:</td>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                    <tr>
                                        <td>Стара ціна:</td>
                                        <td>{{ $product->old_price ?? '-'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Кількість на складі:</td>
                                        <td>{{ $product->count }}</td>
                                    </tr>
                                    <tr>
                                        <td>Категорія:</td>
                                        <td>{{ $product->category->title }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
