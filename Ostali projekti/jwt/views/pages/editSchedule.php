<div class="prikazSvihRasporeda">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <table id="tabela">

                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    <thead>
            
                    <tbody>
                            <?php
                                require_once "config/connection.php";
                                $svi = $conn->query("SELECT * FROM calendar");
                                foreach($svi as $s):
                            ?>
                        <tr>
                            <td><?=$s->title?></td>
                            <td><?=$s->start_event?></td>
                            <td><a href="" class="update" data-id="<?=$s->id?>" data-toggle="modal" data-target="#myModal">Update</a></td>
                            <td><a href="" class="brisanje" data-id="<?=$s->id?>">Delete</a></td>
                        </tr>
                            <?php endforeach; ?>

                    </tbody>

                </table>
                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 goback">
                <a href="index.php?page=schedule" class="btn dugmeback">Go Back To Schedule</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal products -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Izmeni proizvod</h4>
            </div>
            <div class="modal-body">

            <form action="models/update.php" method="POST" class="crud">
                <input type="hidden" name="hdnChange" id="hdnIdProdChange"/>    
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                
                <div>
                    <label for="date">Date</label>
                    <input type="date"  name="start_event" id="start_event">
                </div>
                
                <button type="submit" name="change" class="btn btn-primary">Izmeni</button>
            </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>