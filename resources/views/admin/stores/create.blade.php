@extends('layouts.app')

@section('content')
<h1>Criar loja</h1>
<form action="{{route('admin.stores.store')}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label>Nome da Loja</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">

        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Telefone</label>
        <input type="text" name="phone" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Celular/Whatsapp</label>
        <input type="text" name="mobile_phone" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div>
        <button type="submit" class="btn btn-success">Criar</button>
    </div>
</form>
@endsection