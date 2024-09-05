<form class="row" method="post" onsubmit="return AddUsuConf();">
    <div class="col-12 col-md-6 p-2">
        <label for="">NOMBRES</label>
        <input type="text" name="n" id="n" class="form-control" required>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">APELLIDOS</label>
        <input type="text" name="a" id="a" class="form-control" required>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">CORREO ELECTRÓNICO</label>
        <input type="email" name="e" id="e" class="form-control" required>
    </div>
    <div class="col-12 col-md-6 p-2">
        <label for="">ROL</label>
        <select class="form-control" name="r" id="r" required>
            <option value="">[SELECCIONE UNA OPCION]</option>
            <option value="1">ADMIN</option>
            <option value="2">EMPLEADO</option>
        </select>
    </div>
    <div class="col-12 d-flex justify-content-center p-2">
        <button type="submit" class="btn btn-primary">AGREGAR USUARIO</button>
    </div>
</form>