<div>
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <div class="page-title-right">
          <ol class="breadcrumb m-0">
            <li class="breadcrumb-item">
              <a href="javascript: void(0);">{{ $title }}</a>
            </li>
            <li class="breadcrumb-item active {{ Request::is('/') ? 'd-none' : '' }}">{{ $subtitle }}</li>
          </ol>
        </div>
        <h4 class="page-title">{{ config('appsproperties.APPS_NAME') }}</h4>
      </div>
    </div>
  </div>
</div>