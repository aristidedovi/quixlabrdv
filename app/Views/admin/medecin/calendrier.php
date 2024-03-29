<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Sécretariat</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Rendez-vous</a></li>
        </ol>
    </div>
</div>

<div class="col-lg-12">
    <?php
   // var_dump($e->service);
    //var_dump(sha1('thiam	'));
    // var_dump($rendezvous);
    ?>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4>Calendrier des rendez-vous</h4>
            </div>
            <div class="row">
                <!--  <div class="col-lg-4 mt-5">-->
                <!-- <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-primary btn-block"><i class="ti-plus f-s-12 m-r-5"></i> Create New</a>
                 <div id="external-events" class="m-t-20">
                     <p>Drag and drop your event or click in the calendar</p>
                     <div class="external-event bg-primary text-white" data-class="bg-primary"><i class="fa fa-move"></i>New Theme Release</div>
                     <div class="external-event bg-success text-white" data-class="bg-success"><i class="fa fa-move"></i>My Event</div>
                     <div class="external-event bg-warning text-white" data-class="bg-warning"><i class="fa fa-move"></i>Meet manager</div>
                     <div class="external-event bg-dark text-white" data-class="bg-dark"><i class="fa fa-move"></i>Create New theme</div>
                 </div>-->
                <!-- checkbox -->
                <!--<div class="checkbox m-t-40">
                      <input id="drop-remove" type="checkbox">
                      <label for="drop-remove">Remove after drop</label>
                </div>-->
                <?php
                //var_dump($rendezvous);
                //var_dump(sha1('thiam	'));
                // $rdv = [];
                //foreach ($rendezvous as $rd){
                //     $rdv = $rd;
                //  }
                // var_dump($rdv);
                $array = json_encode($rendezvous);
                //echo $array;
                ?>
                <script type='text/javascript'>

                    var rdvCalendrier = <?php echo json_encode($array);?>;
                    var rdvC = JSON.parse(rdvCalendrier);

                    console.log("calendrier",rdvCalendrier);
                    console.log("calendrier parser",rdvC);
                    var tabCalendrier = [];

                    for(var i = 0; i < rdvC.length; i++){
                        var objCalendrier = new Object();
                        objCalendrier.title = rdvC[i].nomComplet;

                        var datereel = new Date(rdvC[i].heureR);
                        var datefin = new Date(datereel);
                        datefin = new Date(datefin.setMinutes(datefin.getMinutes()+30)),

                            objCalendrier.start = datereel ;
                        objCalendrier.end = datefin ;

                        if(rdvC[i].id_etat_rendez_vous == 1){
                            objCalendrier.className = 'bg-succes';
                        }else if(rdvC[i].id_etat_rendez_vous == 2){
                            objCalendrier.className = 'bg-primary';
                        }else if(rdvC[i].id_etat_rendez_vous == 3){
                            objCalendrier.className = 'bg-danger';
                        }

                        tabCalendrier.push(objCalendrier);

                    }
                    console.log("nouveau Tableau", tabCalendrier);
                    //console.log("heure", rdvC[i].heureR);
                    // ...
                </script>
                <!--</div>-->
                <div class="col-md-12">
                    <div class="card-box m-b-50">
                        <div id="calendar"></div>
                    </div>
                </div>

                <!-- end col -->
                <!-- BEGIN MODAL -->
                <div class="modal fade none-border" id="event-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add New Event</strong></h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add a category</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="pink">Pink</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->
            </div>
        </div>
    </div>
</div>

<button class="btn btn-danger" disabled>Annuler</button>
<button class="btn btn-success" disabled>Accorder</button>
<button class="btn btn-primary" disabled>Reporter</button>