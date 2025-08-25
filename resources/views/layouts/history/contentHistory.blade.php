@extends('layouts.app')

@section('title', 'Histórico de Pesquisas')

@section('content')
<div class="container py-4" style="background-color: #F3E8FF; border-radius: 1rem;">

    <h2 class="mb-4 text-center fw-bold" style="color: #212121;">Histórico de Pesquisas</h2>

    <form action="{{ route('weather.pesquisarHistorico') }}" method="GET" class="row g-2 mb-4 justify-content-center">
        <div class="col-auto">
            <input type="text" name="busca" class="form-control rounded-pill shadow-sm" placeholder="Cidade ou País" value="{{ request('busca') }}" style="max-width: 220px; border: 1px solid #C179FF; background: #FFFFFF; color: #212121;">
        </div>
        <div class="col-auto">
            <input type="number" name="temperatura" class="form-control rounded-pill shadow-sm" placeholder="Temperatura (°C)" value="{{ request('temperatura') }}" style="max-width: 150px; border: 1px solid #C179FF; background: #FFFFFF; color: #212121;">
        </div>
        <div class="col-auto">
            <input type="date" name="data" class="form-control rounded-pill shadow-sm" value="{{ request('data') }}" style="max-width: 180px; border: 1px solid #C179FF; background: #FFFFFF; color: #212121;">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-gradient text-white rounded-pill px-4">
                Pesquisar
            </button>
        </div>
    </form>

    @if($weathers->isEmpty())
        <p class="text-center text-secondary">Nenhum registro encontrado.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle rounded shadow-sm" style="background: #FFFFFF;">
                <thead style="background-color: #953BEE; color: #FFFFFF; border-radius: 0.5rem;">
                    <tr>
                        <th>#</th>
                        <th>Cidade</th>
                        <th>País</th>
                        <th>Temperatura (°C)</th>
                        <th>Descrição</th>
                        <th>Umidade (%)</th>
                        <th>Vento (km/h)</th>
                        <th>Pressão (hPa)</th>
                        <th>Horário da Pesquisa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($weathers as $weather)
                        <tr>
                            <td>{{ $weather->id }}</td>
                            <td>{{ $weather->cidade }}</td>
                            <td>{{ $weather->pais }}</td>
                            <td>{{ $weather->temperatura }}</td>
                            <td>{{ $weather->descricao }}</td>
                            <td>{{ $weather->umidade }}</td>
                            <td>{{ $weather->vento }}</td>
                            <td>{{ $weather->pressao }}</td>
                            <td>{{ $weather->created_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

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

    table thead tr th {
        border: none;
        text-align: center;
        padding: 0.75rem 1rem;
        font-weight: 600;
    }

    table tbody tr td {
        text-align: center;
        vertical-align: middle;
        color: #4A4A4A;
        padding: 0.75rem 0.5rem;
    }

    table tbody tr:hover {
        background-color: #EDE1FF;
        cursor: default;
    }

    @media (max-width: 767px) {
        table thead {
            display: none;
        }
        table tbody tr {
            display: block;
            margin-bottom: 1rem;
            background: #FFFFFF;
            border-radius: 0.5rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            padding: 0.5rem;
        }
        table tbody tr td {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem;
        }
        table tbody tr td::before {
            content: attr(data-label);
            font-weight: 600;
            color: #212121;
        }
    }
</style>
@endsection
