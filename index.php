<?php include('header.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h1 class="mb-4">Descubra seu signo:</h1>

                    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
                        <div class="mb-3">
                            <label for="data_nascimento" class="form-label">Data de nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Descobrir</button>
                    </form>

                    <p class="mt-3 text-muted small">Fonte: Elaborada pelo autor</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>