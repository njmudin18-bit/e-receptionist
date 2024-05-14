<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-dark bg-gradient">
  <div class="container">
    <a class="navbar-brand" href="{{ route('visitor.index') }}">
      <img src="{{ asset(config('appsproperties.COMPANY_LOGO')) }}" alt="{{ config('appsproperties.COMPANY_NAME') }}" width="auto" height="50" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="{{ route('visitor.index') }}">{{ strtoupper(config('appsproperties.COMPANY_NAME')) }}</a>
        </li>
      </ul>
      <span class="navbar-text">
        <strong class="text-white">{{ config('appsproperties.APPS_NAME') }}</strong>
      </span>
    </div>
  </div>
</nav>