@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex flex-column align-items-center min-vh-100 py-4">

    <form method="POST" action="{{ route('weather.buscar') }}"
        class="d-flex flex-column flex-md-row gap-2 w-100 justify-content-center mb-4">
        @csrf
        <input type="text" id="cep" name="cep" placeholder="CEP" class="form-control form-control-custom me-md-2 mb-2 mb-md-0">
        <input type="text" id="cidade" name="cidade" placeholder="Nome da Cidade" class="form-control form-control-custom me-md-2 mb-2 mb-md-0">
        <button type="submit" id="buscarBtn" class="btn btn-gradient px-4 text-white rounded-pill">Buscar</button>
    </form>

    <div id="WeatherInfoCard" class="w-100 d-flex justify-content-center mt-4">
        @if(isset($weather))
            <x-weatherCard
                :cidade="$weather['cidade']"
                :pais="$weather['pais']"
                :icone="$weather['icone']"
                :descricao="$weather['descricao']"
                :temperatura="$weather['temperatura']"
                :sensacao="$weather['sensacao']"
                :umidade="$weather['umidade']"
                :vento="$weather['vento']"
                :pressao="$weather['pressao']"
                :uv_index="$weather['uv_index']"
                :sunrise="$weather['sunrise']"
                :sunset="$weather['sunset']" />
        @endif
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const cepInput = document.getElementById('cep');
    const cidadeInput = document.getElementById('cidade');

    cepInput.addEventListener('input', () => { if (cepInput.value) cidadeInput.value = ''; });
    cidadeInput.addEventListener('input', () => { if (cidadeInput.value) cepInput.value = ''; });
});
</script>
@endpush
@endsection
