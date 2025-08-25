@props([
    'cidade' => '-',
    'pais' => '-',
    'icone' => '',
    'descricao' => '-',
    'temperatura' => '-',
    'sensacao' => '-',
    'umidade' => '-',
    'vento' => '-',
    'pressao' => '-',
    'uv_index' => '-',
    'sunrise' => '-',
    'sunset' => '-',
])

<div class="card shadow-lg text-center p-4 flex-fill rounded-3"
     style="background: linear-gradient(135deg, #953BEE, #C179FF); color: #FFFFFF;">
    <div class="card-body">
        <h4 class="card-title mb-3">{{ $cidade }}, {{ $pais }}</h4>
        <div class="d-flex justify-content-center mb-3">
            <img src="{{ $icone }}" alt="Ícone do clima" class="weather-icon">
        </div>
        <p class="card-text mb-1"><strong>Clima:</strong> {{ $descricao }}</p>
        <p class="card-text mb-1"><strong>Temperatura:</strong> {{ $temperatura }}°C (Sensação: {{ $sensacao }}°C)</p>
        <p class="card-text mb-1"><strong>Umidade:</strong> {{ $umidade }}%</p>
        <p class="card-text mb-1"><strong>Vento:</strong> {{ $vento }} km/h</p>
        <p class="card-text mb-1"><strong>Pressão:</strong> {{ $pressao }} hPa</p>
        <p class="card-text mb-1"><strong>UV Index:</strong> {{ $uv_index }}</p>
        <p class="card-text mb-0"><strong>Nascer / Pôr do sol:</strong> {{ $sunrise }} / {{ $sunset }}</p>
    </div>
</div>
