<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Productos</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Ingresar producto
                  </li>
                </ol>
              </div>
            </div>
          </div>
         
        </div>
        <div class="content-body"><div class="row">
    <div class="col-12 col-md-8">
        <!-- User Profile -->
        <section class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-2 col-12">
                                
                            </div>
                            <div class="col-md-10 col-12">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <p class="text-bold-700 text-uppercase mb-0">Registro de Nuevo Producto</p>
                                        <p class="mb-0"></p>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <p class="text-bold-700 text-uppercase mb-0"></p>
                                        <p class="mb-0"></p>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <p class="text-bold-700 text-uppercase mb-0"></p>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                                <hr/>
                                <?php
                                echo form_open_multipart("producto/agregarbd");
                                ?>
                                <form class="form-horizontal form-user-profile row mt-2" action="index.html">
                                    <div class="col-12">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" name="nombre" value="" required="" autofocus="">
                                            <label for="first-name">Producto</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" name="categoria" value="" required="" autofocus="">
                                            <label for="last-name">Categoria</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset class="form-label-group">
                                            <input type="number" class="form-control" name="cantidad" value="" required="" autofocus="">
                                            <label for="user-name">Cantidad</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset class="form-label-group">
                                            <input type="date" class="form-control" name="fecha" value="" required="" autofocus="">
                                            <label for="email-address">Fecha Registro</label>
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn-gradient-primary my-1">Registrar Producto</button>
                                    </div>
                                </form>
                                <?php
                                echo form_close();
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title text-center">Producto</h6>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="text-center row clearfix mb-2">
                        <div class="col-12">
                            <i class="icon-layers font-large-3 bg-warning bg-glow white rounded-circle p-3 d-inline-block"></i>
                        </div>
                    </div>
                    <h3 class="text-center">Cargar Producto</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-de mb-0">
                        <tbody>
                            <tr>
                                <td>Nombre</td>
                                <td><i class="icon-layers"></i> </td>
                            </tr>
                            <tr>
                                <td>Categoria</td>
                                <td><i class="icon-layers"></i> </td>
                            </tr>
                            <tr>
                                <td>Proveedor</td>
                                <td><i class="icon-layers"></i> </td>
                            </tr>
                            <tr>
                                <td>Cantidad</td>
                                <td><i class="icon-layers"></i> </td>
                            </tr>
                            <tr>
                                <td>Fecha Registro</td>
                                <td><i class="icon-calendar"></i> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
               
       
    </div>
    </div>
</div>
        </div>
      </div>
    </div>