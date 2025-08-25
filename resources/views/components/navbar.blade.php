<nav class="navbar navbar-expand-lg shadow-sm rounded" style="background-color: #F3E8FF;">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand fw-bold text-dark" href="#" style="color: #953BEE; font-size: 1.8rem;">
      Amplimed
    </a>

    <!-- Botão para mobile -->
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
      style="color: #953BEE;">
      <span class="navbar-toggler-icon"></span>
    </button>


    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item mx-2">
          <a class="nav-link fw-semibold rounded px-3 py-2" href="{{ route('weather.telaBuscar') }}">
            Pesquisar
          </a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link fw-semibold rounded px-3 py-2" href="{{ route('weather.compare') }}">
            Comparar
          </a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link fw-semibold rounded px-3 py-2" href="{{ route('weather.historico') }}">
            Históricos
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
  /* Navbar links */
  .navbar-nav .nav-link {
    color: #212121;
    /* Texto principal preto escuro */
    transition: all 0.3s ease;
  }

  .navbar-nav .nav-link:hover {
    background-color: #C179FF;
    /* Hover leve roxo claro */
    color: #FFFFFF;
    /* Texto branco em hover */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    /* Sutil elevação */
  }

  /* Botão toggle no mobile */
  .navbar-toggler:hover {
    color: #7B2FF7;
    /* Destaque roxo médio */
  }

  /* Logo */
  .navbar-brand:hover {
    color: #7B2FF7;
  }

  /* Bordas arredondadas e padding */
  .nav-link {
    border-radius: 8px;
    padding: 0.5rem 1rem;
  }

  /* Minimalista: remove bordas e fundo padrão */
  .navbar,
  .navbar-nav .nav-link,
  .navbar-toggler {
    border: none;
  }
</style>