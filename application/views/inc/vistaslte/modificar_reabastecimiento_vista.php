<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Modificar Reabastecimiento</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                 
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
                                <img src="<?php echo base_url(); ?>admin/app-assets/images/portrait/medium/avatar-m-1.png" class="rounded-circle height-100" alt="Card image" />
                            </div>
                            <div class="col-md-10 col-12">
                               
                                <hr/>
                                <!--<form class="form-horizontal form-user-profile row mt-2" action="index.html">-->
                            <?php
                            foreach($inforeabastecimiento->result() as $row)
                            {
                            ?>
                                <?php
                                echo form_open_multipart("reabastecimiento/modificarbd");
                                ?>
                                    <div class="col-6">
                                        <input type="hidden" name="idreabastecimiento" value="<?php echo $row->idreabastecimiento; ?>">
                                    </div>
                                    <div class="col-6">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" name="producto" value="<?php echo $row->producto; ?>" readonly>
                                            <label for="producto">Nombre Producto</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset class="form-label-group">
                                            <input type="number" class="form-control" name="cantidad" value="<?php echo $row->cantidad; ?>"  required>
                                            <label for="cantidad">Cantidad</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" name="fechaReabastecimiento" value="<?php echo $row->fechaReabastecimiento; ?>"  readonly>
                                            <label for="fechaReabastecimiento">Fecha de Reabastecimiento</label>
                                        </fieldset>
                                    </div>
                                   
                                   
                                   
                                    
                                 
                                    <div class="col-12 text-right">
                                       
                                            <button type="submit" class="btn-gradient-primary my-1">Guardar</button>
                                      
                                    </div>
                                <?php
                                echo form_close();
                                
                                }
                                ?>
                              
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
  
</div>
        </div>
      </div>
    </div>