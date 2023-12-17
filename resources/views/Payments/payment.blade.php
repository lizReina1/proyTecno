<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Enlace a Bootstrap por CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Referencia al script payments -->
     <script src="{{ asset('') }}"></script>
</head>

<body data-bs-theme="dark">

    <div class="dropdown" data-bs-theme="light">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonLight"
            data-bs-toggle="dropdown" aria-expanded="false">
            Default dropdown
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonLight">
            <li><a class="dropdown-item active" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Separated link</a></li>
        </ul>
    </div>

    <div class="dropdown" data-bs-theme="dark">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonDark"
            data-bs-toggle="dropdown" aria-expanded="false">
            Dark dropdown
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonDark">
            <li><a class="dropdown-item active" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Separated link</a></li>
        </ul>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Realizar Pago</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre_tarjeta" class="form-label">Nombre en la Tarjeta</label>
                        <input type="text" name="nombre_tarjeta" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero_tarjeta" class="form-label">Número de Tarjeta</label>
                        <input type="text" name="numero_tarjeta" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fecha_expiracion" class="form-label">Fecha de Expiración</label>
                            <input type="text" name="fecha_expiracion" class="form-control" placeholder="MM/AA"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cvc" class="form-label">CVC</label>
                            <input type="text" name="cvc" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="monto" class="form-label">Monto a Pagar</label>
                        <input type="text" name="monto" class="form-control" required>
                    </div>
                    <button type="submit"  onclick="testQuery()" class="btn btn-success">Pagar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap y Popper.js (si es necesario) por CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
