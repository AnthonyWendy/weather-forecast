@extends('layouts.app')

@section('title', 'Comparar Cidades')

@section('content')
<div class="d-flex flex-column align-items-center min-vh-100 py-4" style="background-color: #F3E8FF;">

    <!-- Formulário para comparar duas cidades no topo -->
    <form method="POST" action="{{ route('weather.compare') }}"
        class="d-flex flex-column flex-md-row gap-2 w-100 justify-content-center mb-4 px-3">
        @csrf
        <input type="text" name="cidade1" placeholder="Cidade 1"
            class="form-control rounded-pill shadow-sm mb-2 mb-md-0"
            style="max-width: 220px; border: 1px solid #C179FF; background: #FFFFFF; color: #212121;"
            value="{{ old('cidade1') }}">
        <input type="text" name="cidade2" placeholder="Cidade 2"
            class="form-control rounded-pill shadow-sm mb-2 mb-md-0"
            style="max-width: 220px; border: 1px solid #C179FF; background: #FFFFFF; color: #212121;"
            value="{{ old('cidade2') }}">
        <button type="submit" class="btn btn-gradient px-4 text-white rounded-pill">
            Comparar
        </button>
    </form>

    <!-- Mensagem de erro -->
    @if(session('error'))
    <div class="alert alert-danger w-100 text-center mb-4 rounded shadow-sm" style="border-color: #E53935; background-color: #FFEAEA; color: #E53935;">
        {{ session('error') }}
    </div>
    @endif

    <!-- Cards de comparação -->
    <div class="d-flex flex-column flex-md-row gap-4 justify-content-center w-100 mt-4">
        @if(!empty($weather1) || !empty($weather2))
        <!-- Card Cidade 1 -->
        @if(!empty($weather1))
        <x-weatherCard
            :cidade="$weather1['cidade']"
            :pais="$weather1['pais']"
            :icone="$weather1['icone']"
            :descricao="$weather1['descricao']"
            :temperatura="$weather1['temperatura']"
            :sensacao="$weather1['sensacao']"
            :umidade="$weather1['umidade']"
            :vento="$weather1['vento']"
            :pressao="$weather1['pressao']"
            :uv_index="$weather1['uv_index']"
            :sunrise="$weather1['sunrise']"
            :sunset="$weather1['sunset']" />
        @endif

        <!-- Card Cidade 2 -->
        @if(!empty($weather2))
        <x-weatherCard
            :cidade="$weather2['cidade']"
            :pais="$weather2['pais']"
            :icone="$weather2['icone']"
            :descricao="$weather2['descricao']"
            :temperatura="$weather2['temperatura']"
            :sensacao="$weather2['sensacao']"
            :umidade="$weather2['umidade']"
            :vento="$weather2['vento']"
            :pressao="$weather2['pressao']"
            :uv_index="$weather2['uv_index']"
            :sunrise="$weather2['sunrise']"
            :sunset="$weather2['sunset']" />
        @endif
        @endif
    </div>
</div>

<style>
    .btn-gradient {
        background: linear-gradient(45deg, #953BEE, #C179FF);
        border: none;
        transition: all 0.3s ease;
    }
    .btn-gradient:hover {
        filter: brightness(1.1);
        transform: scale(1.05);
    }
    .weather-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(255, 255, 255, 0.5);
        display: block;
    }

    /* Ajuste responsivo somente para inputs e botão */
    @media (max-width: 767px) {
        form.d-flex {
            flex-direction: column !important;
            align-items: center;
        }
        form input,
        form button {
            width: 100% !important;
            max-width: 300px;
            margin-bottom: 0.5rem;
        }
    }
</style>
@endsection
