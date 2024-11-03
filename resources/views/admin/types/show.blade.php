@extends('layouts.app')

@section('page-title', $type->title)

@section('main-content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body text-center">
                    <h1 class=" text-success">
                        {{ $type->title }}
                    </h1>

                    <h6>
                        {{-- modificato il formato della data --}}
                        Created at {{ $type->created_at->format('d/m/Y - H:i')}}
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    <ul>
                        <li>
                            ID: {{ $type->id }}
                        </li>

                        <li>
                            Slug: {{ $type->slug }}
                        </li>
                    </ul>

                    {{-- rotta alla view per modificare il progetto, specificando il parametro del singolo progetto --}}
                    <a class="btn btn-outline-warning btn-sm" href="{{ route('admin.types.edit', ['type' => $type->id]) }}">
                        ໒(⊙ᴗ⊙)७✎
                    </a>

                    {{-- form con rotta a destroy() + parametro, per eliminare il progetto --}}
                    <form action="{{ route('admin.types.destroy', ['type'=> $type->id] ) }}" method="POST" class="d-inline-block"
                        onsubmit="return confirm('Are u sure u want to delete this type? ໒(x‸x)७')"    
                    >
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm">
                                ໒(x‸x)७
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
