<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('index') }}" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
    <section>
        <div class="d-flex justify-content-center flex-wrap">
            <button class="btn btn-outline-primary m-1" onclick="redirectToIndexModelo('Deportivas')">Deportivas</button>
            <button class="btn btn-outline-primary m-1" onclick="redirectToIndexModelo('Casuales')">Casuales</button>
            <button class="btn btn-outline-primary m-1" onclick="redirectToIndexModelo('Botas')">Botas</button>
            <button class="btn btn-outline-primary m-1" onclick="redirectToIndexModelo('Tacones')">Tacones</button>
            <button class="btn btn-outline-primary m-1" onclick="redirectToIndexModelo('Formales')">Formales</button>
            <button class="btn btn-outline-primary m-1" onclick="redirectToIndexBrand('Adidas')">Adidas</button>
            <button class="btn btn-outline-primary m-1" onclick="redirectToIndexBrand('Nike')">Nike</button>
            <button class="btn btn-outline-primary m-1" onclick="redirectToIndexBrand('Jordan')">Jordan</button>
            <button class="btn btn-outline-primary m-1" onclick="redirectToIndexBrand('Reebok')">Reebok</button>
            <button class="btn btn-outline-primary m-1" onclick="redirectToIndexBrand('Puma')">Puma</button>
        </div>
    </section> 
    <script>
        function redirectToIndexModelo(modelo) {
            window.location.href = '/index?modelo=' + encodeURIComponent(modelo);
        }

        function redirectToIndexBrand(brand) {
            window.location.href = '/index?brand=' + encodeURIComponent(brand);
        }
    </script>
</div>