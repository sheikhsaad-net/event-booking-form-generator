<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Soci Sostenitori</p>
              <h5 class="font-weight-bolder">142</h5>
              <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">+12%</span>
                rispetto al 2025
              </p>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-dark shadow-primary text-center rounded-circle" style="background: #8B0000 !important;">
              <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Totale Funaioli</p>
              <h5 class="font-weight-bolder">850</h5>
              <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">+5%</span>
                nuove iscrizioni
              </p>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-dark shadow-danger text-center rounded-circle" style="background: #8B0000 !important;">
              <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Donazioni Liberali</p>
              <h5 class="font-weight-bolder">€ 12.450</h5>
              <p class="mb-0">
                Fondi per la Cupola
              </p>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-dark shadow-success text-center rounded-circle" style="background: #8B0000 !important;">
              <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Prossimo Evento</p>
              <h5 class="font-weight-bolder">30 Ago</h5>
              <p class="mb-0">
                Trasporto Carrettone
              </p>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-dark shadow-warning text-center rounded-circle" style="background: #8B0000 !important;">
              <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
      <div class="card-header pb-0 pt-3 bg-transparent">
        <h6 class="text-capitalize">Panoramica Sottoscrizioni 2026</h6>
        <p class="text-sm mb-0">
          <i class="fa fa-arrow-up text-success"></i>
          <span class="font-weight-bold">Obiettivo:</span> Rifacimento Cupola
        </p>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="card card-carousel overflow-hidden h-100 p-0">
      <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
        <div class="carousel-inner border-radius-lg h-100">
          <div class="carousel-item h-100 active" style="background-image: url('{{ asset('assets/img/carro-1.jpg') }}'); background-size: cover;">
            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
              <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                <i class="ni ni-settings text-dark opacity-10"></i>
              </div>
              <h5 class="text-white mb-1">Tradizione e Innovazione</h5>
              <p>Valorizziamo l'arte dell'intreccio della paglia e il restauro dell'obelisco.</p>
            </div>
          </div>
          <div class="carousel-item h-100" style="background-image: url('{{ asset('assets/img/carro-2.jpg') }}'); background-size: cover;">
            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
              <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                <i class="ni ni-favourite-28 text-dark opacity-10"></i>
              </div>
              <h5 class="text-white mb-1">Diventa Socio Sostenitore</h5>
              <p>Contribuisci attivamente alla tutela della Grande Tirata.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Precedente</span>
        </button>
        <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Successivo</span>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
          <h6 class="mb-2">Donazioni per Area</h6>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center ">
          <tbody>
            <tr>
              <td class="w-30">
                <div class="d-flex px-2 py-1 align-items-center">
                  <div class="ms-4">
                    <p class="text-xs font-weight-bold mb-0">Area:</p>
                    <h6 class="text-sm mb-0">Mirabella Eclano (Centro)</h6>
                  </div>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <p class="text-xs font-weight-bold mb-0">Soci:</p>
                  <h6 class="text-sm mb-0">85</h6>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <p class="text-xs font-weight-bold mb-0">Contributi:</p>
                  <h6 class="text-sm mb-0">€ 4.250</h6>
                </div>
              </td>
            </tr>
            <tr>
              <td class="w-30">
                <div class="d-flex px-2 py-1 align-items-center">
                  <div class="ms-4">
                    <p class="text-xs font-weight-bold mb-0">Area:</p>
                    <h6 class="text-sm mb-0">Frazioni e Limitrofi</h6>
                  </div>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <p class="text-xs font-weight-bold mb-0">Soci:</p>
                  <h6 class="text-sm mb-0">42</h6>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <p class="text-xs font-weight-bold mb-0">Contributi:</p>
                  <h6 class="text-sm mb-0">€ 2.100</h6>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="card">
      <div class="card-header pb-0 p-3">
        <h6 class="mb-0">Categorie Progetti</h6>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center" style="background: #8B0000 !important;">
                <i class="ni ni-settings-gear-65 text-white opacity-10"></i>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-sm">Manutenzione Cupola</h6>
                <span class="text-xs">Lavori 5°, 6° e 7° registro</span>
              </div>
            </div>
            <div class="d-flex">
              <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
            </div>
          </li>
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center" style="background: #8B0000 !important;">
                <i class="ni ni-hat-3 text-white opacity-10"></i>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-sm">Scuola di Intreccio</h6>
                <span class="text-xs">Corso per giovani Funaioli</span>
              </div>
            </div>
            <div class="d-flex">
              <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>