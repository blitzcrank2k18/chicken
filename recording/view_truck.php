          <?php
           include('../dist/includes/dbcon.php');
           $id=$_REQUEST['id'];
            $query=mysqli_query($con,"select * from delivery where delivery_id='$id'")or die(mysqli_error());
              $i=1;
              $row=mysqli_fetch_array($query);
          ?>
          <table class="table table-striped">
              <tbody>
                <tr>
                  <th>Truck Seal</th>
                  <th>Plate #</th>
                  <th>Driver</th>
                  <th># of Crew</th>
                  <th># of Trips</th>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" id="name" name="seal" value="<?php echo $row['truck_seal'];?>"></td>
                  <td><input type="text" class="form-control" id="name" name="plateno" value="<?php echo $row['plateno'];?>"></td>
                  <td><input type="text" class="form-control" id="name" name="driver" value="<?php echo $row['truck_seal'];?>"></td>
                  <td><input type="number" class="form-control" id="name" name="crew" value="<?php echo $row['noofcrew'];?>"></td>
                  <td><input type="number" class="form-control" id="name" name="trips" value="<?php echo $row['tripno'];?>"></td>
                </tr>
                <tr>
                  <th>Date</th>
                  <th>Time in Farm</th>
                  <th>Time out Farm</th>
                  <th>Load Start</th>
                  <th>Load Finished</th>
                </tr>
                <tr>
                  <td><input type="date" class="form-control" id="name" name="date" value="<?php echo $row['delivery_date'];?>"></td>
                  <td><input type="time" class="form-control" id="name" name="timein_farm" value="<?php echo $row['timeinfarm'];?>"></td>
                  <td><input type="time" class="form-control" id="name" name="timeout_farm" value="<?php echo $row['timeoutfarm'];?>"></td>
                  <td><input type="time" class="form-control" id="name" name="load_start" value="<?php echo $row['loadstart'];?>"></td>
                  <td><input type="time" class="form-control" id="name" name="load_finish" value="<?php echo $row['loadfinish'];?>"></td>
                 
                </tr>
                <tr>
                  <th>Time in Plant</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <td><input type="time" class="form-control" id="name" name="timein" value="<?php echo $row['timeinplant'];?>"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                 
                </tr>
                
              </tbody>
          </table>