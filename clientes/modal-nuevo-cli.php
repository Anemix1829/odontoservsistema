<form class="row" method="post" onsubmit="return AddCliConf();">
    <div class="col-12 col-md-6 p-2">
        <label for="">NOMBRES</label>
        <input type="text" name="n" id="n" class="form-control" required>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">APELLIDOS</label>
        <input type="text" name="a" id="a" class="form-control" required>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">TELÉFONO</label>
        <input type="text" name="t" id="t" class="form-control" required>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">DIRECCIÓN</label>
        <input type="text" name="d" id="d" class="form-control" required>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">CORREO ELECTRÓNICO</label>
        <input type="email" name="e" id="e" class="form-control" required>
    </div>
    
    <div class="col-12 d-flex justify-content-center p-2">
        <button type="submit" class="btn btn-primary">AGREGAR CLIENTE</button>
    </div>
</form>