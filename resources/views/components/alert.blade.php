<div class="row layout-top-spacing">
        @if (session('success'))
            <div class="alert alert-light-primary alert-dismissible fade show border-0 mb-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button>
                <strong>Ok!</strong> {{ session('success') }}.</button>
            </div>
        @endif

        @if (session('error') || session('errors'))
            <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button>
                <strong>Oh snap!</strong>
                {{ session('error') ? session('error') : session('errors') }}.</button>
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-light-warning alert-dismissible fade show border-0 mb-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button>
                <strong>Warning!</strong> {{ session('warning') }}.</button>
            </div>
        @endif

</div>
